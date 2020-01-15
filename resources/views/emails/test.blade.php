@extends('emails.app_email')

@section('content')

	<div style="background:#2d89ef;width:100%;padding:20px;">
		<span style="font-family:Candara;font-size:18pt;color:white;">Welcome to IT Club SMK Negeri 10 Jakarta</span>
		<div style="font-family:Candara;font-size:15pt;background:#1b6eff;width:100%;color:white;padding:10px;">
			Here's your confirmation URL<br>
			<span style="color:white;font-size:13pt;"><a style="color:white;" href="{{ url('confirm/'.base64_encode(Auth::user()->email.'-'.Auth::user()->id)) }}">{{ url('confirm/'.base64_encode(Auth::user()->email.'-'.Auth::user()->id)) }}</a></span>
			
			<div style="font-family:Candara;font-size:15pt;background:#2086bf;width:100%;color:#fbfbfb;padding:10px;">
				Our features<br>
				<div style="padding:10px;font-size:13pt;">
					> Tutorials<br>
					> Friends<br>
					> Activities
				</div>
				<div style="font-family:Candara;font-size:15pt;background:#1b6eae;width:100%;color:#fbfbfb;padding:10px;">
					Some tutorials<br>
					<div style="padding:10px;font-size:13pt;">
						@foreach(App\Posts::orderBy(DB::raw('rand()'))->limit(5)->get() as $data)
							> {{ $data->judul }} by {{ App\User::where('id',$data->idpengguna)->first()['namadepan']." ".App\User::where('id',$data->idpengguna)->first()['namabelakang'] }}<br>
						@endforeach
					</div>
				</div>
			</div>
		</div>

	</div>

@endsection