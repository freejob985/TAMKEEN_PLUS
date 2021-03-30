@extends('theme.master')
@section('title', 'Careers')
@section('content')
<style>.student-heading {
    margin: 33px 0px;
    color: #ef7716;
}</style>


@dd($sliders);
@if(isset($sliders))
<section id="home-background-slider" class="background-slider-block owl-carousel"">
    <div class="lazy item home-slider-img">
        @foreach($sliders as $slider)

        @if($slider->status == 1)
        <div id="home" class="home-main-block" style="background-image: url('{{ asset('images/slider/'.$slider['image']) }}')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 {{$slider['left'] == 1 ? 'col-md-offset-6 col-sm-offset-6 col-sm-6 col-md-6 text-right' : ''}}">
                        <div class="home-dtl wow slideInUp">
                            <div class="home-heading">{{ $slider['heading'] }}</div>
                            <p class="btm-10">{{ $slider['sub_heading'] }}</p>
                            <p class="btm-20">{{ $slider['detail'] }}</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>
@endif
@if($data['one_enable'] == 1)
<!-- about-home start -->
<section id="careers" class="about-home-one-main-block careers-main-block">
    <div class="container">
        <div class="careers-block">
            <div class="row justify-content-center">
                <div class="col-lg-8 wow slideInDown">
                <h1 class="careers-heading text-center text-white">{{ $data->one_heading }}</h1>
                <p class="text-center text-white btm-40">{{ $data->one_text }}</p>
                <div class="careers-btn btm-40 text-center">
                    <a href="{{ $data->three_btntxt }}" class="btn btn-primary" title="careers">{{ $data->one_btntxt }}</a>
                </div>
            </div>
        </div>
    </div>
</section> 
<!-- about-home end -->

@include('admin.message')
<!-- about-Transforming start -->
@if($about['two_enable'] == 1)
<section id="about-transforming" class="about-transforming-main-block">
   <div class="container" style="width:92%;">
        <div class="about-transforming-heading-block text-center">
            <div class="row">
                <div class="offset-lg-12 col-lg-12 col-12">
                    <h1 class="text-center">{{ $about->two_heading }}</h1>  
                    <p>{{ $about->two_text }}</p>
                </div>
            </div>
        </div>
     

        <div class="container d-flex">
            <div class="row">
              
                <div class="col-lg-8 wow slideInRight">
                    <div id="content" class="tab-content" role="tablist">
                        <div id="pane-A" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
                          <div class="card-header" role="tab" id="heading-A">
                            <h5 class="mb-0">
                              <a data-toggle="collapse" href="#collapse-A" data-parent="#content" aria-expanded="true" aria-controls="collapse-A">
                                    {{ $about->two_txtone }}
                                  </a>
                            </h5>
                          </div>
                          <div id="collapse-A" class="collapse show" role="tabpanel" aria-labelledby="heading-A">
                            <div class="card-body">
                              <div class="about-transforming-img">
                                <a href="#" title="about">
                                    <img src="{{ asset('images/about/'.$about->two_imageone) }}" class="img-fluid" alt="about-img"><div class="overlay-bg"></div>
                                </a>
                            </div>
                            <div class="about-transforming-block">
                                <h3>{{ $about->two_txtone }}</h3>
                                <p class="btm-40">{{ $about->two_imagetext }}</p>
                            </div>
                            </div>
                          </div>
                        </div>

                        <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                          <div class="card-header" role="tab" id="heading-B">
                            <h5 class="mb-0">
                              <a class="collapsed" data-toggle="collapse" href="#collapse-B" data-parent="#content" aria-expanded="false" aria-controls="collapse-B">
                                    {{ $about->two_txttwo }}
                                  </a>
                            </h5>
                          </div>
                          <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                            <div class="card-body">
                                <div class="about-transforming-img">
                                    <a href="#" title="about">
                                        <img src="{{ asset('images/about/'.$about->two_imagetwo) }}" class="img-fluid" alt="about-img"><div class="overlay-bg"></div>
                                    </a>
                                </div>
                                <div class="about-transforming-block">
                                    <h3>{{ $about->two_txttwo }}</h3>
                                    <p class="btm-40">{{ $about->text_one }}</p>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div id="pane-C" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-C">
                          <div class="card-header" role="tab" id="heading-C">
                            <h5 class="mb-0">
                              <a class="collapsed" data-toggle="collapse" href="#collapse-C" data-parent="#content" aria-expanded="false" aria-controls="collapse-C">
                                    {{ $about->two_txtthree }}
                                  </a>
                            </h5>
                          </div>
                          <div id="collapse-C" class="collapse" role="tabpanel" aria-labelledby="heading-C">
                            <div class="card-body">
                                <div class="about-transforming-img">
                                    <a href="#" title="about">
                                        <img src="{{ asset('images/about/'.$about->two_imagethree) }}" class="img-fluid" alt="about-img"><div class="overlay-bg"></div>
                                    </a>
                                </div>
                                <div class="about-transforming-block">
                                    <h3>{{ $about->two_txtthree }}</h3>
                                    <p class="btm-40">{{ $about->text_two }}</p>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div id="pane-D" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-D">
                          <div class="card-header" role="tab" id="heading-D">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapse-D" data-parent="#content" aria-expanded="false" aria-controls="collapse-C">
                                    {{ $about->two_txtfour }}
                                </a>
                            </h5>
                          </div>
                          <div id="collapse-D" class="collapse" role="tabpanel" aria-labelledby="heading-D">
                            <div class="card-body">
                                <div class="about-transforming-img">
                                    <a href="#" title="about">
                                        <img src="{{ asset('images/about/'.$about->two_imagefour) }}" class="img-fluid" alt="about-img"><div class="overlay-bg"></div>
                                    </a>
                                </div>
                                <div class="about-transforming-block">
                                    <h3>{{ $about->two_txtfour }}</h3>
                                    <p class="btm-40">{{ $about->text_three }}</p>
                                </div>
                            </div>
                          </div>
                        </div>

                    </div>
                </div>
                  <div class="col-lg-4 wow slideInLeft">
                    <ul id="tabs" class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                          <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">
                            <img src="{{ asset('images/about/'.$about->two_imageone) }}" class="img-fluid tab-img" alt="about-img">
                            <div class="about-nav-heading active">{{ $about->two_txtone }}</div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab">
                            <img src="{{ asset('images/about/'.$about->two_imagetwo) }}" class="img-fluid tab-img" alt="about-img">
                            <div class="about-nav-heading active">{{ $about->two_txttwo }}</div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a id="tab-C" href="#pane-C" class="nav-link" data-toggle="tab" role="tab">
                            <img src="{{ asset('images/about/'.$about->two_imagethree) }}" class="img-fluid tab-img" alt="about-img">
                            <div class="about-nav-heading active">{{ $about->two_txtthree }}</div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a id="tab-D" href="#pane-D" class="nav-link" data-toggle="tab" role="tab">
                            <img src="{{ asset('images/about/'.$about->two_imagefour) }}" class="img-fluid tab-img" alt="about-img">
                            <div class="about-nav-heading active">{{ $about->two_txtfour }}</div>
                          </a>
                        </li>
                    </ul>
                </div>
        </div>

   </div> 
