@extends('app')

@section('content')

<div id="content_fw" style="text-align:center;width:100%;margin:0 auto;">
<?php
$i = rand(0,1);;
?>

@foreach($friends as $data)
<?php
$slid = $slide[rand(0,3)];
?>
<div class="item {{ $size[rand(0,2)] }} fg-white tile-transform-top" data-role="tile" style="display: inline-block;">
    <div class="tile-content slide-{{ $slid }}">
        <div class="slide">
            <a href="{{ url('people/'.$data->id) }}">
            <div class="image-container image-format-hd" style="width: 100%;"><div class="frame"><div style="width: 100%; height: 100%; border-radius: 0px; background-image: url({{ url('images/foto/'.$data->foto) }}); background-size: cover; background-repeat: no-repeat;">
            </div>
            </div>
            </div>
            </a>
        </div>

        <a href="{{ url('people/'.$data->id) }}" class="fg-white slide-over op-{{ $color[rand(0,3)] }} padding10">
			@if($data->jeniskelamin=='Male') He @else She @endif was born at {{ $data->tempatlahir }}, {{ date("Y")-date_format(date_create($data->tanggallahir),"Y") }} years ago and
            join with IT Club since {{ date_format(date_create($data->created_at),"d M Y") }}.
            @if($data->namapengguna) {{ $data->namadepan }} also known as {{ $data->namapengguna }}. @endif
            @if(sizeof(App\Posts::where(array('idpengguna'=>$data->id,'deleted_at'=>NULL))->get()))
            @if($data->jeniskelamin=='Male') He @else She @endif has created {{ sizeof(App\Posts::where(array('idpengguna'=>$data->id,'deleted_at'=>NULL))->get()) }} tutorials.
            @endif
            @if($data->hubungan<>"") {{ $data->namadepan }} is {{ $data->hubungan }} now ^_^ @endif
        </a>
        <div class="tile-label">{{ $data->namadepan." ".$data->namabelakang }}</div>
    </div>
</div>

@endforeach

</div>
<br>
<hr>
<div class="place-right">
    {!! $friends->render() !!}
</div>

@endsection

@section('footer')
<style type="text/css">
    #container{
        width:80%;
        margin:auto;
    }
</style>
<script type="text/javascript" src="{{ url('js/freewall.js') }}"></script>
<script type="text/javascript">
    $(function (argument) {
        var wall = new freewall("#content_fw");
        wall.fitWidth();
    });
</script>

@endsection