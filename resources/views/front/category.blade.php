@extends('theme.master')
@section('title',  '')

@section('content')
{{Route::current()->getName()}}
@include('admin.message')
<!-- categories-tab start-->
<section id="categories-tab" class="categories-tab-main-block">
    <div class="container">
        <div id="categories-tab-slider" class="categories-tab-block owl-carousel">

            @php   $category = App\Categories::all();  @endphp

            @foreach($category as $cat)
            @if($cat->status == 1)
            <div class="item categories-tab-dtl">
                <a href="{{ route('category.page',['id' => $cat->id, 'category' => str_slug(str_replace('-','&',$cat->title))]) }}" title="tab"><i class="fa {{ $cat->icon }}"></i>{{ $cat->title }}</a>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
<!-- categories-tab end-->
<!-- category-title start -->
<section id="business-home" class="business-home-main-block">
    <div class="container">
        <h1 class="">
            @if(isset($cats))

            {{ $cats->title }}

            @else 
            كل الاقسام
            @endif 
        
      
          </h1>
    </div>
</section>
<!-- category-title end -->
<!-- category-slider start -->
<section  class="courses" style="padding-top: 100px;">
    <div class="container">
        <div class="row">
            
            <div class="col-md-6">
            
            </div>
            
     <div class="col-md-6">
         <div class="couse-sect" style="margin-bottom: 50px;">

       <select class="form-control" id="category-cahnge"> 

         

            @foreach($allcats as $key=>$allcat)

            @if ($key == 0)
            <option  value="{{ route('category.page',['id' => $key, 'category' => $key ]) }}"> View All </option>

            @endif

            <option  value="{{ route('category.page',['id' => $allcat->id, 'category' => str_slug(str_replace('-','&',$allcat->title)) ]) }}"> {{ $allcat->title }} </option>
            
            @endforeach

      </select>

         </div>
            </div>
        </div>
             <div class="row">
            @foreach($courses as $c)
 
         @if($c->status == 1 && $c->featured == 1)
            
                <div class="col-md-2">
 <div class="item student-view-block student-view-block-1">

                        <div class="view-block wow fadeIn">
                            <div class="view-img">
                                @if($c['preview_image'] !== NULL && $c['preview_image'] !== '')
                                    <a href="{{ route('user.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}">
                                        <img src="{{ asset('images/course/'.$c['preview_image']) }}" data-src="{{ asset('images/course/'.$c['preview_image']) }}" alt="course" class="img-fluid owl-lazy"></a>
                                @else
                                    <a href="{{ route('user.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}">
                                        <img src="{{ asset('images/course/'.$c['preview_image']) }}" data-src="{{ Avatar::create($c->title)->toBase64() }}" alt="course" class="img-fluid owl-lazy"></a>
                                @endif
                            </div>
                            @if($c['level_tags'] == !NULL)
                            <div class="trending">
                            <div class="best-seller">
                                {{ $c['level_tags'] }}
                            </div>
                            </div>
                            @endif
                            <div class="view-dtl">
                                <div class="view-heading btm-10"><a href="{{ route('user.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}">{{ str_limit($c->title, $limit = 30, $end = '...') }}</a></div>
                                <p class="btm-10"><a herf="#">
                                    @if (! is_null( $c->user) && ! is_null($c->user ))
                                    {{ $c->user['fname'] }} {{ $c->user['lname'] }}
                                    @endif
                                </a></p>
                                <div class="rating">
                                    <ul>
                                        <li>
                                            <?php
                                            $learn = 0;
                                            $price = 0;
                                            $value = 0;
                                            $sub_total = 0;
                                            $sub_total = 0;
                                            $reviews = App\ReviewRating::where('course_id',$c->id)->get();
                                            ?>
                                            @if(!empty($reviews[0]))
                                            <?php
                                            $count =  App\ReviewRating::where('course_id',$c->id)->count();

                                            foreach($reviews as $review){
                                                $learn = $review->price*5;
                                                $price = $review->price*5;
                                                $value = $review->value*5;
                                                $sub_total = $sub_total + $learn + $price + $value;
                                            }

                                            $count = ($count*3) * 5;
                                            $rat = $sub_total/$count;
                                            $ratings_var = ($rat*100)/5;
                                            ?>

                                            <div class="pull-left">
                                                <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var; ?>%" class="star-ratings-sprite-rating"></span>
                                                </div>
                                            </div>


                                            @else
                                                <div class="pull-left">{{ __('frontstaticword.NoRating') }}</div>
                                            @endif
                                        </li>
                                        <!-- overall rating-->
                                        <?php
                                        $learn = 0;
                                        $price = 0;
                                        $value = 0;
                                        $sub_total = 0;
                                        $count =  count($reviews);
                                        $onlyrev = array();

                                        $reviewcount = App\ReviewRating::where('course_id', $c->id)->WhereNotNull('review')->get();

                                        foreach($reviews as $review){

                                            $learn = $review->learn*5;
                                            $price = $review->price*5;
                                            $value = $review->value*5;
                                            $sub_total = $sub_total + $learn + $price + $value;
                                        }

                                        $count = ($count*3) * 5;

                                        if($count != "")
                                        {
                                            $rat = $sub_total/$count;

                                            $ratings_var = ($rat*100)/5;

                                            $overallrating = ($ratings_var/2)/10;
                                        }

                                        ?>

                                        @php
                                            $reviewsrating = App\ReviewRating::where('course_id', $c->id)->first();
                                        @endphp
                                        @if(!empty($reviewsrating))
                                        <li>
                                            <b>{{ round($overallrating, 1) }}</b>
                                        </li>
                                        @endif
                                        <li>
                                            (@php
                                                $data = App\ReviewRating::where('course_id', $c->id)->get();
                                                if(count($data)>0){

                                                    echo count($data);
                                                }
                                                else{

                                                    echo "0";
                                                }
                                            @endphp)
                                        </li>
                                    </ul>
                                </div>
                                @if( $c->type == 1)
                                    <div class="rate text-right">
                                        <ul>
                                            @php
                                                $currency = App\Currency::first();
                                            @endphp

                                            @if($c->discount_price == !NULL)
                                                @if($gsetting['currency_swipe'] == 1)
                                                    <li><a><b><i class="{{ $currency->icon }}"></i>{{ $c->discount_price }}</b></a></li>&nbsp;
                                                    <li><a><b><strike><i class="{{ $currency->icon }}"></i>{{ $c->price }}</strike></b></a></li>
                                                @else
                                                    <li><a><b>{{ $c->discount_price }}<i class="{{ $currency->icon }}"></i></b></a></li>&nbsp;
                                                    <li><a><b><strike>{{ $c->price }}<i class="{{ $currency->icon }}"></i></strike></b></a></li>
                                                @endif

                                            @else
                                                @if($gsetting['currency_swipe'] == 1)
                                                    <li><a><b><i class="{{ $currency->icon }}"></i>{{ $c->price }}</b></a></li>
                                                @else
                                                    <li><a><b>{{ $c->price }}<i class="{{ $currency->icon }}"></i></b></a></li>
                                                @endif
                                            @endif
                                        </ul>
                                    </div>
                                @else
                                    <div class="rate text-right">
                                        <ul>
                                            <li><a><b>{{ __('frontstaticword.Free') }}</b></a></li>
                                        </ul>
                                    </div>
                                @endif
                                <div class="img-wishlist">
                                    <div class="protip-wishlist">
                                        <ul>
                                            @if(Auth::check())
                                                @php
                                                    $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id', $c->id)->first();
                                                @endphp
                                                @if ($wish == NULL)
                                                    <li class="protip-wish-btn">
                                                        <form id="demo-form2" method="post" action="{{ url('show/wishlist', $c->id) }}" data-parsley-validate
                                                            class="form-horizontal form-label-left">
                                                            {{ csrf_field() }}

                                                            <input type="hidden" name="user_id"  value="{{Auth::User()->id}}" />
                                                            <input type="hidden" name="course_id"  value="{{$c->id}}" />

                                                            <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i class="fa fa-heart rgt-10"></i></button>
                                                        </form>
                                                    </li>
                                                @else
                                                    <li class="protip-wish-btn-two">
                                                        <form id="demo-form2" method="post" action="{{ url('remove/wishlist', $c->id) }}" data-parsley-validate
                                                            class="form-horizontal form-label-left">
                                                            {{ csrf_field() }}

                                                            <input type="hidden" name="user_id"  value="{{Auth::User()->id}}" />
                                                            <input type="hidden" name="course_id"  value="{{$c->id}}" />

                                                            <button class="wishlisht-btn" title="Remove from Wishlist" type="submit"><i class="fa fa-heart rgt-10"></i></button>
                                                        </form>
                                                    </li>
                                                @endif
                                            @else
                                                <li class="protip-wish-btn"><a href="{{ route('login') }}" title="heart"><i class="fa fa-heart rgt-10"></i></a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
             
                    <div id="prime-next-item-description-block{{$c->id}}" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">{{ $c['title'] }}</h5>
                                <div class="protip-img">
                                    @if($c['preview_image'] !== NULL && $c['preview_image'] !== '')
                                        <a href="{{ route('user.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}"><img src="{{ asset('images/course/'.$c['preview_image']) }}" alt="student" class="img-fluid">
                                        </a>
                                    @else
                                        <a href="{{ route('user.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}"><img src="{{ Avatar::create($c->title)->toBase64() }}" alt="student" class="img-fluid">
                                        </a>
                                    @endif
                                </div>

                                <ul class="description-list">
                                    <li>{{ __('frontstaticword.Classes') }}:
                                        @php
                                            $data = App\CourseClass::where('course_id', $c->id)->get();
                                            if(count($data)>0){

                                                echo count($data);
                                            }
                                            else{

                                                echo "0";
                                            }
                                        @endphp
                                    </li>
                                    &nbsp;
                                    <li>
                                        @if( $c->type == 1)
                                            <div class="rate text-right">
                                                <ul>
                                                    @php
                                                        $currency = App\Currency::first();
                                                    @endphp

                                                    @if($c->discount_price == !NULL)
                                                        @if($gsetting['currency_swipe'] == 1)
                                                            <li><a><b><i class="{{ $currency->icon }}"></i>{{ $c->discount_price }}</b></a></li>&nbsp;
                                                            <li><a><b><strike><i class="{{ $currency->icon }}"></i>{{ $c->price }}</strike></b></a></li>
                                                        @else
                                                            <li><a><b>{{ $c->discount_price }}<i class="{{ $currency->icon }}"></i></b></a></li>&nbsp;
                                                            <li><a><b><strike>{{ $c->price }}<i class="{{ $currency->icon }}"></i></strike></b></a></li>
                                                        @endif

                                                    @else
                                                        @if($gsetting['currency_swipe'] == 1)
                                                            <li><a><b><i class="{{ $currency->icon }}"></i>{{ $c->price }}</b></a></li>
                                                        @else
                                                            <li><a><b>{{ $c->price }}<i class="{{ $currency->icon }}"></i></b></a></li>
                                                        @endif
                                                    @endif
                                                </ul>
                                            </div>
                                        @else
                                            <div class="rate text-right">
                                                <ul>
                                                    <li><a><b>{{ __('frontstaticword.Free') }}</b></a></li>
                                                </ul>
                                            </div>
                                        @endif
                                    </li>
                                </ul>

                                <div class="main-des">
                                    <p>{{ $c->short_detail }}</p>
                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            @if($c->type == 1)
                                                @if(Auth::check())
                                                    @if(Auth::User()->role == "admin")
                                                        <div class="protip-btn">
                                                            <a href="{{ route('course.content',['id' => $c->id, 'slug' => $c->slug ]) }}" class="btn btn-secondary" title="course">{{ __('frontstaticword.GoToCourse') }}</a>
                                                        </div>
                                                    @else
                                                        @php
                                                            $order = App\Order::where('user_id', Auth::User()->id)->where('course_id', $c->id)->first();
                                                        @endphp
                                                        @if(!empty($order) && $order->status == 1)
                                                            <div class="protip-btn">
                                                                <a href="{{ route('course.content',['id' => $c->id, 'slug' => $c->slug ]) }}" class="btn btn-secondary" title="course">{{ __('frontstaticword.GoToCourse') }}</a>
                                                            </div>
                                                        @else
                                                            @php
                                                                $cart = App\Cart::where('user_id', Auth::User()->id)->where('course_id', $c->id)->first();
                                                            @endphp
                                                            @if(!empty($cart))
                                                                <div class="protip-btn">
                                                                    <form id="demo-form2" method="post" action="{{ route('remove.item.cart',$cart->id) }}">
                                                                        {{ csrf_field() }}

                                                                        <div class="box-footer">
                                                                         <button type="submit" class="btn btn-primary">{{ __('frontstaticword.RemoveFromCart') }}</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            @else
                                                                <div class="protip-btn">
                                 <form id="demo-form2" method="post" action="{{ route('addtocart',['course_id' => $c->id, 'price' => $c->price, 'discount_price' => $c->discount_price ]) }}"
                                                                        data-parsley-validate class="form-horizontal form-label-left">
                                                                            {{ csrf_field() }}

                                                                        <input type="hidden" name="category_id"  value="{{$c->category['id']}}" />

                                                                        <div class="box-footer">
                                                                         <button type="submit" class="btn btn-primary">{{ __('frontstaticword.AddToCart') }}</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    @endif
                                                @else
                                                    <div class="protip-btn">
                                                        <a href="{{ route('login') }}" class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;{{ __('frontstaticword.AddToCart') }}</a>
                                                    </div>
                                                @endif
                                            @else
                                                 @if(Auth::check())
                                                    @if(Auth::User()->role == "admin")
                                                        <div class="protip-btn">
                                                            <a href="{{ route('course.content',['id' => $c->id, 'slug' => $c->slug ]) }}" class="btn btn-secondary" title="course">{{ __('frontstaticword.GoToCourse') }}</a>
                                                        </div>
                                                    @else
                                                        @php
                                                            $enroll = App\Order::where('user_id', Auth::User()->id)->where('course_id', $c->id)->first();
                                                        @endphp
                                                        @if($enroll == NULL)
                                                            <div class="protip-btn">
                                                                <a href="{{url('enroll/show',$c->id)}}" class="btn btn-primary" title="Enroll Now">{{ __('frontstaticword.EnrollNow') }}</a>
                                                            </div>
                                                        @else
                                                            <div class="protip-btn">
                                                                <a href="{{ route('course.content',['id' => $c->id, 'slug' => $c->slug ]) }}" class="btn btn-secondary" title="Cart">{{ __('frontstaticword.GoToCourse') }}</a>
                                                            </div>
                                                        @endif
                                                    @endif
                                                @else
                                                    <div class="protip-btn">
                                                        <a href="{{ route('login') }}" class="btn btn-primary" title="Enroll Now">{{ __('frontstaticword.EnrollNow') }}</a>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
              @endif
            @endforeach
        </div>

        {{ $courses->links() }}
    </div>
