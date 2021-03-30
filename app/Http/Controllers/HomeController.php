<?php

namespace App\Http\Controllers;

use App\About;
use App\Advertisement;
use App\Batch;
use App\BBL;
use App\Blog;
use App\BundleCourse;
use App\Career;
use App\Categories;
use App\CategorySlider;
use App\Course;
use App\Meeting;
use App\Slider;
use App\SliderFacts;
use App\Testimonial;
use App\Trusted;
use Auth;
use Illuminate\Support\Facades\Schema;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Categories::orderBy('position', 'ASC')->get();
        $sliders = Slider::orderBy('position', 'ASC')->get();
        $facts = SliderFacts::limit(3)->get();
        $categories = CategorySlider::first();
        $cor = Course::all();
        $meetings = Meeting::where('link_by', null)->get();
        $bigblue = BBL::where('is_ended', '!=', 1)->where('link_by', null)->get();
        $testi = Testimonial::all();
        $trusted = Trusted::all();
        $data = Career::first();

        $blogs = Blog::where('status', '1')->orderBy('updated_at', 'DESC')->get();
        $about = About::first();
        $viewed = session()->get('courses.recently_viewed');

        if (Schema::hasColumn('bundle_courses', 'is_subscription_enabled')) {
            $bundles = BundleCourse::where('is_subscription_enabled', 0)->get();
            $subscriptionBundles = BundleCourse::where('is_subscription_enabled', 1)->get();
        } else {

            $bundles = null;
            $subscriptionBundles = null;

        }

        if (Schema::hasTable('batch')) {
            $batches = Batch::where('status', '1')->get();
        } else {
            $batches = null;
        }

        if (Schema::hasTable('advertisements')) {
            $advs = Advertisement::where('status', '=', 1)->get();
        } else {
            $advs = null;
        }

        if (isset($viewed)) {
            $recent_course_id = array_unique($viewed);
        } else {

            $recent_course_id = null;

        }

        $counter = 0;
        $recent_course = null;

        if (Auth::check()) {
            if (isset($recent_course_id)) {
                foreach ($recent_course_id as $item) {

                    $recent_course = Course::where('id', $item)->where('status', '1')->first();

                    if (isset($recent_course)) {
                        $counter++;
                    }
                }

            }

        }

        $total_count = $counter;

        return view('home', compact('category', 'sliders', 'facts', 'categories', 'cor', 'bundles', 'meetings', 'bigblue', 'testi', 'trusted', 'recent_course_id', 'blogs', 'about', 'subscriptionBundles', 'batches', 'recent_course', 'total_count', 'advs', 'data'));
    }
    public function index_()
    {
        $category = Categories::orderBy('position', 'ASC')->get();
        $sliders = Slider::orderBy('position', 'ASC')->get();
        $facts = SliderFacts::limit(3)->get();
        $categories = CategorySlider::first();
        $cor = Course::all();
        $meetings = Meeting::where('link_by', null)->get();
        $bigblue = BBL::where('is_ended', '!=', 1)->where('link_by', null)->get();
        $testi = Testimonial::all();
        $trusted = Trusted::all();
        $data = Career::first();

        $blogs = Blog::where('status', '1')->orderBy('updated_at', 'DESC')->get();
        $about = About::first();
        $viewed = session()->get('courses.recently_viewed');

        if (Schema::hasColumn('bundle_courses', 'is_subscription_enabled')) {
            $bundles = BundleCourse::where('is_subscription_enabled', 0)->get();
            $subscriptionBundles = BundleCourse::where('is_subscription_enabled', 1)->get();
        } else {

            $bundles = null;
            $subscriptionBundles = null;

        }

        if (Schema::hasTable('batch')) {
            $batches = Batch::where('status', '1')->get();
        } else {
            $batches = null;
        }

        if (Schema::hasTable('advertisements')) {
            $advs = Advertisement::where('status', '=', 1)->get();
        } else {
            $advs = null;
        }

        if (isset($viewed)) {
            $recent_course_id = array_unique($viewed);
        } else {

            $recent_course_id = null;

        }

        $counter = 0;
        $recent_course = null;

        if (Auth::check()) {
            if (isset($recent_course_id)) {
                foreach ($recent_course_id as $item) {

                    $recent_course = Course::where('id', $item)->where('status', '1')->first();

                    if (isset($recent_course)) {
                        $counter++;
                    }
                }

            }

        }

        $total_count = $counter;

        return view('cat', compact('category', 'sliders', 'facts', 'categories', 'cor', 'bundles', 'meetings', 'bigblue', 'testi', 'trusted', 'recent_course_id', 'blogs', 'about', 'subscriptionBundles', 'batches', 'recent_course', 'total_count', 'advs', 'data'));
    }



    public function bundle()
    {
        $category = Categories::orderBy('position', 'ASC')->get();
        $sliders = Slider::orderBy('position', 'ASC')->get();
        $facts = SliderFacts::limit(3)->get();
        $categories = CategorySlider::first();
        $cor = Course::all();
        $meetings = Meeting::where('link_by', null)->get();
        $bigblue = BBL::where('is_ended', '!=', 1)->where('link_by', null)->get();
        $testi = Testimonial::all();
        $trusted = Trusted::all();
        $data = Career::first();

        $blogs = Blog::where('status', '1')->orderBy('updated_at', 'DESC')->get();
        $about = About::first();
        $viewed = session()->get('courses.recently_viewed');

        if (Schema::hasColumn('bundle_courses', 'is_subscription_enabled')) {
            $bundles = BundleCourse::where('is_subscription_enabled', 0)->get();
            $subscriptionBundles = BundleCourse::where('is_subscription_enabled', 1)->get();
        } else {

            $bundles = null;
            $subscriptionBundles = null;

        }

        if (Schema::hasTable('batch')) {
            $batches = Batch::where('status', '1')->get();
        } else {
            $batches = null;
        }

        if (Schema::hasTable('advertisements')) {
            $advs = Advertisement::where('status', '=', 1)->get();
        } else {
            $advs = null;
        }

        if (isset($viewed)) {
            $recent_course_id = array_unique($viewed);
        } else {

            $recent_course_id = null;

        }

        $counter = 0;
        $recent_course = null;

        if (Auth::check()) {
            if (isset($recent_course_id)) {
                foreach ($recent_course_id as $item) {

                    $recent_course = Course::where('id', $item)->where('status', '1')->first();

                    if (isset($recent_course)) {
                        $counter++;
                    }
                }

            }

        }

        $total_count = $counter;

        return view('bundle', compact('category', 'sliders', 'facts', 'categories', 'cor', 'bundles', 'meetings', 'bigblue', 'testi', 'trusted', 'recent_course_id', 'blogs', 'about', 'subscriptionBundles', 'batches', 'recent_course', 'total_count', 'advs', 'data'));
    }




    
    public function batch()
    {
        $category = Categories::orderBy('position', 'ASC')->get();
        $sliders = Slider::orderBy('position', 'ASC')->get();
        $facts = SliderFacts::limit(3)->get();
        $categories = CategorySlider::first();
        $cor = Course::all();
        $meetings = Meeting::where('link_by', null)->get();
        $bigblue = BBL::where('is_ended', '!=', 1)->where('link_by', null)->get();
        $testi = Testimonial::all();
        $trusted = Trusted::all();
        $data = Career::first();

        $blogs = Blog::where('status', '1')->orderBy('updated_at', 'DESC')->get();
        $about = About::first();
        $viewed = session()->get('courses.recently_viewed');

        if (Schema::hasColumn('bundle_courses', 'is_subscription_enabled')) {
            $bundles = BundleCourse::where('is_subscription_enabled', 0)->get();
            $subscriptionBundles = BundleCourse::where('is_subscription_enabled', 1)->get();
        } else {

            $bundles = null;
            $subscriptionBundles = null;

        }

        if (Schema::hasTable('batch')) {
            $batches = Batch::where('status', '1')->get();
        } else {
            $batches = null;
        }

        if (Schema::hasTable('advertisements')) {
            $advs = Advertisement::where('status', '=', 1)->get();
        } else {
            $advs = null;
        }

        if (isset($viewed)) {
            $recent_course_id = array_unique($viewed);
        } else {

            $recent_course_id = null;

        }

        $counter = 0;
        $recent_course = null;

        if (Auth::check()) {
            if (isset($recent_course_id)) {
                foreach ($recent_course_id as $item) {

                    $recent_course = Course::where('id', $item)->where('status', '1')->first();

                    if (isset($recent_course)) {
                        $counter++;
                    }
                }

            }

        }

        $total_count = $counter;

        return view('batch', compact('category', 'sliders', 'facts', 'categories', 'cor', 'bundles', 'meetings', 'bigblue', 'testi', 'trusted', 'recent_course_id', 'blogs', 'about', 'subscriptionBundles', 'batches', 'recent_course', 'total_count', 'advs', 'data'));
    }



}
