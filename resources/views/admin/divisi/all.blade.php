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
    data-hint="Go to Dashboard|" class="icon mif-home fg-white"></a>			        <span class="title">Divisi</span>
			        <span class="place-right" style="margin-right:10px;"><a class="fg-white" href="{{ url('admin/divisi/add') }}"><span class="mif-plus"></span> Add New</a></span>
			    </div>
			    <div class="content">
			        <table class="table border bordered striped hovered">
		                <thead>
		                <tr>
		                    <th>Name</th>
		                    <th>Image</th>
		                    <th>Description</th>
		                    <th>Action</th>
		                </tr>
		                </thead>
		                <tbody>
		                @foreach($divisi as $data)
			                <tr>
			                    <td>{{ $data->nama }}</td>
			                    <td><a target="_blank" href="{{ url('images/gambardivisi/'.$data->gambar) }}"><img style="max-width:20px;" src="{{ url('images/gambardivisi/'.$data->gambar) }}"></a></td>
			                    <td>{{ $data->keterangan }}</td>
			                    <td><a href="{{ url('admin/divisi/edit/'.$data->id) }}">Edit</a> | <a href="{{ url('admin/divisi/delete/'.$data->id) }}" onclick="return confirm('Hapus divisi {{ $data->nama }}?')">Delete</a></td>
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