</section>
<!-- category sliderslider end -->
<!-- sub categories start -->


 
 
@endsection



@section('custom-script')

<script type="text/javascript">
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;
        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
    };


    $('.type').on('click', function() {
        if ($(this).is(':checked')) {
            var type = $(this).val();

            var exist = window.location.href;
            var url = new URL(exist);
            var query_string = url.search;
            var search_params = new URLSearchParams(query_string);
            search_params.set('type', type);
            url.search = search_params.toString();
            var new_url = url.toString();
            window.history.pushState('page2', 'Title', new_url);

        } else {
            var element = '&type=' + getUrlParameter('type');
            var exist = window.location.href;
            var new_url = exist.replace(element, '');
            window.history.pushState('page2', 'Title', new_url);
        }

        location.reload();

    });


    $('.lang').on('click', function() {
        if ($(this).is(':checked')) {
            var type = $(this).val();

            var exist = window.location.href;
            var url = new URL(exist);
            var query_string = url.search;
            var search_params = new URLSearchParams(query_string);
            search_params.set('lang', type);
            url.search = search_params.toString();
            var new_url = url.toString();
            window.history.pushState('page2', 'Title', new_url);

        } else {
            var element = '&lang=' + getUrlParameter('lang');
            var exist = window.location.href;
            var new_url = exist.replace(element, '');
            window.history.pushState('page2', 'Title', new_url);
        }

        location.reload();

    });


    $("#category-cahnge").on('change', function () {

        var $val = $(this).val();

        if($val == 0){
            alert('all');
        }

        window.location.replace($val);
    });

