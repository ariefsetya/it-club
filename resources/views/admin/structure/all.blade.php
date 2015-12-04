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
    data-hint="Go to Dashboard|" class="icon mif-home fg-white"></a>			        <span class="title">Structure</span>
			        <span class="place-right" style="margin-right:10px;"><a class="fg-white" href="{{ url('admin/structure/add') }}"><span class="mif-plus"></span> Add New</a></span>
			    </div>
			    <div class="content">
			        <table class="table border bordered striped hovered">
		                <thead>
		                <tr>
		                    <th>Name</th>
		                    <th>Level</th>
		                    <th>Period</th>
		                    <th>Action</th>
		                </tr>
		                </thead>
		                <tbody>
		                @foreach($data as $ae)
			                <tr>
			                    <td>{{ $ae->nama }}</td>
			                    <td>{{ $ae->level }}</td>
			                    <td>{{ $ae->periode_awal." - ".$ae->periode_akhir }}</td>
			                    <td><a href="{{ url('admin/structure/edit/'.$ae->id) }}">Edit</a> | <a href="{{ url('admin/structure/delete/'.$ae->id) }}" onclick="return confirm('Hapus structure {{ $ae->nama }}?')">Delete</a></td>
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