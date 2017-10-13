<?php
header("X-Frame-Options: ALLOW-FROM https://facebook.com/");
$title = App\Website::where(array('jenis'=>'site','kunci'=>'title'))->first()['isi'];
?>

<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        @foreach(App\Website::where(array('jenis'=>'meta'))->get() as $meta)
        <meta name="{{ $meta->kunci }}" content="{{ $meta->isi }}">
        @endforeach
        @foreach(App\Website::where(array('jenis'=>'property'))->get() as $meta)
        <meta property="{{ $meta->kunci }}" content="{{ $meta->isi }}">
        @endforeach

        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta property="article:publisher" content="https://www.facebook.com/ITC10vhs" />

        <meta property="og:type" content="article" />
        <meta property="og:site_name" content="{{ $title }}" />
        <meta name="keywords" content="{{ $title }}">
        <meta name="title" content="{{ $title }}">
        <meta name="keywords tag" content="{{ $title }}">

        <link href="{{ url('favicon.ico') }}" rel="shortcut icon">
        <link href="{{ url('favicon.ico') }}" rel="favicon">

        <link href="{{ url('css/metro.css') }}" rel="stylesheet">
        <link href="{{ url('css/metro-icons.css') }}" rel="stylesheet">
        <link href="{{ url('css/metro-responsive.css') }}" rel="stylesheet">
        <link href="{{ url('css/metro-schemes.css') }}" rel="stylesheet">
        <link href="{{ url('css/mine.css') }}" rel="stylesheet">

        <script src="{{ url('js/jquery-2.1.3.min.js') }}"></script>

	@yield('header')
        <title>{{ $title }}</title>

    </head>
    <body style="background:lightgray;">
        @include('menu')
        <div class="page-content">
            <div class="container">
                <div class="no-overflow" style="margin-top: 50px">
                    @yield('content')
                </div>
            </div>
        </div>
    

        
        <script src="{{ url('js/metro.js') }}"></script>
        <script src="{{ url('js/mine.js') }}"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>    
        <script type="text/javascript">
            function showDialog(id){
                    var dialog = $("#"+id).data('dialog');
                    if (!dialog.element.data('opened')) {
                        dialog.open();
                    } else {
                        dialog.close();
                    }
                }
        </script>
        @foreach(\App\Popups::all() as $key)
            @if(\Session::get("a-".getenv('REMOTE_ADDR')."-".$key->id)=='x')
            <div data-role="dialog" id="dialog" class="padding20 dialog" data-overlay="true" data-close-button="true" data-overlay-color="op-dark" style="display: none;">
                <h4 id="title">{{$key->judul}}</h4>
                <hr>
                <p><img style="max-width: 1000px;max-height: 500px;" src="{{url('images/popup_image/'.$key->image)}}"></p>
                <span class="dialog-close-button"></span>
            </div>
            <script type="text/javascript">
                setTimeout(function(){
                    showDialog('dialog');
                    $("#dialog").fadeIn();
                },5000);
            </script>
            <?php \Session::put("a-".getenv('REMOTE_ADDR')."-".$key->id,'y'); ?>
            @endif
        @endforeach
    	@yield('footer')

	</body>
</html>
