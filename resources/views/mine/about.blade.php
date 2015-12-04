@extends('app')

@section('content')

	<div class="grid">
		<div class="row cells12">
			<div class="cell colspan12">
				<div class="panel">
					<div class="heading">
						<div class="title">About {{ App\Website::where(array('jenis'=>'site','kunci'=>'title'))->first()['isi'] }}</div>
					</div>
					<div class="content">
						<h3>Logo</h3>
						<img src="{{ App\Website::where(array('jenis'=>'site','kunci'=>'logo'))->first()['isi'] }}">
						<hr>
						<h3>Background</h3>
						{!! App\Website::where(array('jenis'=>'site','kunci'=>'about'))->first()['isi'] !!}
						<hr>
						<h3>Organization Structure</h3>
							<div class="listview-outlook" data-role="listview">
						@foreach(App\Structure::all() as $data)
							    <div class="list">
							        <div class="list-content">
							            <span class="list-title">{{ $data->nama }}</span>
							            <span class="list-subtitle">{{ $data->level }}</span>
							            <span class="list-remark">{{ date_format(date_create($data->periode_awal),"d M Y")." - ".date_format(date_create($data->periode_akhir),"d M Y") }}</span>
							        </div>
							    </div>
						@endforeach
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection