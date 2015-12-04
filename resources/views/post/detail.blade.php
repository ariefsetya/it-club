@extends('app')

@section('content')

<div class="grid">
<div class="row cells12">
<div class="cell colspan8">

@if(empty($data))
	{{ "kosong" }}
@else
	@include('utils.fullpost')
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