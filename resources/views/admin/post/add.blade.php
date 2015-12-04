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
			        <span class="title">Add Tutorial</span>
			        <span class="place-right" style="margin-right:10px;"><a class="fg-white" href="{{ url('mine/posts') }}"><span class="mif-arrow-left"></span> All Tutorials</a></span>
			    </div>
			    <div class="content">
				    <form method="POST" action="{{ url('mine/posts/add') }}" enctype="multipart/form-data">
				        <table style="width:100%">
				        	<tr>
				        		<td colspan="2">Title</td>
				        	</tr>
				        	<tr>
				        		<td colspan="2">
				        			<div class="input-control text full-size">
									    <input type="text" name="judul" required>
									    <input type="hidden" name="_token" value="{{ csrf_token() }}">
									</div>
				        		</td>
				        	</tr>
				        	<tr>
				        		<td colspan="2">Content</td>
				        	</tr>
				        	<tr>
				        		<td colspan="2">
				        			<div class="input-control textarea full-size">
									    <textarea name="isi" id="content" required></textarea>
									</div>
				        		</td>
				        	</tr>
				        	<tr>
				        		<td colspan="2">Tags (Separate with comma)</td>
				        	</tr>
				        	<tr>
				        		<td colspan="2">
				        			<div class="input-control text full-size">
									    <input type="text" name="tags" required>
									</div>
				        		</td>
				        	</tr>
				        	<tr>
				        		<td>Image</td>
				        		<td>Category</td>
				        	</tr>
				        	<tr>
				        		<td>
				        			<div class="input-control file full-size" data-role="input">
									    <input type="file" name="sampul">
									    <button class="button"><span class="mif-folder"></span></button>
									</div>
				        		</td>
				        		<td>
				        			<div class="input-control select full-size">
									    <select name="idcategory" required>
									    @foreach($category as $data)
									    	<option value="{{ $data->id }}">{{ $data->nama }}</option>
									    @endforeach
									    </select>
									</div>
				        		</td>
				        	</tr>
				        	<tr>
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

@section('footer')
<script src="{{ url('js/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">CKEDITOR_BASEPATH = "{{ url('/js/ckeditor/') }}";
        CKEDITOR.replace('content', {toolbar : 'standard',width : '99%',height : '300px'});</script>
@endsection