</script>


@endsection

<style>

    .view-block {
        border-radius: 6px;
        background: #fff;
        position: relative;
    }

    .trending {
        position: absolute;
        text-align: center;
        font-size: 10px;
        font-weight: 500;
        top: -5px;
        bottom: 0;
        left: 0;
        width: 80px;
        height: auto;
        z-index: 9;
        border-radius: 0;
        text-transform: capitalize;
        background: url(http://edu.engwalaa.com/images/course_rebon.png);
            background-repeat: repeat;
        background-repeat: no-repeat;
    }

    .best-seller {
        position: absolute;
        text-align: center;
        font-size: 10px;
        font-weight: 500;
        top: 21px !important;
        bottom: 0;
        left: -19px !important;
        background-color: transparent !important;
        width: 80px;
        height: 15px;
        z-index: 9;
        border-radius: 0 10px 10px 0;
        text-transform: capitalize;
        transform: rotate(-271deg);
    }

    .view-dtl,
    .student-view-block{
        transition: all 0.5s ease-in-out;

    }

    .student-view-block:hover .view-dtl{
        background: rgb(16,98,144);
        background: linear-gradient(0deg, rgba(16,98,144,1) 0%, rgba(7,11,92,1) 100%);
    }


    .student-view-block:hover {
        margin: 6px;
        border-radius: 7px;
        box-shadow: 0px 6px 16px #9d999975;
        transform: translateY(-18px);
    }

    .pagination{
        margin: 50px 20px;
    }

</style>