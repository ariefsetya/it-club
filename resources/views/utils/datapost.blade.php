<div class="panel">
    <div class="heading">
        <span class="icon">
        	<span class="mif-paper-plane mif-ani-heartbeat"></span>
        </span>
        <div class="title">{{ $data->judul }}</div>
    </div>
    <div class="content">
    <?php
    $user = App\User::where('id',$data->idpengguna)->first();
    $pecah = explode("</p><p>",$data->isi);
    if(sizeof($pecah)==1){
        echo $pecah[0];
    }else{
        echo $pecah[0]."</p><p>".$pecah[1];
    }
    ?>
    <a href="{{ url($data->slug) }}"><span class="place-right">See more...</span></a>
     <br>
     <br>
     <br>
     <span class="place-right"><span class="mif-calendar"></span> {{ date_format(date_create($data->created_at),"l, d M Y") }} <span class="mif-alarm"></span> {{ date_format(date_create($data->created_at),"h:i A") }} <img style="max-width:16px;max-height:16px;" src="{{ url('images/foto/'.App\User::where('id',$data->idpengguna)->first()['foto']) }}"> <a href="{{ url('people/'.$data->idpengguna) }}">{{ $user->namadepan." ".$user->namabelakang }}</a></span>
     <br>
    </div>
</div>
