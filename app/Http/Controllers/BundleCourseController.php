<?php

namespace App\Http\Controllers;

use App\BundleCourse;
use App\Currency;
use Illuminate\Http\Request;
use App\Course;
use Image;
use DB;
use Auth;
use App\Cart;
use App\Order;
use Illuminate\Support\Facades\Log;
use App\Setting;

class BundleCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = BundleCourse::orderBy('updated_at', 'desc')->get();
        return view('admin.bundle.index', compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::get();
        return view('admin.bundle.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  //dd($request->all());
        try {
            Log::debug('<==create bundle');

            $this->validate($request, [
                'course_id' => 'required',
                'title' => 'required',
                'detail' => 'required',
            ]);

            $input = $request->all();

            if ($request->is_subscription_enabled == 1) {
                $plan = $this->createPlanInStripe($input['title'], $input['billing_interval'], $input['discount_price']);

                Log::debug('message',  $plan);

                $input['price_id'] = $plan['price_id'];
                $input['product_id'] = $plan['product_id'];
            } else {
                $input['price_id'] = null;
                $input['product_id'] = null;
                $input['billing_interval'] = null;
            }

            $data = BundleCourse::create($input);

            if (isset($request->type)) {
                $data->type = "1";
            } else {
                $data->type = "0";
            }

            if (isset($request->duration_type)) {
                $data->duration_type = "m";
            } else {
                $data->duration_type = "d";
            }


            if ($file = $request->file('preview_image')) {
                $optimizeImage = Image::make($file);
                $optimizePath = public_path() . '/images/bundle/';
                $image = time() . $file->getClientOriginalName();
                $optimizeImage->save($optimizePath . $image, 72);

                $data->preview_image = $image;
            }


            $slug = str_slug($request->title, '-');
            $data->slug = $slug;



            $data->save();

            Log::debug('==>create bundle');

            return redirect('bundle');
        } catch (\Exception $e) {
            Log::error($e->getTraceAsString());
            dd($e);

            \Session::flash('delete', 'Bundle Creation Failed!');

            return redirect('bundle');
        }
    }

    #region STRIPE
    /**
     * Note: Currently subscription plan is created only via stripe.
     * We should move this function in our custom provider `StripeProvider`
     */
    private function createPlanInStripe(
        $product_name,
        $billing_interval,
        $offer_price,
        $product_id = null
    ) {
        try {
            Log::debug('<==createPlanInStripe');

            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            $config = Setting::findOrFail(1);
            $projectTitle = $config->project_title;
            $currency = Currency::first();
            $price_id = null;

            if ($product_id === null) {

                $product = $stripe->products->create([
                    'name' => $product_name,
                ]);

                $product_id = $product['id'];

                Log::debug('Stripe product created successfully: ' . $product_id);
            }

            $priceArgs = [
                'product' => $product_id,
                'recurring' => ['interval' => $billing_interval],
                'unit_amount' => $offer_price * 100,
                'currency' => $currency->currency,
                "metadata" => ["course_title" =>   $projectTitle]
            ];

            Log::debug('calling stripe price with args: ' . print_r($priceArgs, TRUE));

            $price = $stripe->prices->create([
                $priceArgs
            ]);

            $price_id = $price['id'];

            Log::debug('Stripe price created successfully: ' .  $price_id);

            Log::debug('==>createPlanInStripe');

            $obj = ['price_id' => $price_id, 'product_id' => $product_id];

            Log::debug('Plan created in stripe: ' . print_r($obj, TRUE));

            return $obj;
        } catch (\Exception $e) {
            Log::error($e->getTraceAsString());

            \Session::flash('delete', trans('flash.PlanCreationFailed'));

            return redirect('bundle/create');
        }
    }

    #endregion

    /**
     * Display the specified resource.
     *
     * @param  \App\BundleCourse  $bundleCourse
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cor = BundleCourse::find($id);
        $courses = Course::get();
        return view('admin.bundle.edit', compact('cor', 'courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BundleCourse  $bundleCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(BundleCourse $bundleCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BundleCourse  $bundleCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $course = BundleCourse::findOrFail($id);
        $input = $request->all();

        if (isset($request->type)) {
            $input['type'] = "1";
        } else {
            $input['type'] = "0";
        }

        if (isset($request->duration_type)) {
            $input['duration_type'] = "m";
        } else {
            $input['duration_type'] = "d";
        }


        if ($file = $request->file('image')) {

            if ($course->preview_image != null) {
                $content = @file_get_contents(public_path() . '/images/bundle/' . $course->preview_image);
                if ($content) {
                    unlink(public_path() . '/images/bundle/' . $course->preview_image);
                }
            }

            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/images/bundle/';
            $image = time() . $file->getClientOriginalName();
            $optimizeImage->save($optimizePath . $image, 72);

            $input['preview_image'] = $image;
        }

        $slug = str_slug($input['title'], '-');
        $input['slug'] = $slug;

        Cart::where('bundle_id', $id)
            ->update([
                'price' => $request->price,
                'offer_price' => $request->discount_price,
            ]);

        if ($request->is_subscription_enabled == 1) {
            $input['price_id'] = $this->createNewPriceInStripe($course, $input);
        }

        $course->update($input);

        return redirect('bundle');
    }

    private function createNewPriceInStripe(BundleCourse $bundle, $input)
    {
        Log::debug('<==createNewPriceInStripe');

        Log::debug('New: price: ' . $input['price'] . ', discounted: ' .  $input['discount_price'] . ', interval: ' . $input['billing_interval']);

        Log::debug('Existing: price: ' . $bundle->price . ', discounted: ' . $bundle->discount_price . ', interval: ' . $bundle->billing_interval);

        if (
            $bundle->price != $input['price']
            || $bundle->discount_price != $input['discount_price']
            || $bundle->billing_interval != $input['billing_interval']
        ) {
            Log::debug('Plan changed therefore creating new plan in stripe. Stripe doesnot allow modifying current plan by design');

            return $this->createPlanInStripe(
                $input['title'],
                $input['billing_interval'],
                $input['discount_price'],
                $bundle->product_id
            )['price_id'];
        }

        Log::debug('Plan did not change therefore not creating new plan in stripe.');

        Log::debug('==>createNewPriceInStripe');

        return null;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BundleCourse  $bundleCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = BundleCourse::find($id);

        $order = Order::where('bundle_id', $id)->get();

        if (!$order->isEmpty()) {
            return back()->with('delete', trans('flash.CannotDelete'));
        } else {

            Cart::where('bundle_id', $id)->delete();

            if ($course->preview_image != null) {

                $image_file = @file_get_contents(public_path() . '/images/bundle/' . $course->preview_image);

                if ($image_file) {
                    unlink(public_path() . '/images/bundle/' . $course->preview_image);
                }
            }

            $value = $course->delete();
        }

        return redirect('bundle');
    }


    public function addtocart(Request $request, $id)
    {

        $bundle_course = BundleCourse::where('id', $id)->first();

        DB::table('carts')->insert(
            array(
                'user_id' => Auth::User()->id,
                'course_id' => NULL,
                'price' => $bundle_course->price,
                'offer_price' => $bundle_course->discount_price,
                'bundle_id' => $id,
                'type' => '1',
                'created_at'  => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'  => \Carbon\Carbon::now()->toDateTimeString(),

            )
        );


        return back()->with('success', trans('flash.CartAdded'));
    }


    public function detailpage(Request $request, $id)
    {
        $bundle = BundleCourse::where('id', $id)->first();
        return view('front.bundle_detail', compact('bundle'));
    }

    public function enroll(Request $request, $id)
    {
        $course = BundleCourse::where('id', $id)->first();

        $bundle_course_id = $course->course_id;

        $created_order = Order::create([
            'user_id' => Auth::User()->id,
            'instructor_id' => $course->user_id,
            'course_id' => NULL,
            'total_amount' => 'Free',
            'bundle_id' => $course->id,
            'bundle_course_id' => $bundle_course_id,
            'created_at'  => \Carbon\Carbon::now()->toDateTimeString(),
        ]);

        return back()->with('success', trans('flash.EnrolledSuccessfully'));
    }
}
