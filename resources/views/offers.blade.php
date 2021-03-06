@extends('theme.master')
@section('content')

@include('admin.message')
@include('sweetalert::alert')




<!-- Subscription Bundle start -->
<section id="subscription" class="student-main-block">
    <div class="container">
        @if (isset($subscriptionBundles) && !$subscriptionBundles->isEmpty())
            <h4 class="student-heading">الباقات والعروض الخاصة</h4>
            <div id="subscription-bundle-view-slider" class="student-view-slider-main-block owl-carousel">
                @foreach ($subscriptionBundles as $bundle)
                    @if ($bundle->status == 1 && $bundle->is_subscription_enabled == 1)

                        <div class="item student-view-block student-view-block-1">
                            <div class="genre-slide-image protip" data-pt-placement="outside"
                                data-pt-interactive="false"
                                data-pt-title="#prime-next-item-description-block-3{{ $bundle->id }}">
                                <div class="view-block">
                                    <div class="view-img">
                                        @if ($bundle['preview_image'] !== null && $bundle['preview_image'] !== '')
                                            <a href="{{ route('bundle.detail', $bundle->id) }}"><img data-src="{{ asset('images/bundle/' . $bundle['preview_image']) }}" alt="course" class="img-fluid owl-lazy"></a>
                                        @else
                                            <a href="{{ route('bundle.detail', $bundle->id) }}"><img data-src="{{ Avatar::create($bundle->title)->toBase64() }}" alt="course" class="img-fluid owl-lazy"></a>
                                        @endif
                                    </div>
                                    <div class="view-dtl">
                                        <div class="view-heading btm-10"><a href="{{ route('bundle.detail', $bundle->id) }}">{{ str_limit($bundle->title, $limit = 30, $end = '...') }}</a>
                                        </div>
                                        <p class="btm-10"><a herf="#">{{ __('frontstaticword.by') }}
                                                {{ $bundle->user['fname'] }} {{ $bundle->user['lname'] }}</a></p>

                                        <p class="btm-10"><a herf="#">Created At:
                                                {{ date('d-m-Y', strtotime($bundle['created_at'])) }}</a></p>

                                        @if ($bundle->type == 1)
                                            <div class="rate text-right">
                                                <ul>
                                                    @php
                                                    $currency = App\Currency::first();
                                                    @endphp

                                                    @if ($bundle->discount_price == !null)
                                                        @if($gsetting['currency_swipe'] == 1)
                                                            <li><a><b><i class="{{ $currency->icon }}"></i>{{ $bundle->discount_price }}/{{ $bundle->billing_interval }}</b></a></li>&nbsp;
                                                            <li><a><b><strike><i class="{{ $currency->icon }}"></i>{{ $bundle->price }}/{{ $bundle->billing_interval }}</strike></b></a></li>
                                                        @else
                                                            <li><a><b>{{ $bundle->discount_price }}/{{ $bundle->billing_interval }}<i class="{{ $currency->icon }}"></i></b></a></li>&nbsp;
                                                            <li><a><b><strike>{{ $bundle->price }}/{{ $bundle->billing_interval }}<i class="{{ $currency->icon }}"></i></strike></b></a></li>
                                                        @endif

                                                    @else
                                                        @if($gsetting['currency_swipe'] == 1)
                                                            <li><a><b><i class="{{ $currency->icon }}"></i>{{ $bundle->price }}/{{ $bundle->billing_interval }}</b></a></li>
                                                        @else
                                                            <li><a><b>{{ $bundle->price }}/{{ $bundle->billing_interval }}<i class="{{ $currency->icon }}"></i></b></a></li>
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

                                    </div>

                                </div>
                            </div>
                            <div id="prime-next-item-description-block-3{{ $bundle->id }}"
                                class="prime-description-block">
                                <div class="prime-description-under-block">
                                    <div class="prime-description-under-block">
                                        <h5 class="description-heading">{{ $bundle['title'] }}</h5>
                                        <div class="protip-img">
                                            @if ($bundle['preview_image'] !== null && $bundle['preview_image'] !== '')
                                                <a href="{{ route('bundle.detail', $bundle->id) }}"><img src="{{ asset('images/bundle/' . $bundle['preview_image']) }}"
                                                        alt="student" class="img-fluid">
                                                </a>
                                            @else
                                                <a href="{{ route('bundle.detail', $bundle->id) }}"><img src="{{ Avatar::create($bundle->title)->toBase64() }}" alt="student" class="img-fluid">
                                                </a>
                                            @endif
                                        </div>



                                        <div class="main-des">
                                            @if($bundle['short_detail'] != NUll)

                                            <p>{!! str_limit($bundle['short_detail'], $limit = 200, $end = '...') !!}</p>
                                            @else
                                            <p>{!! str_limit($bundle['detail'], $limit = 200, $end = '...') !!}</p>
                                            @endif
                                        </div>
                                        <div class="des-btn-block">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    @if ($bundle->type == 1)
                                                        @if (Auth::check())
                                                            @if (Auth::User()->role == 'admin')
                                                                <div class="protip-btn">
                                                                    <a href="" class="btn btn-secondary"
                                                                        title="course">{{ __('frontstaticword.Purchased') }}</a>
                                                                </div>
                                                            @else
                                                                @php
                                                                $order = App\Order::where('user_id',
                                                                Auth::User()->id)->where('bundle_id',
                                                                $bundle->id)->first();
                                                                @endphp
                                                                @if (!empty($order) && $order->status == 1)
                                                                    <div class="protip-btn">
                                                                        <a href="" class="btn btn-secondary"
                                                                            title="course">{{ __('frontstaticword.Purchased') }}</a>
                                                                    </div>
                                                                @else
                                                                    @php
                                                                    $cart = App\Cart::where('user_id',
                                                                    Auth::User()->id)->where('bundle_id',
                                                                    $bundle->id)->first();
                                                                    @endphp
                                                                    @if (!empty($cart))
                                                                        <div class="protip-btn">
                                                                            <form id="demo-form2" method="post"
                                                                                action="{{ route('remove.item.cart', $cart->id) }}">
                                                                                {{ csrf_field() }}

                                                                                <div class="box-footer">
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">{{ __('frontstaticword.RemoveFromCart') }}</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    @else
                                                                        <div class="protip-btn">
                                                                            <form id="demo-form2" method="post"
                                                                                action="{{ route('bundlecart', $bundle->id) }}"
                                                                                data-parsley-validate
                                                                                class="form-horizontal form-label-left">
                                                                                {{ csrf_field() }}

                                                                                <input type="hidden" name="user_id"
                                                                                    value="{{ Auth::User()->id }}" />
                                                                                <input type="hidden" name="bundle_id"
                                                                                    value="{{ $bundle->id }}" />

                                                                                <div class="box-footer">
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">{{ __('frontstaticword.SubscribeNow') }}</button>
                                                                                </div>


                                                                            </form>
                                                                        </div>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        @else
                                                            <div class="protip-btn">

                                                                <a href="{{ route('login') }}"
                                                                    class="btn btn-primary"><i class="fa fa-cart-plus"
                                                                        aria-hidden="true"></i>&nbsp;{{ __('frontstaticword.SubscribeNow') }}</a>

                                                            </div>
                                                        @endif
                                                    @else
                                                        @if (Auth::check())
                                                            @if (Auth::User()->role == 'admin')
                                                                <div class="protip-btn">
                                                                    <a href="" class="btn btn-secondary"
                                                                        title="course">{{ __('frontstaticword.Purchased') }}</a>
                                                                </div>
                                                            @else
                                                                @php
                                                                $enroll = App\Order::where('user_id',
                                                                Auth::User()->id)->where('course_id', $c->id)->first();
                                                                @endphp
                                                                @if ($enroll == null)
                                                                    <div class="protip-btn">
                                                                        <a href="{{ url('enroll/show', $bundle->id) }}"
                                                                            class="btn btn-primary"
                                                                            title="Enroll Now">{{ __('frontstaticword.SubscribeNow') }}</a>
                                                                    </div>
                                                                @else
                                                                    <div class="protip-btn">
                                                                        <a href="" class="btn btn-secondary"
                                                                            title="Cart">{{ __('frontstaticword.Purchased') }}</a>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @else
                                                            <div class="protip-btn">
                                                                <a href="{{ route('login') }}" class="btn btn-primary"
                                                                    title="Enroll Now">{{ __('frontstaticword.SubscribeNow') }}</a>
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
        @endif
    </div>
</section>
<!-- Subscription Bundle end -->


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
