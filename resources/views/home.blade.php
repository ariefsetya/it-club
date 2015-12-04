@extends('app')

@section('content')
<div class="grid">
    <div class="row cells12">
        <div class="cell colspan8">
            <div class="row cells8">
            @foreach($posts as $data)
            	@include('utils.datapost')
            @endforeach
            <span class="place-right">{!! $posts->render() !!}</span>
            </div>
        </div>
        @include('utils.sidebar')
    </div>
</div>
@endsection

@section('header')
    @include('utils.header_js_syntax')
@endsection

@section('footer')
    @if(Auth::check())
        @if(!$update)
        <style type="text/css">
            body{
                overflow: hidden;
            }
        </style>
        <div data-windows-style="true" data-role="dialog" id="dialog" data-overlay="true" data-overlay-color="op-gray" class="padding20 info" style="width: auto; height: auto; display: none;">
            <div class="container">
            <h2>Hello friend...</h2>
            <p>
               I want to know more about you, please fill some field below about your information {^_^} 
               <hr>
               <form id="form_update" method="POST" action="{{ url('mine/update') }}" enctype="multipart/form-data">
                   <?php $foto_require = "required"; ?>

                   @include('utils.form_update')
               </form>
            </p>
            </div>
        </div>
        <script>
            $(function(){
                var dialog = $('#dialog').data('dialog');
                dialog.open();


                $('#form_update').submit( function(event) {
                    $("#span_process_2").hide();
                    $("#span_process_1").fadeIn('fast');
                    $("#span_process").fadeIn('fast');
                    var form = this;

                    event.preventDefault();

                    setTimeout( function () { 
                        form.submit();
                    }, 2000);
                    setTimeout( function () { 
                        window.location = '{{ url() }}';
                    }, 4000);
                }); 
            });
        </script>
        @endif
    @endif

    @include('utils.footer_js_syntax')

@endsection