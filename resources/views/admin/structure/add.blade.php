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
    data-hint="Go to Dashboard|" class="icon mif-home fg-white"></a>			        <span class="title">Add Structure</span>
			        <span class="place-right" style="margin-right:10px;"><a class="fg-white" href="{{ url('admin/structure') }}"><span class="mif-arrow-left"></span> All Structure</a></span>
			    </div>
			    <div class="content" style="height:500px;">
				    <form method="POST" action="{{ url('admin/structure/add') }}" enctype="multipart/form-data">
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
				        		<td>Level</td>
				        		<td>
				        			<div class="input-control text full-size">
									    <input type="text" name="level" required>
									</div>
				        		</td>
				        	</tr>
				        	<tr>
				        		<td>Period</td>
				        		<td>
				        			<div class="input-control text half-size" data-role="datepicker" data-format="yyyy-mm-dd">
									    <input type="text" name="periode_awal">
									    <button class="button"><span class="mif-calendar"></span></button>
									</div>
				        			<div class="input-control text half-size" data-role="datepicker" data-format="yyyy-mm-dd">
									    <input type="text" name="periode_akhir">
									    <button class="button"><span class="mif-calendar"></span></button>
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