@extends('app')

@section('header')
    <title>{{$act[0]->judul}} | IT Club SMKN 10 Jakarta</title>
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{$act[0]->judul}} | IT Club SMKN 10 Jakarta" />
@endsection

@section('content')

<div class="grid">
	<div class="row cells12">
		<div class="cell colspan12">
			<div class="panel">
				<div class="heading">
					<span class="icon mif-flow-line"></span>
					<div class="title">Stories on {{ date_format(date_create($tgl),"l, d F Y") }}</div>
				</div>
				<div class="content">
					@foreach($act as $data)

					<div class="frame">
						<img src="{{ url('images/activities/'.$data->isi) }}">
					</div>
					<hr>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

@endsection