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
    data-hint="Go to Dashboard|" class="icon mif-home fg-white"></a>			        <span class="title">Add Website</span>
			        <span class="place-right" style="margin-right:10px;"><a class="fg-white" href="{{ url('admin/website') }}"><span class="mif-arrow-left"></span> All Website</a></span>
			    </div>
			    <div class="content" style="height:500px;">
				    <form method="POST" action="{{ url('admin/website/add') }}" enctype="multipart/form-data">
				        <table style="width:100%">
				        	<tr>
				        		<td>Key</td>
				        		<td>
				        			<div class="input-control text full-size">
									    <input type="text" name="kunci" required>
									    <input type="hidden" name="_token" value="{{ csrf_token() }}">
									</div>
				        		</td>
				        	</tr>
				        	<tr>
				        		<td>Type</td>
				        		<td>
				        			<div class="input-control text full-size">
									    <input type="text" name="jenis" required>
									</div>
				        		</td>
				        	</tr>
				        	<tr>
				        		<td>Content</td>
				        		<td>
				        			<div class="input-control textarea full-size">
									    <textarea type="text" name="isi" required></textarea>
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