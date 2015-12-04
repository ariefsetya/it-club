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
    data-hint="Go to Dashboard|" class="icon mif-home fg-white"></a>			        <span class="title">Activities</span>
			        <span class="place-right" style="margin-right:10px;"><a class="fg-white" href="{{ url('admin/activities/add') }}"><span class="mif-plus"></span> Add New</a></span>
			    </div>
			    <div class="content">
			        <table class="table border bordered striped hovered">
		                <thead>
		                <tr>
		                    <th>Name</th>
		                    <th>Type</th>
		                    <th>Content</th>
		                    <th>Action</th>
		                </tr>
		                </thead>
		                <tbody>
		                @foreach($data as $ae)
			                <tr>
			                    <td>{{ $ae->judul }}</td>
			                    <td>{{ $ae->jenis }}</td>
			                    <td>{{ $ae->isi }}</td>
			                    <td><a href="{{ url('admin/activities/delete/'.$ae->id) }}" onclick="return confirm('Hapus activities {{ $ae->nama }}?')">Delete</a></td>
			                </tr>
			            @endforeach
		                </tbody>
		            </table>
		            <span class="place-right">{!! $data->render() !!}</span>
			    </div>
			</div>
		</div>
	</div>
</div>
@endsection