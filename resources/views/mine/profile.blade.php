@extends('app')

@section('content')

<div class="grid">
<div class="row cells12">
<div class="cell colspan4">
	<div class="image-container bordered image-format-hd">
        <div class="frame">
            <img src="{{ url('images/foto/'.$profile->foto) }}">
        </div>
    </div>
    <hr>
    <div class="panel">
	    <div class="heading">
	        <span class="icon">
	        	<span class="mif-info mif-ani-heartbeat"></span>
	        </span>
	        <div class="title">About @if(Auth::check()) 
                                        @if(Auth::user()->id==$profile->id) 
                                            me 
                                        @else 
                                            {{ $profile->namadepan }} 
                                        @endif 
                                    @else 
                                        {{ $profile->namadepan }} 
                                    @endif</div>
	    </div>
	    <div class="content">
				<h2>{{ $profile->namadepan." ".$profile->namabelakang }}</h2>
			@if($profile->jeniskelamin=='Male') He @else She @endif was born at {{ $profile->tempatlahir }}, {{ date("Y")-date_format(date_create($profile->tanggallahir),"Y") }} years ago and
            join with IT Club since {{ date_format(date_create($profile->created_at),"d M Y") }}.
            @if($profile->namapengguna) {{ $profile->namadepan }} also known as {{ $profile->namapengguna }}. @endif
            @if(sizeof(App\Posts::where(array('idpengguna'=>$profile->id,'deleted_at'=>NULL))->get()))
            @if($profile->jeniskelamin=='Male') He @else She @endif has created {{ sizeof(App\Posts::where(array('idpengguna'=>$profile->id,'deleted_at'=>NULL))->get()) }} tutorials.
            @endif
            @if($profile->hubungan<>"") {{ $profile->namadepan }} is {{ $profile->hubungan }} now ^_^ @endif

                @if(Auth::check())
                @if(Auth::user()->id==$profile->id)
				<hr>
				<span class="button" onclick="update()">Update Profile</span>
                @endif
                @endif
	    </div>
	</div>
</div>
<div class="cell colspan8">
    <div class="row cells8">
        <div class="panel">
            <div class="heading">
                <span class="icon">
                    <span class="mif-bubble mif-ani-pass"></span>
                </span>
                <span class="title">What's Up?</span>
            </div>
            <div class="content">
                <div class="input-control textarea full-size">
                    <textarea @if(Auth::check()) @if(Auth::user()->id<>$profile->id) readonly @endif @else readonly @endif id="info" name="info">{{ $profile->info }}</textarea>
                </div>
                @if(Auth::check())
                @if(Auth::user()->id==$profile->id)
                <a onclick="update_status()" class="button place-right">Update</a>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                @endif
                @endif
            </div>
        </div>
    </div>
    <?php
    $prof = \App\Posts::where('idpengguna',Auth::user()->id)->orderBy('id','desc')->paginate(3);
    ?>
    @foreach($prof as $data)
        @include('utils.datapost')
    @endforeach
    <span class="pull-right">{!!$prof->render()!!}</span>
</div>
</div>
</div>

@endsection

@section('footer')

        <div data-windows-style="true" data-close-button="true" data-role="dialog" id="dialog" data-overlay="true" data-overlay-color="op-gray" class="padding20 info" style="width: auto; height: auto; display: none;">
            <div class="container">
            <h2>Hi, {{ $profile->namadepan }} ^_^</h2>
            <p>
               <hr>
               <form id="form_update" method="POST" action="{{ url('mine/update/profile') }}" enctype="multipart/form-data">
                   {{ $foto_require = "" }}

                   @include('utils.form_update')
               </form>
            </p>
            </div>
        </div>
        <script>
        function update_status () {
            setTimeout(function () {
            $.ajax({
              type: "POST",
              url: '{{ url("mine/info") }}',
              data: {'info':$("#info").val()},
              success: function () {
                $.Notify({type: 'success', caption: 'Success', content: "Your status has updated"});
              }
            });

            },2000);

        }

        	function update () {
        		var dialog = $('#dialog').data('dialog');
                dialog.open();
        	}
            $(function(){
                
                $('#form_update').submit( function(event) {
                    $("#span_process_2").hide();
                    $("#span_process_1").fadeIn('fast');
                    $("#span_process").fadeIn('fast');
                    var form = this;

                    event.preventDefault();

                    setTimeout( function () { 
                        form.submit();
                    }, 2000);
                }); 
            });
        </script>

@endsection