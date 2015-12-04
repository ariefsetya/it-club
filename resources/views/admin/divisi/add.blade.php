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
    data-hint="Go to Dashboard|" class="icon mif-home fg-white"></a>			        <span class="title">Add Divisi</span>
			        <span class="place-right" style="margin-right:10px;"><a class="fg-white" href="{{ url('admin/divisi') }}"><span class="mif-arrow-left"></span> All Divisi</a></span>
			    </div>
			    <div class="content">
				    <form method="POST" action="{{ url('admin/divisi/add') }}" enctype="multipart/form-data">
				        <table style="width:100%">
				        	<tr>
				        		<td>Name</td>
				        		<td>
				        			<div class="input-control text full-size">
									    <input type="text" name="nama" required>
									    <input type="hidden" name="_token" value="{{ csrf_token() }}">
									</div>
				        		</td>
				        	</tr>
				        	<tr>
				        		<td>Image</td>
				        		<td>
				        			<div class="input-control file full-size" data-role="input">
									    <input type="file" name="gambar">
									    <button class="button"><span class="mif-folder"></span></button>
									</div>
				        		</td>
				        	</tr>
				        	<tr>
				        		<td>Description</td>
				        		<td>
				        			<div class="input-control textarea full-size">
									    <textarea name="keterangan" required></textarea>
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