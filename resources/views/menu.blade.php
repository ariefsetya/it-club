<header style="position:fixed;top:0;right:0;left:0;" class="fixed-top m-menu" data-role="appbar">
    <div class="container">


        <ul class="m-menu" >
            <li><a href="{{ url() }}"><span class="mif-spinner2 mif-ani-shuttle"></span> {{ App\Website::where(array('jenis'=>'site','kunci'=>'title'))->first()['isi'] }}</a></li>
            
            <li>
                <a href="#" class="dropdown-toggle">Tutorials</a>
                <div class="m-menu-container" data-role="dropdown">
                    <ul class="inline-list" style="font-size: 12pt;padding-top: 8pt;line-height: 1.55rem;">
                    @foreach(App\Category::where('deleted_at',NULL)->get() as $data)
                        <li style="font-size: {{(sizeof(\App\Posts::where('idcategory',$data->id)->get())/12)*100<100?100:(sizeof(\App\Posts::where('idcategory',$data->id)->get())/12)*100}}%"><a href="{{ url('search/'.$data->id) }}">{{ $data->nama }}</a></li>
                    @endforeach
                    </ul>
                </div>
            </li>
            <li>
                <a href="#" class="dropdown-toggle">Activities</a>
                <div class="m-menu-container" data-role="dropdown" data-no-close="true">
                    <div class="grid no-margin">
                        <div class="row cells5">
                                <?php $act = App\Activities::where('jenis','picture')->orderBy('id','desc')->first(); ?>
                                @if(sizeof($act)>0)
                                <?php $act5 = App\Activities::where('jenis','picture')->orderBy('id','desc')->groupBy('judul')->limit(5)->get(); ?>
                            <div class="cell padding10">
                                <img src="{{ isset($act->judul)?url('images/activities/'.$act->isi):"" }}">
                            </div>
                            <div class="cell colspan2">
                                <h2 class="fg-white text-bold text-shadow">Latest Activity</h2>
                                <p class="padding20 no-padding-top no-padding-left no-padding-bottom fg-white">
                                {{ isset($act->judul)?$act->judul:"" }}
                                </p>
                                <p class="fg-white text-bold">
                                <a href="{{ url('activities/'.date_format(date_create($act->created_at),"Y-m-d")) }}">{{ (isset($act->judul))?date_format(date_create($act->created_at),"D, d M Y"):"" }}</a>
                                </p>
                            </div>
                            <div class="cell colspan2">
                                <ul class="unstyled-list">
                                    <li><h3 class="text-shadow">Our other activities</h3></li>
                                    @foreach($act5 as $data)
                                    <li><a class="fg-white" href="{{ url('activities/'.date_format(date_create($data->created_at),"Y-m-d")) }}">{{ $data->judul }}</a></li>
                                    @endforeach
                                    <li><a class="fg-white" href="{{ url('activities') }}">See more activities...</a></li>
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href="#" class="dropdown-toggle">Friends</a>
                <div class="m-menu-container" data-role="dropdown" data-no-close="true">
                    <div class="grid no-margin">
                        <div class="row cells5">
                            <?php $profile = App\User::whereRaw('namadepan<>"" and namabelakang<>"" and tanggallahir<>"0000-00-00" and blokir=0 and foto not in ("",1) and hubungan<>"" and namapanggilan<>""')->orderByRaw('rand()')->first(); ?>
                            @if(sizeof($profile)==1)
                            <div class="cell padding10">
                                <img src="{{ url('images/foto/'.$profile->foto) }}">
                            </div>
                            <div class="cell colspan2">
                                <h2 class="fg-white text-bold text-shadow">Our Friends</h2>
                                <p class="padding20 no-padding-top no-padding-left no-padding-bottom fg-white">
                                    <?php   
                                    $date1 = new DateTime($profile->tanggallahir);
                                    $interval = $date1->diff(new DateTime(date("Y-m-d")));
                                    ?>


                                    @if($profile->jeniskelamin=='Male') He @else She @endif was born at {{ $profile->tempatlahir }}, {{ $interval->y }} years ago and
                                    join with IT Club since {{ date_format(date_create($profile->created_at),"d M Y") }}. 
                                    @if($profile->namapengguna) {{ $profile->namadepan }} also known as {{ $profile->namapengguna }}. @endif
                                    @if(sizeof(App\Posts::where(array('idpengguna'=>$profile->id,'deleted_at'=>NULL))->get()))
                                    @if($profile->jeniskelamin=='Male') He @else She @endif has created {{ sizeof(App\Posts::where(array('idpengguna'=>$profile->id,'deleted_at'=>NULL))->get()) }} tutorials.
                                    @endif  
                                    @if($profile->hubungan<>"")
                                    {{ $profile->namadepan }} is {{ $profile->hubungan }} now ^_^
                                    @endif
                                </p>
                                <p class="fg-white text-bold">
                                    <a href="{{ url('people/'.$profile->id) }}">Details about {{ $profile->namadepan." ".$profile->namabelakang }}</a>
                                </p>
                            </div>
                            @endif
                            <div class="cell colspan2">
                                <ul class="unstyled-list">
                                    <li><h3 class="text-shadow">Our other friends</h3></li>
                                    @foreach(App\User::whereRaw('namadepan IS NOT NULL and namabelakang IS NOT NULL')->orderByRaw('rand()')->limit(5)->get() as $datanya)
                                    <li><a class="fg-white" href="{{ url('people/'.$datanya->id) }}">{{ $datanya->namadepan." ".$datanya->namabelakang }}</a></li>
                                    @endforeach
                                    <li><a href="{{ url('friends') }}" class="fg-white" href="#">See more friends...</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href="#" class="dropdown-toggle">About</a>
                <div class="m-menu-container" data-role="dropdown" data-no-close="true">
                    <div class="grid no-margin">
                        <div class="row cells5">
                            <div class="cell padding10">
                                <img src="{{ App\Website::where(array('jenis'=>'site','kunci'=>'image'))->first()['isi'] }}">
                            </div>
                            <div class="cell colspan4">
                                <h2 class="fg-white text-bold text-shadow">{{ App\Website::where(array('jenis'=>'site','kunci'=>'title'))->first()['isi'] }}</h2>
                                <p class="padding20 no-padding-top no-padding-left no-padding-bottom fg-white">
                                {{ substr(App\Website::where(array('jenis'=>'site','kunci'=>'about'))->first()['isi'],0,255) }}
                                </p>
                                <p class="fg-white text-bold">
                                    <a href="{{ url('itclub10vhs') }}">See more...</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="place-right no-hovered">
                <form method="POST" action="{{ url('search') }}">
                    <div class="input-control text" style="width: 250px; margin-right: 10px">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" placeholder="Search..." name="key" required>
                        <button class="button"><span class="mif-search"></span></button>
                    </div>
                </form>
            </li>
        </ul>


    </div>
</header>