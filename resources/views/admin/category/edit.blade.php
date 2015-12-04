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
    data-hint="Go to Dashboard|" class="icon mif-home fg-white"></a>			        <span class="title">Edit Category</span>
			        <span class="place-right" style="margin-right:10px;"><a class="fg-white" href="{{ url('admin/category') }}"><span class="mif-arrow-left"></span> All Category</a></span>
			    </div>
			    <div class="content">
				    <form method="POST" action="{{ url('admin/category/update') }}">
				        <table style="width:100%">
				        	<tr>
				        		<td>Divisi</td>
				        		<td>
				        			<div class="input-control select full-size">
									    <select name="iddivisi">
									    @foreach($divisi as $data)
									    	<option {{ ($category->iddivisi==$data->id)?'selected':'' }} value="{{ $data->id }}">{{ $data->nama }}</option>
									    @endforeach
									    </select>
									</div>
				        		</td>
				        	</tr>				        	
				        	<tr>
				        		<td>Name</td>
				        		<td>
				        			<div class="input-control text full-size">
									    <input type="text" name="nama" value="{{ $category->nama }}" required>
									    <input type="hidden" name="_token" value="{{ csrf_token() }}">
									    <input type="hidden" name="id" value="{{ $category->id }}">
									</div>
				        		</td>
				        	</tr>
				        	<tr>
				        		<td>Description</td>
				        		<td>
				        			<div class="input-control textarea full-size">
									    <textarea name="keterangan" required>{{ $category->keterangan }}</textarea>
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