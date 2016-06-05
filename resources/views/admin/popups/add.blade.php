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
    data-hint="Go to Dashboard|" class="icon mif-home fg-white"></a>			        <span class="title">Add Popups</span>
			        <span class="place-right" style="margin-right:10px;"><a class="fg-white" href="{{ url('admin/popups') }}"><span class="mif-arrow-left"></span> All Popups</a></span>
			    </div>
			    <div class="content">
				    <form method="POST" action="{{ url('admin/popups/add') }}" enctype="multipart/form-data">
				        <table style="width:100%">
				        	<tr>
				        		<td>Title</td>
				        		<td>
				        			<div class="input-control text full-size">
									    <input type="text" name="judul" required>
									    <input type="hidden" name="_token" value="{{ csrf_token() }}">
									</div>
				        		</td>
				        	</tr>
				        	<tr>
				        		<td>Type Valid</td>
				        		<td>
				        			<div class="input-control text full-size">
									    <select type="text" name="type_valid" required>
									    	<option value="by_datetime">By Date &amp; Time</option>
									    	<option value="by_date">By Date Only</option>
									    	<option value="by_time">By Time Only</option>
									    </select>
									</div>
				        		</td>
				        	</tr>
				        	<tr>
				        		<td>Keep Open</td>
				        		<td>
				        			<div class="input-control text full-size">
									    <select type="text" name="keep_open" required>
									    	<option value="1">Yes</option>
									    	<option value="0" selected>No</option>
									    </select>
									</div>
				        		</td>
				        	</tr>
				        	<tr>
				        		<td>Date Valid</td>
				        		<td>
				        			<div class="input-control text half-size" data-role="datepicker" data-format="mm/dd/yyyy">
									    <input type="text" name="date_valid_start">
									    <button class="button"><span class="mif-calendar"></span></button>
									</div> to 
				        			<div class="input-control text half-size" data-role="datepicker" data-format="mm/dd/yyyy">
									    <input type="text" name="date_valid_end">
									    <button class="button"><span class="mif-calendar"></span></button>
									</div>
				        		</td>
				        	</tr>
				        	<tr>
				        		<td>Time Valid</td>
				        		<td>
				        			<div class="input-control text half-size">
									    <input type="text" name="time_valid_start">
									</div> to 
				        			<div class="input-control text half-size">
									    <input type="text" name="time_valid_end">
									</div>
				        		</td>
				        	</tr>
				        	<tr>
				        		<td>Hotlink (This can be empty)</td>
				        		<td>
				        			<div class="input-control text full-size">
									    <input type="text" name="hotlink">
									</div>
				        		</td>
				        	</tr>
				        	<tr>
				        		<td>Image File</td>
				        		<td>
				        			<div class="input-control text full-size">
									    <input type="file" name="image">
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

@section('footer')



@endsection