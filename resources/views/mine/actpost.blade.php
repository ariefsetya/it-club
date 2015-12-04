@extends('app')

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