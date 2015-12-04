@extends('app')

@section('content')

<div class="grid">
	<div class="row cells12">
		<div class="cell colspan8">
			@if(!empty($posts))
				<h3>Search Result for @if(!isset($key)) category @else keyword @endif "{{ isset($key)?$key:App\Category::where('id',$tag)->first()['nama'] }}"</h3>
			@endif
			@if(empty($posts))
				<span style="font-size:260pt;margin-top:0px;padding-top:0px;text-align:right;">&nbsp;&nbsp;&nbsp;<span class="mif-arrow-up-right"></span></span>
				<h1>Search something from up there</h1>
			@else
				@foreach($posts as $data)
					@include('utils.datapost')
				@endforeach

				<span class="place-right">{!! $posts->render() !!}</span>

			@endif

		</div>
		<div class="cell colspan4">
			@include('utils.sidebar')
		</div>
	</div>
</div>

@endsection

@section('header')

    @include('utils.header_js_syntax')

@endsection

@section('footer')

    @include('utils.footer_js_syntax')

@endsection