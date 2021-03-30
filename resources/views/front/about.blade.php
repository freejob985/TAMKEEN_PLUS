@extends('theme.master')
@section('title', 'About Us')
@section('content')

@include('admin.message')

<!-- about-home start -->
@if($about['one_enable'] == 1)
<section id="about-home-one" class="about-home-one-main-block" style="background-image: url('{{ asset('images/about/'.$about->one_image) }}')">
    <div class="overlay-bg"></div>
    <div class="container">
        <h1 class="about-home-one-heading text-center">{{ $about->one_heading }}</h1>
    </div>
</section>
<section id="about-blog" class="about-blog-main-block">
    <div class="container">
        <div class="about-blog-block text-center"><a href="{{ $about->link_four }}" title="NextClass Blog"><span>
            <i class="fa fa-circle rgt-10"></i>{{ $gsetting->project_title }} Blog: </span>{{ $about->one_text }}</a>
        </div>
    </div>   
</section>
@endif 
<!-- about-blog end -->
<!-- about-team start-->
@if($about['five_enable'] == 1)
<section id="about-team" class="about-team-main-block">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-6">
                <div class="about-team-block text-center">
                    <div class="about-team-heading btm-20">{{ $about->five_heading }}</div>
                    <p class="btm-40">{{ str_limit($about->five_text, $limit = 20000, $end = '...') }}</p>
                   
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-team-img">
                    <img src="{{ asset('images/about/'.$about->five_imageone) }}" class="img-fluid" alt="about-img">
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-6 col-sm-6">
                       <div class="about-team-img">
                            <img src="{{ asset('images/about/'.$about->five_imagetwo) }}" class="img-fluid" alt="about-img">
                        </div> 
                    </div>
                    <div class="col-lg-6 col-sm-6">
                       <div class="about-team-img">
                            <img src="{{ asset('images/about/'.$about->five_imagethree) }}" class="img-fluid" alt="about-img">
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- about-team start-->
<!-- about-work start-->
@if($about['four_enable'] == 1)
<section id="about-work" class="about-work-main-block">
    <div class="container-fluid" style="padding:0!important;">
        <div class="row no-gutters">
            <div class="col-lg-6">
                <div class="about-work-block text-center">
                    <div class="about-work-heading">{{ $about->four_heading }}</div>
                    <p class="btm-30">{{ $about->four_text }}</p>
                   
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-work-video">
                    <div class="video-item hidden-xs">
                        <script type="text/javascript">
                        var video_url = '<iframe src="https://www.youtube.com/embed/ZMdCsIaE7II?autoplay=1&showinfo=0" frameborder="0"></iframe>';
                        </script>
                        <div class="video-device">
                            <img src="{{ asset('images/about/'.$about->four_imageone) }}" class="bg_img img-fluid" alt="Background">

                            <div class="overlay-bg"></div>
                            <div class="video-preview">
                                <p>{{ $about->four_txtone }}</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-6">
                <div class="about-work-video">
                    <div class="video-item hidden-xs">
                        <script type="text/javascript">
                        var video_url = '<iframe src="https://www.youtube.com/embed/ZMdCsIaE7II?autoplay=1&showinfo=0" frameborder="0"></iframe>';
                        </script>
                        <div class="video-device">
                            <img src="{{ asset('images/about/'.$about->four_imagetwo) }}" class="bg_img img-fluid" alt="Background">

                            <div class="overlay-bg"></div>
                            <div class="video-preview">
                                <p>{{ $about->four_txttwo }}</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-work-block text-center">
                    <div class="about-work-heading">{{ $about->four_heading }}</div>
                    <p class="text-white btm-30">{{ $about->four_text }}</p>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- about-work end-->

<!-- about-learning-blog start-->
@if($about['six_enable'] == 1)
<section id="about-learning-blog" class="about-learning-blog-main-block">
    <div class="container">
        <h1 class="about-learning-blog-heading text-white text-center btm-40">{{ $about->six_heading }}</h1>
        <div class="about-learning-blog-block">
            <div class="row">
                <div class="col-lg-4">
                    <a href="{{ $about->link_one }}">
                    <div class="about-learning-blog-dtl text-white btm-20">
                        <h3 class="about-learning-blog-dtl-heading text-white">{{ $about->six_txtone }}</h3>
                        <div class="row">
                            <div class="col-lg-10 col-9">
                                <div class="about-learning-blog-paragraph">
                                    <p>{{ str_limit($about->six_deatilone, $limit = 100, $end = '...') }}</p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-3">
                                <div class="about-learning-blog-icon lft-7">
                                    <i class="fa fa-chevron-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="{{ $about->link_two }}">
                    <div class="about-learning-blog-dtl text-white btm-20">
                        <h3 class="about-learning-blog-dtl-heading text-white">{{ $about->six_txttwo }}</h3>
                        <div class="row">
                            <div class="col-lg-10 col-9">
                                <div class="about-learning-blog-paragraph lft-7">
                                    <p>{{ str_limit($about->six_deatiltwo, $limit = 100, $end = '...') }}</p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-3">
                                <div class="about-learning-blog-icon">
                                    <i class="fa fa-chevron-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="{{ $about->link_three }}">
                    <div class="about-learning-blog-dtl text-white">
                        <h3 class="about-learning-blog-dtl-heading text-white">{{ $about->six_txtthree }}</h3>
                        <div class="row">
                            <div class="col-lg-10 col-9">
                                <div class="about-learning-blog-paragraph">
                                    <p>{{ str_limit($about->six_deatilthree, $limit = 100, $end = '...') }}</p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-3">
                                <div class="about-learning-blog-icon lft-7">
                                    <i class="fa fa-chevron-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            </br></br>
        </div>
    </div>
    
    
<!-- testimonial start -->
 @php
    $testi = App\Testimonial::all();
@endphp
@if( ! $testi->isEmpty() )
<section id="testimonial" class="testimonial-main-block">
    <div class="container">
        <h3 class="btm-30">{{ __('frontstaticword.HomeTestimonial') }}</h3>
        <div id="testimonial-slider" class="testimonial-slider-main-block owl-carousel">

            @foreach($testi as $tes)
             @if($tes->status == 1)
            <div class="item testimonial-block">
                <ul>
                    <li><img data-src="{{ asset('images/testimonial/'.$tes['image']) }}" alt="blog" class="img-fluid owl-lazy"></li>
                    <li><h5 class="testimonial-heading">{{ $tes['client_name'] }}</h5></li>
                </ul>
                <p>{!! str_limit($tes->details , $limit = 300, $end = '...') !!}</p>
            </div>
             @endif
            @endforeach
        </div>

    </div>
</section>
@endif

    <div class="about-social-list text-white text-center">
        <ul>
            <li>Follow Us :</li>
            @if($about->four_btntext == !NULL)
            <li><a href="{{ $about->four_btntext }}" target="_blank" title="facebook"><i class="fab fa-facebook-f"></i></a></li>
            @endif
            @if($about->five_btntext == !NULL)
            <li><a href="{{ $about->five_btntext }}" target="_blank" title="instagram"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
            @endif
            @if($about->linkedin == !NULL)
            <li><a href="{{ $about->linkedin }}" target="_blank" title="linkedin"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
            @endif
            @if($about->twitter == !NULL)
            <li><a href="{{ $about->twitter }}" target="_blank" title="twitter"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
            @endif
        </ul>
    </div>
</section>
@endif
<!-- about-learning-blog end-->
@endsection
