@extends('app')

@section('content')


<div class="grid">
<div class="row cells12">
<div class="cell colspan12">

		<div class="panel">
			<div class="heading">
				<span class="icon mif-flow-line"></span>
				<div class="title">Our Activities</div>
			</div>
			<div class="content">
<?php
	$size = array('wide','square','small','large');
?>
					<div class="step-list" style="width:870px;">
					<div>
					{{--*/ $i=1; /*--}}
					<?php
					$list = App\Activities::orderBy('id','desc')->groupBy('judul')->paginate(5);
					?>

					@foreach($list as $data)
                        <?php
                        $datalain = App\Activities::where('judul',$data->judul)->orderByRaw('rand()')->get();
                        $jumlah = sizeof($datalain);
                        ?>
                        <div>
                            <h2 class="no-margin-top">
                            	{{ $data->judul }}
                            </h2>
                            <hr class="bg-red">
                            <div>
                            	<a href="{{ url('activities/'.date_format(date_create($data->created_at),"Y-m-d")) }}"><div class="tile-container content_fw{{ $i }}" style="font-family:Candara;">
					                <div class="item tile-large bg-red" data-role="tile" style="overflow:hidden">
										<div class="image-container image-format-square" style="width: 100%;"><div class="frame"><div style="width: 100%; height: 340px; border-radius: 0px; background-image: url({{ url('images/activities/'.$data->isi) }}); background-size: cover; background-repeat: no-repeat;"></div></div></div>
					                </div>
					                <div class="item tile-small bg-green" data-role="tile" style="overflow:hidden;">
					                	<div class="image-container image-format-square" style="width: 100%;"><div class="frame"><div style="width: 100%; height: 131px; border-radius: 0px; background-image: url({{ url('images/activities/'.$datalain[($jumlah>1)?1:rand(0,$jumlah-1)]->isi) }}); background-size: cover; background-repeat: no-repeat;"></div></div></div>
					                </div>
					                <div class="item tile-square bg-lightGreen" data-role="tile" style="overflow:hidden;">
										<div class="image-container image-format-square" style="width: 100%;"><div class="frame"><div style="width: 100%; height: 131px; border-radius: 0px; background-image: url({{ url('images/activities/'.$datalain[($jumlah>2)?2:rand(0,$jumlah-1)]->isi) }}); background-size: cover; background-repeat: no-repeat;"></div></div></div>
					                </div>
					                <div class="item tile-wide bg-lightGreen" data-role="tile" style="overflow:hidden;">
										<div class="image-container image-format-square" style="width: 100%;"><div class="frame"><div style="width: 100%; height: 131px; border-radius: 0px; background-image: url({{ url('images/activities/'.$datalain[($jumlah>3)?3:rand(0,$jumlah-1)]->isi) }}); background-size: cover; background-repeat: no-repeat;"></div></div></div>
					                </div>
					                <div class="item tile-square bg-lightRed fg-white" style="font-size:65pt;text-align:center;" data-role="tile">{{ date_format(date_create($data->created_at),"d") }}</div>
					                <div class="item tile-wide bg-blue fg-white v-align-middle" data-role="tile" style="font-size:64pt;text-align:center;">{{ date_format(date_create($data->created_at),"M") }}</div>
					                <div class="item tile-wide bg-lightGreen" data-role="tile" style="overflow:hidden;">
										<div class="image-container image-format-square" style="width: 100%;"><div class="frame"><div style="width: 100%; height: 131px; border-radius: 0px; background-image: url({{ url('images/activities/'.$datalain[($jumlah>4)?4:rand(0,$jumlah-1)]->isi) }}); background-size: cover; background-repeat: no-repeat;"></div></div></div>
					                </div>
					                <div class="item tile-square fg-white bg-lightGreen" data-role="tile" style="font-size:65pt;text-align:center;" >{{ date_format(date_create($data->created_at),"y") }}</div>
					                <div class="item tile-square bg-lightGreen" data-role="tile" style="overflow:hidden;">
										<div class="image-container image-format-square" style="width: 100%;"><div class="frame"><div style="width: 100%; height: 131px; border-radius: 0px; background-image: url({{ url('images/activities/'.$datalain[($jumlah>5)?5:rand(0,$jumlah-1)]->isi) }}); background-size: cover; background-repeat: no-repeat;"></div></div></div>
					                </div>
					                <div class="item tile-wide bg-lightGreen" data-role="tile" style="overflow:hidden;">
										<div class="image-container image-format-square" style="width: 100%;"><div class="frame"><div style="width: 100%; height: 131px; border-radius: 0px; background-image: url({{ url('images/activities/'.$datalain[($jumlah>6)?6:rand(0,$jumlah-1)]->isi) }}); background-size: cover; background-repeat: no-repeat;"></div></div></div>
					                </div>
					            </div></a>
                            </div>
                        </div>
                        <br><br>

						<script type="text/javascript">
						    $(function (argument) {
						        var wall = new freewall(".content_fw{{ $i++ }}");
						        wall.fitWidth();
						    });
						</script>
					@endforeach
                    </div>


			</div>
		</div>
	</div>
	</div>
	</div>
	</div>

@endsection

@section('header')
<style type="text/css">
    #container{
        width:80%;
        margin:auto;
    }
</style>

<script type="text/javascript" src="{{ url('js/freewall.js') }}"></script>

@endsection