</section>
@endif
<!-- about-Transforming end -->

<!-- careers-video start -->
<section id="careers-video" class="careers-video-main-block wow zoomIn" >
    <div class="container">
        <div class="careers-video">
            <a href="#" title="about">
                <img src="{{ asset('images/careers/'.$data->one_video) }}" class="img-fluid" alt="about-img">
            </a>
        </div>
    </div>
</section>
@endif
<!-- careers-video end -->

<!-- careers-learn start -->
@if($data['three_enable'] == 1)
<section id="careers-learn" class="careers-learn-main-block" style="background-image: url('{{ asset('images/careers/'.$data->three_bg_image) }}')">
    <div class="container">
        <div class="careers-learn-block">
            <div class="row">
                <div class="col-lg-6">
                    <div class="careers-learn-video bdr-right wow slideInRight">
                        <a href="#" title="about">
                            <img src="{{ asset('images/careers/'.$data->three_video) }}" class="img-fluid" alt="careers">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="careers-learn-video-one wow slideInLeft">
                        <div class="careers-learn-heading btm-10">{{ $data->three_heading }}</div>
                        <p>شباب العالم العربى سيقود العالم قريبا معاُ نحو الابتكار وريادة الاعمال شباب العالم العربى سيقود العالم قريبا معاُ نحو الابتكار وريادة الاعمال

سخة لك بسهولة ويسر ..

 شباب العالم العربى سيقود العالم قريبا معاُ نحو الابتكار وريادة الاعمال شباب العالم العربى سيقود العالم قريبا معاُ نحو الابتكار وريادة الاعمال

</p>
   <a  style="border-radius: 20px;background: #d3a355;padding:10px 18px;color:#fff;" href="#" title="careers">للمزيد</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- careers-learn end -->

