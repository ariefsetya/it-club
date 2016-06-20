<?php

    $user = App\User::where('id',$data->idpengguna)->first();
?>
<div class="panel">
    <div class="heading">
        <span class="icon">
        	<span class="mif-paper-plane mif-ani-heartbeat"></span>
        </span>
        <div class="title">{{ $data->judul }}</div>
    </div>
    <div class="content">
    {!! $data->isi !!}
     <br>
     <br>
     <br>
    <span class="place-right"><span class="mif-calendar"></span> {{ date_format(date_create($data->created_at),"l, d M Y") }} <span class="mif-alarm"></span> {{ date_format(date_create($data->created_at),"h:i A") }} <img style="max-width:16px;max-height:16px;" src="{{ url('images/foto/'.App\User::where('id',$data->idpengguna)->first()['foto']) }}"> <a href="{{ url('people/'.$data->idpengguna) }}">{{ $user->namadepan." ".$user->namabelakang }}</a></span>
     <br>
    </div>
</div>

@if(Auth::check())
@include('utils.comments')
@endif
