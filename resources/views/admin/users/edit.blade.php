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
    data-hint="Go to Dashboard|" class="icon mif-home fg-white"></a>			        <span class="title">Edit Users</span>
			        <span class="place-right" style="margin-right:10px;"><a class="fg-white" href="{{ url('admin/users') }}"><span class="mif-arrow-left"></span> All Users</a></span>
			    </div>
			    <div class="content" style="height:500px;">
				    <form method="POST" action="{{ url('admin/users/update') }}" enctype="multipart/form-data">
				        <table style="width:100%">
				        	<tr>
				        		<td>First Name</td>
				        		<td>
				        			<div class="input-control text full-size">
									    <input type="text" name="namadepan" value="{{ $data->namadepan }}" required>
									    <input type="hidden" name="_token" value="{{ csrf_token() }}">
									    <input type="hidden" name="id" value="{{ $data->id }}">
									</div>
				        		</td>
				        	</tr>
				        	<tr>
				        		<td>Last Name</td>
				        		<td>
				        			<div class="input-control text full-size" data-role="input">
									    <input type="text" name="namabelakang" value="{{ $data->namabelakang }}">
									</div>
				        		</td>
				        	</tr>
				        	<tr>
				        		<td>E-Mail</td>
				        		<td>
				        			<div class="input-control text full-size" data-role="input">
									    <input type="text" name="email" value="{{ $data->email }}">
									</div>
				        		</td>
				        	</tr>
				        	<tr>
				        		<td>Role</td>
				        		<td>
				        			<div class="input-control text full-size" data-role="input">
									    <select name="jenis">
									    	<option value="0" {{ ($data->jenis==0)?"selected":"" }}>User</option>
									    	<option value="1" {{ ($data->jenis==1)?"selected":"" }}>Author</option>
									    	<option value="9" {{ ($data->jenis==9)?"selected":"" }}>Super Admin</option>
									    	<option value="10" {{ ($data->jenis==10)?"selected":"" }}>Root</option>
									    </select>
									</div>
				        		</td>
				        	</tr>
				        	<tr>
				        		<td></td>
				        		<td>
				        			<div class="">
				        				<img style="max-height:100px;max-width:100px;" src="{{ url('images/foto/'.$data->foto) }}">
				        			</div>
				        		</td>
				        	</tr>
				        	<tr>
				        		<td>Display Picture</td>
				        		<td>
				        			<div class="input-control file full-size" data-role="input">
									    <input type="file" name="foto">
									    <button class="button"><span class="mif-folder"></span></button>
									</div>
				        		</td>
				        	</tr>
				        	<tr>
				        		<td></td>
				        		<td>
				        			<button class="button"><span class="mif-checkmark"></span> Submit</button>
				        		</td>
				        	</tr>
				        </table>
				    </form>
			    </div>
			</div>
		</div>
	</div>
</div>

@endsection