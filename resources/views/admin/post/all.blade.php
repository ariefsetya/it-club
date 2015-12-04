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
    data-hint="Go to Dashboard|" class="icon mif-home fg-white"></a>			        <span class="title">Tutorials</span>
			        <span class="place-right" style="margin-right:10px;"><a class="fg-white" href="{{ url('mine/posts/add') }}"><span class="mif-plus"></span> Add New</a></span>
			    </div>
			    <div class="content">
			        <table class="table border bordered striped hovered">
		                <thead>
		                <tr>
		                    <th>Title</th>
		                    <th>Tags</th>
		                    <th>Category</th>
		                    <th>Action</th>
		                </tr>
		                </thead>
		                <tbody>
		                @foreach($posts as $data)
			                <tr>
			                    <td>{{ $data->judul }}</td>
			                    <td>{{ $data->tags }}</td>
			                    <td>{{ App\Category::where('id',$data->idcategory)->first()['nama'] }}</td>
			                    <td><a href="{{ url('mine/posts/edit/'.$data->id) }}">Edit</a> | <a href="{{ url('mine/posts/delete/'.$data->id) }}" onclick="return confirm('Hapus tutorial {{ $data->nama }}?')">Delete</a></td>
			                </tr>
			            @endforeach
		                </tbody>
		            </table>
		            <span class="place-right">
		            	{!! $posts->render() !!}
		            </span>
			    </div>
			</div>
		</div>
	</div>
</div>
@endsection