<!-- careers-info start -->
@if($data['two_enable'] == 1)
<section id="careers-info" class="careers-info-main-block">
    <div class="container">
        <div class="careers-block-one">
            <div class="row">
                @php
                    $items = App\Testimonial::limit(4)->get();
                @endphp
                @foreach($items as $item)
                <div class="col-lg-6">
                    <div class="careers-info-block bdr-right">
                        <div class="careers-info-img btm-20"><img src="{{ asset('images/testimonial/'. $item->image) }}" class="img-fluid"></div>
                        <h3 class="careers-info-heding btm-30">{{ $item->client_name }}</h3>
                        <p>{{ strip_tags(str_limit($item->details, $limit = 150, $end = '...')) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
<!-- careers-info end -->






<!-- learning-learn-img start-->
@if($data['four_enable'] == 1)
 <section id="learning-learn-img" class="learning-learn-img-main-block">
    <div class="container-fluid">
        <div class="learning-learn-img-block">
            <div class="row no-gutters">
                <div class="col-lg-3">
                      <div class="height wow zoomIn">
                    <a href="#" title="NextClass-learn"><img src="{{ asset('images/careers/'.$data->four_img_one) }}" title="img" class="img-fluid"></a>
                      </div>
                    <div class="height wow zoomIn">
                    <a href="#" title="NextClass-learn"><img src="{{ asset('images/careers/'.$data->four_img_two) }}" title="img" class="img-fluid"></a>
                </div>
                  </div>
                <div class="col-lg-3">
                    <div class="height wow zoomIn">
                        <a href="#" title="NextClass-learn"><img src="{{ asset('images/careers/'.$data->four_img_three) }}" title="img" class="img-fluid"></a>
                    </div>
                    <div class="height wow zoomIn">
                        <a href="#" title="NextClass-learn"><img src="{{ asset('images/careers/'.$data->four_img_four) }}" title="img" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-lg-3">
                   <div class="height wow zoomIn">
                            <a href="#" title="NextClass-learn"><img src="{{ asset('images/careers/'.$data->four_img_six) }}" title="img" class="img-fluid"></a>
                        </div>
                     <div class="height wow zoomIn">
                            <a href="#" title="NextClass-learn"><img src="{{ asset('images/careers/'.$data->four_img_seven) }}" title="img" class="img-fluid"></a>
                        </div>
                   
                </div>
                <div class="col-lg-3">
                   <div class="height wow zoomIn">
                        <a href="#" title="NextClass-learn"><img src="{{ asset('images/careers/'.$data->four_img_eight) }}" title="img" class="img-fluid"></a>
                    </div>
                    <div class="height wow zoomIn">
                        <a href="#" title="NextClass-learn"><img src="{{ asset('images/careers/'.$data->four_img_nine) }}" title="img" class="img-fluid"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- learning-learn-img end -->
<!-- careers-benefits start -->
@if($data['five_enable'] == 1)
<section id="careers-benefits" class="careers-benefits-main-block">
    <div class="container">
        <div class="careers-benefits-block">
            <div class="careers-benefits-heading text-center">{{ $data->five_heading }}</div>
            <p class="text-center btm-40">{{ $data->five_text }}</p>
            <div class="row">
                <div class="col-lg-6">
                    <div class="careers-benefits-dtl-block btm-40">
                        <div class="careers-benefits-icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="careers-benefits-dtl">
                            <div class="careers-benefits-dtl-heading">{{ $data->five_textone }}</div>
                            <p>{{ $data->five_dtlone }}</p>
                        </div>
                    </div>
                    <div class="careers-benefits-dtl-block btm-40">
                        <div class="careers-benefits-icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="careers-benefits-dtl">
                            <div class="careers-benefits-dtl-heading">{{ $data->five_texttwo }}</div>
                            <p>{{ $data->five_dtltwo }}</p>
                        </div>
                    </div>
                    <div class="careers-benefits-dtl-block btm-40">
                        <div class="careers-benefits-icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="careers-benefits-dtl">
                            <div class="careers-benefits-dtl-heading">{{ $data->five_textthree }}</div>
                            <p>{{ $data->five_dtlthree }}</p>
                        </div>
                    </div>
                    <div class="careers-benefits-dtl-block btm-40">
                        <div class="careers-benefits-icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="careers-benefits-dtl">
                            <div class="careers-benefits-dtl-heading">{{ $data->five_textfour }}</div>
                            <p>{{ $data->five_dtlfour }}</p>
                        </div>
                    </div>
                    <div class="careers-benefits-dtl-block btm-40">
                        <div class="careers-benefits-icon">
                            <i class="fa fa-check"></i>
                        </div>   
                        <div class="careers-benefits-dtl">
                            <div class="careers-benefits-dtl-heading">{{ $data->five_textfive }}</div>
                            <p>{{ $data->five_dtlfive }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="careers-benefits-dtl-block btm-40">
                        <div class="careers-benefits-icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="careers-benefits-dtl">
                            <div class="careers-benefits-dtl-heading">{{ $data->five_textsix }}</div>
                            <p>{{ $data->five_dtlsix }}</p>
                        </div>
                    </div>
                    <div class="careers-benefits-dtl-block btm-40">
                        <div class="careers-benefits-icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="careers-benefits-dtl">
                            <div class="careers-benefits-dtl-heading">{{ $data->five_textseven }}</div>
                            <p>{{ $data->five_dtlseven }}</p>
                        </div>
                    </div>
                    <div class="careers-benefits-dtl-block btm-40">
                        <div class="careers-benefits-icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="careers-benefits-dtl">
                            <div class="careers-benefits-dtl-heading">{{ $data->five_texteight }}</div>
                            <p>{{ $data->five_dtleight }}</p>
                        </div>
                    </div>
                    <div class="careers-benefits-dtl-block btm-40">
                        <div class="careers-benefits-icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="careers-benefits-dtl">
                            <div class="careers-benefits-dtl-heading">{{ $data->five_textnine }}</div>
                            <p>{{ $data->five_dtlnine }}</p>
                        </div>
                    </div>
                    <div class="careers-benefits-dtl-block btm-40">
                        <div class="careers-benefits-icon">
                            <i class="fa fa-check"></i>
                        </div>   
                        <div class="careers-benefits-dtl">
                            <div class="careers-benefits-dtl-heading">{{ $data->five_textten }}</div>
                            <p>{{ $data->five_dtlten }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- careers-benefits end -->
<!-- join-team start -->
@if($data['six_enable'] == 1)
<section id="join-team" class="join-team-main-block">
    <div class="container">
        <div class="join-team-block">
            <div class="careers-benefits-heading text-center">{{ $data->six_heading }}</div>
            <p class="text-center">{{ $data->six_text }}</p>
            
            <div class="faq-block">
                <div class="faq-dtl">
                    <div id="accordion" class="second-accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <div class="mb-0">
                                    <h3 class="text-center">{{ $data->six_topic_one }}</h3>
                                </div>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <div class="mb-0">
                                    <h3 class="text-center">{{ $data->six_topic_two }}  </h3>
                                    
                                </div>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <div class="mb-0">
                                    <h3 class="text-center">{{ $data->six_topic_three }}  </h3>
                                   
                                </div>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <div class="mb-0">
                                    <h3 class="text-center">{{ $data->six_topic_four }} </h3>
                                    
                                </div>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <div class="mb-0">
                                    <h3 class="text-center">{{ $data->six_topic_five }} </h3>
                                   
                                </div>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="card">
                            <div class="card-header" id="headingSix">
                                <div class="mb-0">
                                   <h3 class="text-center">{{ $data->six_topic_six }}</h3>
                                   
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- join-team end -->


<!-- Advertisement -->
{{--  بداية اضافة المبرمج  --}}
@php
$cors = App\Course::where('status', '1')->where('category_id', "7")->orderBy('id', 'desc')->take(20)->get();
@endphp
@if( ! $cors->isEmpty() )




    <div class="container">
        <h4 class="student-heading">برامج ريادة الاعمال والتسويق</h4>
        <div id="my-courses-slidera" class="student-view-slideraa-main-blockaa owl-carousel">
            @foreach($cors as $c)
              @if($c->status == 1 && $c->featured == 1)
                <div class="item student-view-blockaa student-view-block-1">
                    <div class="genre-slide-image @if($gsetting['course_hover'] == 1) protip @endif" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block{{$c->id}}">
                        <div class="view-block">
                            <div class="view-img">
                                @if($c['preview_image'] !== NULL && $c['preview_image'] !== '')
                                    <a href="{{ route('user.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}"><img data-src="{{ asset('images/course/'.$c['preview_image']) }}" alt="course" class="img-fluid owl-lazy"></a>
                                @else
                                    <a href="{{ route('user.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}"><img data-src="{{ Avatar::create($c->title)->toBase64() }}" alt="course" class="img-fluid owl-lazy"></a>
                                @endif
                            </div>
                            @if($c['level_tags'] == !NULL)
                            <div class="best-seller">{{ $c['level_tags'] }}</div>
                            @endif
                            <div class="view-dtl">
                                <div class="view-heading btm-10"><a href="{{ route('user.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}">{{ str_limit($c->title, $limit = 30, $end = '...') }}</a></div>
                                <p class="btm-10"><a herf="#">{{ __('frontstaticword.by') }}
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
                    </div>
                    <div id="prime-next-item-description-block{{$c->id}}" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">{{ $c['title'] }}</h5>
                                <div class="protip-img">
                                    @if($c['preview_image'] !== NULL && $c['preview_image'] !== '')
                                        <a href="{{ route('Instructor.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}"><img src="{{ asset('images/course/'.$c['preview_image']) }}" alt="student" class="img-fluid">
                                        </a>
                                    @else
                                        <a href="{{ route('Instructor.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}"><img src="{{ Avatar::create($c->title)->toBase64() }}" alt="student" class="img-fluid">
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
              @endif
            @endforeach
        </div>

    </div>
    {{--  نهاية اضافة المبرمج  --}}

@endif
<!-- Students end -->


@endsection
