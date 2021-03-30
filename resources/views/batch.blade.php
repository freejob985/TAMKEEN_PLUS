@extends('theme.master')
@section('title', 'Online Courses')
@section('content')

@include('admin.message')
@include('sweetalert::alert')
<!-- Batch start -->
@if(isset($batches))





    






    <section id="batch-block" class="student-main-block">
        <div class="container">
            @if(count($batches) > 0)
            <h4 class="student-heading">دورات خاصة</h4>
    
            <div class="row">
                @foreach($batches as $c)
            
             @if($c->status == 1 && $c->featured == 1)
                
                    <div class="col-md-2">
                   <div class="item student-view-block student-view-block-1">
            
                            <div class="view-block wow fadeIn">
                                <div class="view-img">
                                    @if($c['preview_image'] !== NULL && $c['preview_image'] !== '')
                                        <a href="{{ route('batch.detail',['id' => $c->id, 'slug' => $c->slug ]) }}">
                                            <img src="{{ asset('images/batch/'.$c['preview_image']) }}" data-src="{{ asset('images/course/'.$c['preview_image']) }}" alt="course" class="img-fluid owl-lazy"></a>
                                    @else
                                        <a href="{{ route('batch.detail',['id' => $c->id, 'slug' => $c->slug ]) }}">
                                            <img src="{{ asset('images/batch/'.$c['preview_image']) }}" data-src="{{ Avatar::create($c->title)->toBase64() }}" alt="course" class="img-fluid owl-lazy"></a>
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
                                    <div class="view-heading btm-10"><a href="{{ route('batch.detail',['id' => $c->id, 'slug' => $c->slug ]) }}">{{ str_limit($c->title, $limit = 30, $end = '...') }}</a></div>
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
                                            <a href="{{ route('batch.detail',['id' => $c->id, 'slug' => $c->slug ]) }}"><img src="{{ asset('images/course/'.$c['preview_image']) }}" alt="student" class="img-fluid">
                                            </a>
                                        @else
                                            <a href="{{ route('batch.detail',['id' => $c->id, 'slug' => $c->slug ]) }}"><img src="{{ Avatar::create($c->title)->toBase64() }}" alt="student" class="img-fluid">
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
            @endif
    
        </div>
    </section>






<section id="batch-block" class="student-main-block">
    <div class="container">
        @if(count($batches) > 0)
        <h4 class="student-heading">دورات خاصة</h4>

        <div id="batch-view-slider" class="student-view-slider-main-block owl-carousel">
            @foreach($batches as $batch)
                @if($batch->status == 1)

                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image @if($gsetting['course_hover'] == 1) protip @endif" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block-5{{$batch->id}}">
                        <div class="view-block">
                            <div class="view-img">
                                @if($batch['preview_image'] !== NULL && $batch['preview_image'] !== '')
                                    <a href="{{ route('batch.detail', $batch->id) }}"><img data-src="{{ asset('images/batch/'.$batch['preview_image']) }}" alt="course" class="img-fluid owl-lazy"></a>
                                @else
                                    <a href="{{ route('batch.detail', $batch->id) }}"><img data-src="{{ Avatar::create($batch->title)->toBase64() }}" alt="course" class="img-fluid owl-lazy"></a>
                                @endif
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading btm-10"><a href="{{ route('batch.detail', $batch->id) }}">{{ str_limit($batch->title, $limit = 30, $end = '...') }}</a></div>
                                <p class="btm-10"><a herf="#">{{ __('frontstaticword.by') }} {{ $batch->user['fname'] }} {{ $batch->user['lname'] }}</a></p>

                                <p class="btm-10"><a herf="#">Created At: {{ date('d-m-Y',strtotime($batch['created_at'])) }}</a></p>

                            </div>

                        </div>
                    </div>
                    <div id="prime-next-item-description-block-5{{$batch->id}}" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">{{ $batch['title'] }}</h5>
                                <div class="protip-img">
                                    @if($batch['preview_image'] !== NULL && $batch['preview_image'] !== '')
                                        <a href="{{ route('batch.detail', $batch->id) }}"><img src="{{ asset('images/batch/'.$batch['preview_image']) }}" alt="student" class="img-fluid">
                                        </a>
                                    @else
                                        <a href="{{ route('batch.detail', $batch->id) }}"><img src="{{ Avatar::create($batch->title)->toBase64() }}" alt="course" class="img-fluid"></a>
                                    @endif
                                </div>



                                <div class="main-des">
                                    <p>{!! str_limit($batch['detail'], $limit = 200, $end = '...') !!}</p>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                @endif

            @endforeach
        </div>

        @endif

    </div>
</section>

@endif
<!-- Batch end -->
@if( !$trusted->isEmpty() )
<section id="trusted" class="trusted-main-block">
    <div class="container">
        <div class="patners-block">

            <h6 class="patners-heading text-center btm-40">{{ __('frontstaticword.Trusted') }}</h6>
            <div id="patners-slider" class="patners-slider owl-carousel">
                @foreach($trusted as $trust)
                    @if($trust->status == 1)
                    <div class="item-patners-img">
                        <a href="{{ $trust['url'] }}" target="_blank"><img data-src="{{ asset('images/trusted/'.$trust['image']) }}" class="img-fluid owl-lazy" alt="patners-1"></a>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

</section>
@endif

<section id="trusted" class="trusted-main-block">
    <!-- google adsense code -->
    <div class="container-fluid" id="adsense">
        @php
            $ad = App\Adsense::first();
        @endphp
        <?php
            if (isset($ad) ) {
             if ($ad->ishome==1 && $ad->status==1) {
                $code = $ad->code;
                echo html_entity_decode($code);
             }
            }
        ?>
    </div>
</section>

@endsection

@section('custom-script')
<script>
    (function($) {
      "use strict";
        $(function() {
           $( "#home-tab" ).trigger( "click" );
        });
    })(jQuery);

    function showtab(id){
        $.ajax({
            type : 'GET',
            url  : '{{ url('/tabcontent') }}/'+id,
            dataType  : 'html',
            success : function(data){

                $('#tabShow').html('');
                $('#tabShow').append(data);
            }
        });
    }
</script>

@endsection
