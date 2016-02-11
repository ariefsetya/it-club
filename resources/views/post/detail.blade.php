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

    <meta name="author" content="https://www.facebook.com/{{$author->fb}}" >

    <title>{{$data->judul}} | IT Club SMKN 10 Jakarta</title>
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{$data->judul}} | IT Club SMKN 10 Jakarta" />
    <meta property="og:description" content="{{substr(strip_tags($data->isi),0,500)}}" />
    <meta property="og:url" content="{{$data->slug}}" />
    <meta property="og:site_name" content="IT Club SMKN 10 Jakarta" />
    <meta property="article:author" content="https://www.facebook.com/{{$author->fb}}" />
    <meta property="og:author" content="https://www.facebook.com/{{$author->fb}}" />
    @include('utils.header_js_syntax')

@endsection

@section('footer')

    @include('utils.footer_js_syntax')

@endsection