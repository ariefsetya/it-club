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
    data-hint="Go to Dashboard|" class="icon mif-home fg-white"></a>			        <span class="title">Add Activities</span>
			        <span class="place-right" style="margin-right:10px;"><a class="fg-white" href="{{ url('admin/activities') }}"><span class="mif-arrow-left"></span> All Activities</a></span>
			    </div>
			    <div class="content" style="height:auto;">
				    <form method="POST" action="{{ url('admin/activities/add') }}" enctype="multipart/form-data">
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
				        		<td></td>
				        		<td>
				        			** Choose one of inputbox below **
				        		</td>
				        	</tr>
				        	<tr>
				        		<td>Text</td>
				        		<td>
				        			<div class="input-control textarea full-size">
									    <textarea type="text" name="isi"></textarea>
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
				        		<td>Youtube Link</td>
				        		<td>
				        			<div class="input-control textarea full-size">
									    <textarea type="text" name="video"></textarea>
									</div>
				        		</td>
				        	</tr>
                                                <tr>
                                                        <td>URL Image</td>
                                                        <td>
                                                                <div class="input-control textarea full-size">
                                                                            <textarea type="text" name="url"></textarea>
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
