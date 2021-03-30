<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<meta name="csrf-token" content="{{csrf_token()}}">
{!! SEO::generate() !!}

<title>@yield('title') | {{ $project_title ?? '' }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Media City" />
<meta name="MobileOptimized" content="320" />
@if(isset($gsetting))
<link rel="icon" type="image/icon" href="{{ asset('images/favicon/'.$gsetting->favicon) }}"> <!-- favicon-icon -->
@endif
<!-- theme styles -->
<link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/> <!-- bootstrap css -->
<link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:300,400,500,700" rel="stylesheet"> <!--  google fonts -->
<link href="https://fonts.googleapis.com/css?family=Muli&display=swap:400,500,600,700" rel="stylesheet"><!-- google fonts -->
<link rel="stylesheet" href="{{ url('vendor/fontawesome/css/all.css') }}" /> <!--  fontawesome css -->
<link rel="stylesheet" href="{{ url('vendor/font/flaticon.css') }}" /> <!-- fontawesome css -->
<link rel="stylesheet" href="{{ url('vendor/navigation/menumaker.css') }}" /> <!-- navigation css -->
<link rel="stylesheet" href="{{ url('vendor/owl/css/owl.carousel.min.css') }}" /> <!-- owl carousel css -->
<link rel="stylesheet" href="{{ url('vendor/protip/protip.css') }}" /> <!-- menu css -->

<?php
$language = Session::get('changed_language'); //or 'english' //set the system language
$rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku', 'fa'); //make a list of rtl languages
?>
@if (in_array($language,$rtl))
<link href="{{ url('css/rtl.css') }}" rel="stylesheet" type="text/css"/> <!-- rtl css -->
@else

<link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css"/> <!-- custom css -->
@endif
<link rel="stylesheet" href="{{ url('css/colorbox.css') }}">
<link rel="stylesheet" href="{{url('admin/bower_components/font-awesome/css/font-awesome.min.css')}}"><!-- fontawesome css -->
<link rel="stylesheet" href="{{ url('css/select2.min.css') }}"> <!-- select2 css -->
<link rel="stylesheet" href="{{ URL::asset('css/pace.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('css/protip.css') }}" /> <!-- protip css -->
<link rel="manifest" href="{{url('manifest.json')}}">
<link rel="stylesheet" href="{{ asset('css/custom-style.css') }}"/>
<link rel="stylesheet" href="{{ asset('css/animate.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('css/venom-button.min.css') }}" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous"></script>
  <script>
              new WOW().init();
              </script>
@if(env('PWA_ENABLE') == 1)
  @laravelPWA
@endif


<!-- end theme styles -->
@php
if(Schema::hasTable('color_options')){
  $color = App\ColorOption::first();
}
@endphp
@if(isset($color))

<style type="text/css">
  
  :root {
  --linear-gradient-bg-color:linear-gradient(-45deg, {{ $color['linear_bg_one'] }} 0, {{ $color['linear_bg_two'] }} 100%);
  --linear-gradient-reverse-bg-color:linear-gradient(-45deg, {{ $color['linear_reverse_bg_one'] }} 0, {{ $color['linear_reverse_bg_two'] }} 100%);
  --linear-gradient-about-bg-color:linear-gradient(197.61deg, {{ $color['linear_about_bg_one'] }} , {{ $color['linear_about_bg_two'] }});
  --linear-gradient-about-blue-bg-color:linear-gradient(40deg, {{ $color['linear_about_bluebg_one'] }} 33%, {{ $color['linear_about_bluebg_two'] }} 84%);
  --linear-gradient-career-bg-color:linear-gradient(22.72914987deg, {{ $color['linear_career_bg_one'] }} 4%, {{ $color['linear_career_bg_two'] }});
  --background-blue-bg-color: {{ $color['blue_bg'] }};
  --background-red-bg-color: {{ $color['red_bg'] }}; 
  --background-grey-bg-color:{{ $color['grey_bg'] }};
  --background-light-grey-bg-color:{{ $color['light_grey_bg'] }};
  --background-black-bg-color:{{ $color['black_bg'] }};
  --background-white-bg-color:{{ $color['white_bg'] }};
  --background-mehroon-bg-color:{{ $color['dark_red_bg'] }};
  --text-black-color:{{ $color['black_text'] }};
  --text-light-grey-color:{{ $color['light_grey_text'] }};
  --text-dark-grey-color:{{ $color['dark_grey_text'] }};
  --text-red-color:{{ $color['red_text'] }};
  --text-blue-color:{{ $color['blue_text'] }};
  --text-dark-blue-color:{{ $color['dark_blue_text'] }};
  --text-white-color:{{ $color['white_text'] }};
}
</style>

@else

<style type="text/css">
 :root {

  --linear-gradient-bg-color:linear-gradient(-45deg, #F44A4A 0, #6E1A52 100%);
  --linear-gradient-reverse-bg-color:linear-gradient(-45deg, #6E1A52 0,#F44A4A 100%);
  --linear-gradient-about-bg-color:linear-gradient(197.61deg,#F44A4A,#6E1A52);
  --linear-gradient-about-blue-bg-color:linear-gradient(40deg,#1A263A 33%,#4A8394 84%);
  --linear-gradient-career-bg-color:linear-gradient(22.72914987deg,#F5C252 4%,#6AC1D0);
  --background-blue-bg-color: #0284A2;
  --background-red-bg-color:#F44A4A; 
  --background-grey-bg-color:#F7F8FA;
  --background-light-grey-bg-color:#F9F9F9;
  --background-black-bg-color:#29303B;
  --background-white-bg-color:#FFF;
  --background-mehroon-bg-color:#992337;
  --text-black-color:#29303B;
  --text-light-grey-color:#777;
  --text-red-color:#F44A4A;
  --text-dark-grey-color:#686F7A; 
  --text-blue-color:#0284A2;
  --text-dark-blue-color:#003845;
  --text-white-color:#FFF;
}

</style>

@endif


@yield('custom-head')




    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap" rel="stylesheet">

<style>
@import  url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap');
@import  url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;500&display=swap');
body{background:#17193f;}
.categories-tab-main-block {
    display: none;
    background: var(--linear-gradient-reverse-bg-color);
}.careers-video-main-block {
    position: absolute;
    top: 60%;}.careers-main-block {
    background: #1e4062;
    padding: 30px 0 310px;
    position: relative;
}.btn-primary {
    padding: 20px 25px;
    background-color: #ef7716;}.nav-bar-main-block {
    padding: 0;
}.learning-courses-main-block .view-block{background:#fff;}
.about-team-img img {
    width: 100%;height:340px;
}.cart-price-detail ul li {
    font-size: 14px;
    margin-bottom: 12px;
    color: #363434;
    font-weight: 400;
}.categories-popularity-dtl ul{display:none;}.view-img a img {
    min-height: 150px;
    max-height: 257px;
    height: 297px;
    object-fit: cover;
    width: 100%;
}.report-abuse{
    padding: 16px;
    background: #ef7716;
    margin-bottom: 20px;
}.about-block p{color:#000;}
.content-course-number-block p{color:#fff;}
.height img {
    height: 310px;
}.protip-content .description-list li, .prime-description-block .description-list li {
    display: inline-block !important;
    color: #e64426;
    margin: 0 5px;
    font-size: 12px;
    font-weight: 500;
}.about-home-one-main-block {
    padding: 290px 210px;
    background-position: 50% 0;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
}.about-home-one-main-block .overlay-bg {
    background: transparent;
    padding: 172px 210px;
    background-position: 50% 0;
    background-repeat: no-repeat;
    background-size: cover;
}.about-home-one-heading {
    font-size: 45px;
    display: none;
    float: left;
    position: relative;
    color: #f8f5f7!important;
}.info p{color:#000;}
.wishlist-home-main-block {
    background-color: #041a30;
    padding: 50px 20px;
}.testimonial-main-block {
    background-color: #12314f;
}
.copyright-social a, .logo-footer ul li, .footer-link a, .widget {
    color: #eee8e4;
    padding-bottom: 22px;
}
.rate s {
    color: #ef7716;
    font-size: 14px;
}.learning-courses .nav-link {
    color: #fafafa;}
.about-home-block ul{display:none;}
.cart-add-block .cart-course-update {
    font-size: 13px;
    color: #000;
}.container {
    max-width: 92%;
}.view-block{background:#fff;}

.protip-content .main-des p, .prime-description-block .main-des p,.protip-content .description-heading{color:#17193f;}
.dropdown ul li {
    padding-right: 20px;
    font-size: 15px;
    text-decoration: none;
    color: #17193f;}
    .learning-work-main-block {
    display: none;
    background: var(--linear-gradient-bg-color);
    padding: 10px 0;
}
.preloader {
    background-color: #17193f;
    bottom: 0;
    top: 0;
    left: 0;
    right: 0;
    position: fixed;
    z-index: 9999999999999;
}
#cssmenu ul ul {
    background: #fff;
    z-index: 3333333333333333333;
    left: 99999999999px;
}
.catalog-main-block {
    color: #ef7716;
    background-color: #fff;
    padding: 10px 0;
}.filter-dropdown .language-select .select {
    color: #ef7716;
}.form-check-label {
    font-size: 18px;
    margin-right: 10px;
}
.about-home-one-heading {
    font-size: 45px;
    position: relative;
    color: #f8f5f7!important;
}.view-button .btn-secondary {
    text-align: center;
    margin: auto;
    padding: 10px 20px;
    background: #ef7716;
}.learning-courses-main-block .view-block {
    margin-bottom: 20px;
    margin: 13px;}
    .course-content-block .second-accordion .card-header button.btn {
 
    background: #ef7716;
  font-family: 'Tajawal', sans-serif !important;
}.categories-tab-block a {
    color: #f8f9fa;
    font-size: 12px;
}.categories-tab-dtl {
    padding: 10px 0px;
    text-align: center;
}.btn-warning {
    color: #ccc;
    background-color: #ffc107;
    border-color: #ffc107;
}.signup-block {
    background: #fff;
    border: solid 1px #DEDFE0;
    border-radius: 0 0 9px 9px;
    padding: 40px 50px;
}.course-content-block .table td, .course-content-block .table th {
    color: #17193f;
    font-size: 14px;
    cursor: pointer;
    text-align: right;
    font-family: 'Tajawal', sans-serif !important;
}.course-content-block .second-accordion .card-header button.btn {
    background: #f8f9fa;
    font-family: 'Tajawal', sans-serif !important;
}
.class-nav-heading,.venom-button .venom-button-popup.active .venom-button-message,.signin-link,.instructor-po,.learning-courses,.box-footer .btn-primary,.copyright-social a, .logo-footer ul li,li, .footer-link a, .widget,h1, h2, h3, h4, h5, h6,label,input,.pull-left,.protip-content .description-heading,#cssmenu ul li,.facts-dtl,.about-work-heading,.careers-benefits-dtl-heading,.about-team-heading,h1,h2,h3,h4,h,h6,a ,span,p,b,.work-heading,.home-heading,.home-dtl p,.text-white,.work-heading,.content-course-number{ font-family: 'Tajawal', sans-serif !important;}
.course-content-block .table td, .course-content-block .table th {
    font-size: 14px;
    cursor: pointer;
    text-align: right;
   font-family: 'Tajawal', sans-serif !important;
}.class-button ul li a {
    border: 1px solid #f9fcff;
    padding: 10px 15px;
    color: #e6ebf1;
}.course-bought-block .course-update { font-family: 'Tajawal', sans-serif !important;
    font-size: 13px;
    color: #ef7716;
}.Login-btn .btn-secondary {
    background: #ef7716;
    padding: 13px;
    border-right: 2px solid #686F7A;
}.sidebar-nav-icon ul a li {
    color: #1e1d1d!important;
}
.about-transforming-main-block .nav-tabs {
    padding-top: 0px;
}
.student-view-block .view-img a img{
    height: 234px;
   
}.view-img a img {
    min-height: 150px;
    max-height: 257px;
    object-fit: cover;
    width: 100%;
}.testimonial-block p {
    color: #565050;
}.course-bought-block {
    background: #fafafa;
    padding: 18px;
    margin-bottom: 13px;
    -webkit-transition: all 0.5s ease;
    -ms-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    transition: all 0.5s ease;
}
[class^="flaticon-"]:before, [class*=" flaticon-"]:before, [class^="flaticon-"]:after, [class*=" flaticon-"]:after {
    font-family: Flaticon;
    font-size: 20px;
    font-style: normal;
    margin-left: 9px;
}#cssmenu > ul > li > a {
    padding: 0;}
  
    #cssmenu, #cssmenu ul, #cssmenu ul li, #cssmenu ul li a, #cssmenu #menu-button {
    margin: 2px 6px;
    color: #ef7716;
    font-size: 16px;
    float: right;
}.tiny-footer {
    background: #052341;
    padding: 0px 20px 0px;
    border-bottom: 5px solid var(--text-red-color);
}.recommendation-main-block {
    padding: 105px 0;
    background-position: 50% 0;
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;
    height: 350px;
}.tiny-footer {
    padding: 0px 20px 0px;
    border-bottom: 5px solid var(--text-red-color);
}.copyright-social a, .logo-footer ul li, .footer-link a, .widget {
    color: #ef7716;
}.copyright-social {
    text-align: center;
    padding: 10px 0;
}.footer-main-block hr {
    border-top: none;
}.footer-logo img {
    height: 113px;
    margin-bottom: 0;
}.preloader img{height:260px;}
 #cssmenu ul{margin-right:15px;margin-top:30px;}
 .nav-bar-main-block .logo .img-fluid {
    max-width: 100%;
    height: 105px;
    object-fit: scale-down;
    width: auto;
}
.student-heading {
    color: #ef7716;
}.view-heading a {
    font-size: 20px;
    color: #ef7716;
    font-weight: 500;
    font-weight: bold;
}.red-menu-badge {
    position: absolute;
    padding: 2px 6px;
    line-height: 1.43;
    font-weight: 500;
    color: white;
    border-radius: 100%;
    font-size: 10px;
    background: #ef7716;
    box-shadow: 0.5px 0.2px 1px rgba(0, 0, 0, 0.5);
    display: inline-block;
    text-align: center;
    right: 28px;
    top: 2px;
    z-index: 1;
}.careers-learn-block {
    background-color: transparent;
    padding: 50px;
    border-radius: 10px;
}.careers-learn-video {
    padding: 0 0px 0 0;
}.careers-learn-video img {
    box-shadow: 8px 8px 8px #ccc;
    border-radius: 20px;
}btn-primary {
    padding: 20px 25px;
    background-color: #e64426;
    color: var(--text-white-color);}
    .signin-link a {
    color: #fff;
    font-size: 12px;
}
    .categories-tab-block a {
    color: #f8f9fa;
}.my-dropdown {
    display: flex;
    justify-content: center;
    align-content: center;
    align-items: center;
    border-radius: 30px;
    background-color: #fff;
    box-shadow: 0 2px 8px 2px rgba(20,23,28,0.2);
    width: 70px;
}.dropdown-menu-right {
    text-align: right;
    display: none;
    position: absolute;
    border-radius: 7px;
    box-shadow: 0px 0px 8px rgba(214, 214, 214, 0.78);
    list-style: none;
    padding: 0;
    margin: 0;
    top: 10px!important;
    right: -300px;
    width: 300px;
    border: none;
    z-index: 999999999999;
}#notificationTitle {
    padding: 14px 10px;
    font-size: 13px;
    background-color: #fff;
    z-index: 1000;
    border-bottom: 1px solid #DDD;
}.dropdown ul li {
    padding-right: 20px;
    font-size: 15px;
    text-decoration: none;
    color: var(--text-black-color);
    font-weight: 400;
    background-color: #fff;
    z-index: 1111111;
    -webkit-transition: all .25s ease;
    -moz-transition: all .25s ease;
    -ms-transition: all .25s ease;
    -o-transition: all .25s ease;
    transition: all .25s ease;
}.dropdown-menu-right:before {
    content: "";
    position: absolute;
    width: 0;
    height: 0;
    margin-left: -0.5em;
    left: 41px;
    right: auto;
    box-sizing: border-box;
    border: 7px solid black;
    border-color: transparent transparent #FFF #FFF;
    transform-origin: 0 0;
    transform: rotate(135deg);
    box-shadow: -3px 3px 3px -3px rgba(214, 214, 214, 0.78);
}.home-main-block {
    padding: 172px 90px;
    background-position: 50% 0;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100%;
}.careers-learn-heading {
    margin-bottom: 22px;
    font-family: 'Tajawal', sans-serif !important;
    color: #ef7716;
    font-size: 36px;font-weight:bold;
}p {
    line-height: 1.8em;
    margin-bottom: 10px;
}.learning-courses-about-main-block .nav-tabs .nav-item.show .nav-link, .learning-courses-about-main-block .nav-tabs .nav-link {
    font-size: 15px;
    padding: 0 33px;
    color: #fff;
    border-bottom: 5px solid transparent;
    -webkit-transition: all 0.5s ease;
    -ms-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    transition: all 0.5s ease;
}.content-course-number-one ul li {
    display: inline-block;
    background: #e64426;
    padding: 8px 13px;
    border-radius: 5px;
    cursor: pointer;
    -webkit-transition: all 0.5s ease;
    -ms-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    transition: all 0.5s ease;
}
.protip-skin-default--scheme-pro.protip-container {
    height: auto !important;
    background-color: #f8f2f2 !important;
    box-shadow: 2px 2px 5px 0 rgba(0,0,0,0.6) !important;
    padding: 15px !important;
    -webkit-border-radius: 2px !important;
    -moz-border-radius: 2px !important;
    border-radius: 2px !important;
}a:not([href]):not([tabindex]) {
    color: inherit;
    color: #000;
    text-decoration: none;
}.learning-courses-about-main-block {
    background-color: #17193f;
}.overview-block {
    background: #17193f;
    padding: 30px 0;
}.learning-questions-heading {
    font-weight: 600;
   color: #ef7716;
    padding: 15px;
    margin-bottom: 0;
    border-bottom: 1px solid #DDD;
}.learning-questions-content h3{color: #ef7716;}
.about-transforming-main-block .tab-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}.copyright-social a, .logo-footer ul li, .footer-link a, .widget {
    color: #ef7716;
    padding-bottom: 22px;
}.sidebar-nav-icon ul a li i {
    margin-left: 8px;
    margin-right: auto;
}
.learning-courses ul {
    border-bottom: none;
}
.categories-popularity-dtl p {
    font-size: 13px;
    color: #121111;
}.btn-warning {
    color: #ccc;
    background-color: #ffc107;
    border-color: #ffc107;
}.dropdown ul li {
    padding-right: 20px;
    font-size: 15px;
    text-decoration: none;
    color: #212529;}
    h1, h2, h3, h4, h5, h6 {
    font-family: 'Muli', sans-serif;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    font-smoothing: antialiased;
    color: #ef7716;
    margin-bottom: 20px;
    font-weight: 600;
    text-align: right;
}.last-updated{color: #212529;    font-family: 'Tajawal', sans-serif !important;}.catalog-main-block {
    color: #ef7716;
    background-color: transparent;
    padding: 10px 0;
}.panel-title>a, .panel-title>a:active {
    display: block;
    padding: 8px 20px;
    color: #1a1d32;
    font-size: 13px;
    font-weight: 500;
    text-transform: uppercase;
    text-align: right;
}.rate-r {
    color: #1a1d32;
    font-weight: 700;
    font-size: 18px;
}.nav-bar-main-block .logo .img-fluid {
    max-width: 100%;
    height: 79px;
    object-fit: scale-down;
    width: auto;
}#cssmenu, #cssmenu ul, #cssmenu ul li, #cssmenu ul li a, #cssmenu #menu-button {
    margin: 8px 6px;
    color: #fff;
    font-size: 16px;
    float: right;
}.about-home-main-block {
    background-color: #1a1d32;
    position: relative;
}.patners-heading {
    color: #1a1d32;
    font-weight: 400;
    font-size: 22px;
}.footer-main-block {
    background-color: #17193f;
}.certificate-button .btn-secondary {
    padding: 8px;
    border-radius: 0;
    background-color: transparent;
    color: #fff;
    border: 1px solid #fff;
}.learning-courses-home-main-block .profile a {
    font-weight: 500;
    font-size: 19px;
    color: #e64426;
}.venom-button .venom-button-popup.active .venom-button-message{color:#000;}
label {
    color: #262d5d;
    display: inline-block;
    margin-bottom: .5rem;
}#cssmenu ul ul {
    background: #fff;
    z-index: 3333333333333333333;
    left: 99999999999px;
    top: 33px;
}#cssmenu li:hover > ul > li {
    height: 25px;
}.course-bought-block .course-user ul li {
    display: inline-block;
    color: #343a40;
}.about-home-block p {
    font-size: 21px;
    color: #ccc!important;
}
.view-dtl .rate ul li strike {
    display: inline-block;
    color: #ef7716;
}.copyright-social a, .logo-footer ul li, .footer-link a, .widget {
    color: #fff;
    padding-bottom: 22px;
}.course-currency{color:#232b5e;}
.about-home-block p {
    font-size: 21px;
    color: #ccc!important;
}.careers-main-block {
    background: #1e4062;
    padding: 30px 0 380px;
    position: relative;
}.careers-video img {
    width: 50%;
    border-radius: 12px;
}.about-transforming-block {
    color: #343a40;
    background-color: #F4F4F4;
    padding: 25px 20px;
    height: 100%;
}.about-team-heading {
    color: #ef7716;
    font-size: 28px;
}.about-team-block {
    background-color: #17193f;
    padding: 138px 90px;
    height: 100%;
}
.nav-item:hover .about-nav-heading, .nav-item .active {
    color: #212529;
    background-color: #e2e3e8;
}.view-img a img {
    min-height: 150px;
    max-height: 159px;
    object-fit: cover;
    width: 100%;
}.view-heading a {
    font-size: 16px;
    color: #000;
    font-weight: 500;
    font-weight: normal;
}.student-view-block {
    border-radius: 7px;}
    .view-heading {
    height: auto;
}.nav-bar-main-block {
    background: #0e1338;
    padding: 0;
}.view-block {
    border-radius: 6px;
    background: #fff;
}.Login-btn .btn-secondary {
    color: #ef7716;
    background: transparent;
    padding: 13px;
    border-right: none;
    border-radius: 55px;
}.Login-btn .btn-primary, .btn-secondary {
    padding: 13px;
    border-radius: 16px;
}.student-view-block {
    margin: 6px;
    border-radius: 7px;
}.owl-carousel .owl-item img.owl-lazy {
    transform-style: preserve-3d;
    border-radius: 7px;
}.preloader img {
    height: 160px;
}.student-heading {
    margin: 22px 0px;
    color: #fff;
}.btn {
   
    line-height: 0.5;}
    .Login-btn .btn-secondary {
    border: 1px solid #fff;
    color: #ef7716;
    background: transparent;
    padding: 13px;
    border-right: 1px solid #fff;
    border-radius: 55px;
}.rate ul li b{float:left;}
.rating{display:none;}
@media (max-width: 776px){.careers-learn-block {
    background-color: transparent;
    padding: 0;
    border-radius: 10px;
}.recommendation-main-block {
    padding: 15px 0;
    background-position: 50% 0;
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;
    height: 350px;
}
.home-main-block {
    padding: 45px 25px;
    height: 300px;
}.nav-bar-main-block .logo .img-fluid {
    max-width: 100%;
    height: 87px;
    object-fit: scale-down;
    width: auto;
}}
</style>
</head>