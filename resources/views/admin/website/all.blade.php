@extends('app')

@section('content')
<div class="grid">
	<div class="row cells12">
		<div class="cells colspan12">
			<div class="panel">
			    <div class="heading">
<a href="{{ url('mine/dashboard') }}" data-role="hint"
    data-hint-background="bg-blue"
    data-hint-color="fg-white"
    data-hint-mode="2"
    data-hint-position="left"
    data-hint="Go to Dashboard|" class="icon mif-home fg-white"></a>			        <span class="title">Website</span>
			        <span class="place-right" style="margin-right:10px;"><a class="fg-white" href="{{ url('admin/website/add') }}"><span class="mif-plus"></span> Add New</a></span>
			    </div>
			    <div class="content">
			        <table class="table border bordered striped hovered">
		                <thead>
		                <tr>
		                    <th>Key</th>
		                    <th>Type</th>
		                    <th>Content</th>
		                    <th>Action</th>
		                </tr>
		                </thead>
		                <tbody>
		                @foreach($data as $aw)
			                <tr>
			                    <td>{{ $aw->kunci }}</td>
			                    <td>{{ $aw->jenis }}</td>
			                    <td>{{ $aw->isi }}</td>
			                    <td><a href="{{ url('admin/website/edit/'.$aw->id) }}">Edit</a> <hr> <a href="{{ url('admin/website/delete/'.$aw->id) }}" onclick="return confirm('Hapus {{ $aw->jenis." ".$aw->kunci }}?')">Delete</a></td>
			                </tr>
			            @endforeach
		                </tbody>
		            </table>
			    </div>
			</div>
		</div>
	</div>
</div>
@endsection