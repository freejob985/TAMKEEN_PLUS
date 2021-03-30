@extends('theme.master')
@section('content')

@include('admin.message')
@include('sweetalert::alert')




@include('seca')
@include('secb')
@include('secc')
@include('secd')





<style>.view-dtl {
    display: none;}
    .owl-carousel .owl-item img {
    display: block;
    height: 207px;
    width: 100%;
}.protip-btn{display:none;}
  i.fa.fa-play {
    border-radius: 50%;
    width: 44px;
    background: #00000080;
    height: 44px;
    padding: 9px;
    left: 40%!important;
    top: 40%!important;
    color: #fff!important;
    font-size: 24px!important;
}  </style>








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
            url  : '{{ url('/tabcontent/instructor') }}/'+id,
            dataType  : 'html',
            success : function(data){

                $('#tabShow').html('');
                $('#tabShow').append(data);
            }
        });
    }
</script>

@endsection
