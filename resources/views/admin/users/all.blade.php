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
					    data-hint="Go to Dashboard|" class="icon mif-home fg-white"></a>
    		        <span class="title">Users</span>
			        <span class="place-right" style="margin-right:10px;"></span>
			    </div>
			    <div class="content">
			        <table class="table border bordered striped hovered">
		                <thead>
		                <tr>
		                    <th>Name</th>
		                    <th>E-Mail</th>
					<th>Foto</th>
		                    <th>Status</th>
		                    <th>Action</th>
		                </tr>
		                </thead>
		                <tbody>
		                @foreach($data as $ae)
			                <tr>
			                    <td>{{ $ae->namadepan." ".$ae->namabelakang }}</td>
			                    <td>{{ $ae->email }}</td>
					<td><img style="max-width:16px;max-height:16px;" src="{{ url('images/foto/'.$ae->foto) }}"></id>
			                    <td>{{ $ae->jenis." ( ".(isset($ae->deleted_at)?"DEL":"ACTIVE")." )" }}</td>
			                    <td><a href="{{ url('admin/users/edit/'.$ae->id) }}">Edit</a> | <a href="{{ url('admin/users/delete/'.$ae->id) }}" onclick="return confirm('block users {{ $ae->nama }}?')">{{ isset($data->deleted_at)?"unBlock":"Block" }}</a> | <a href="{{ url('admin/users/resend/'.$ae->id) }}">Resend E-Mail</a></td>
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
