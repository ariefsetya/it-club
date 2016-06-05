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
    data-hint="Go to Dashboard|" class="icon mif-home fg-white"></a>			        <span class="title">Popups</span>
			        <span class="place-right" style="margin-right:10px;"><a class="fg-white" href="{{ url('admin/popups/add') }}"><span class="mif-plus"></span> Add New</a></span>
			    </div>
			    <div class="content">
			        <table class="table border bordered striped hovered">
		                <thead>
		                <tr>
		                    <th>Author</th>
		                    <th>Title</th>
		                    <th>Validity</th>
		                    <th>Action</th>
		                </tr>
		                </thead>
		                <tbody>
		                @foreach($data as $key)
			                <tr>
			                    <td>{{ \App\User::find($key->idpengguna)['namadepan']." ".\App\User::find($key->idpengguna)['namabelakang'] }}</td>
			                    <td>{{ $key->judul }}</td>
			                    <td>{{ $key->tipe_valid." (".$key->date_valid_start." ".$key->time_valid_start." - ".$key->date_valid_end." ".$key->time_valid_end.")" }}</td>
			                    <td><a href="{{ url('admin/popups/edit/'.$key->id) }}">Edit</a> | <a href="{{ url('admin/popups/delete/'.$key->id) }}" onclick="return confirm('Hapus divisi {{ $key->nama }}?')">Delete</a></td>
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