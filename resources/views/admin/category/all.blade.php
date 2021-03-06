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
    data-hint="Go to Dashboard|" class="icon mif-home fg-white"></a>			        <span class="title">Category</span>
			        <span class="place-right" style="margin-right:10px;"><a class="fg-white" href="{{ url('admin/category/add') }}"><span class="mif-plus"></span> Add New</a></span>
			    </div>
			    <div class="content">
			        <table class="table border bordered striped hovered">
		                <thead>
		                <tr>
		                    <th>Divisi</th>
		                    <th>Name</th>
		                    <th>Description</th>
		                    <th>Action</th>
		                </tr>
		                </thead>
		                <tbody>
		                @foreach($category as $data)
			                <tr>
			                    <td>{{ App\Divisi::where('id',$data->iddivisi)->first()['nama'] }}</td>
			                    <td>{{ $data->nama }}</td>
			                    <td>{{ $data->keterangan }}</td>
			                    <td><a href="{{ url('admin/category/edit/'.$data->id) }}">Edit</a> | <a href="{{ url('admin/category/delete/'.$data->id) }}" onclick="return confirm('Hapus divisi {{ $data->nama }}?')">Delete</a></td>
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