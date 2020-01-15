<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="description" content="ini description">
        <meta name="keywords" content="ini keyword">
        <meta name="author" content="ini author">

        <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
        <title>Ini Judul</title>

    </head>
    <body style="">
    	<div class="">
            <div class="" style="width:1000px;background:#fbfbfb;overflow:hidden;">
                <div class="">
                    <div style="background:#333;height:10px;width:100%;"></div>
                    @yield('content')
                </div>
            </div>
        </div>

    	@yield('footer')

	</body>
</html>