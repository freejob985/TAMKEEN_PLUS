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
