@extends('app')

@section('content')
<div class="grid">
		@if(Auth::check())

		@if(Auth::user()->jenis>0)

		@if(sizeof(App\Posts::where(array('deleted_at'=>NULL,'idpengguna'=>Auth::user()->id))->get())>0)
		<div class="row cells12">

			<div class="cell colspan12">
				<div class="panel">
				    <div class="heading">
				        <span class="icon mif-trophy"></span>
				        <span class="title">Your best tutorials</span>
				    </div>
				    <div class="content" style="text-align:center;height:300px;">
					    
					    <div class="row cells12">
							<div class="cell colspan9">
								<div class="panel">
								    <div class="heading" style="text-align:left;">
								        <span class="icon mif-file-text"></span>
								        <span class="title">{{ $ranks[0]->judul }}</span>
								    </div>
								    <div class="content bg-cyan fg-white" style="height:230px;text-align:left;overflow-y:scroll">
									    {!! $ranks[0]->isi !!}
								    </div>
								</div>
							</div>
							<div class="cell colspan3">
								<div class="panel">
								    <div class="heading" style="text-align:left;">
								        <span class="icon mif-eye"></span>
								        <span class="title">Views</span>
								    </div>
								    <div class="content bg-cyan" style="height:86.5px">
									    <span style="font-size:45pt;" class="fg-white">{{ $ranks[0]->lihat }}</span>
								    </div>
								</div>
								<div class="panel">
								    <div class="heading" style="text-align:left;">
								        <span class="icon mif-bubbles"></span>
								        <span class="title">Comments</span>
								    </div>
								    <div class="content bg-cyan" style="height:86.5px">
									    <span style="font-size:45pt;" class="fg-white">{{ sizeof(App\Komentar::where(array('deleted_at'=>NULL,'idpost'=>$ranks[0]->id))->get()) }}</span>
								    </div>
								</div>
							</div>
						</div>

				    </div>
				</div>
			</div>
		</div>
		<div class="row cells12">

			<div class="cell colspan4">
				<div class="panel">
				    <div class="heading">
				        <span class="icon mif-chart-bars"></span>
				        <span class="title">Tutorials Statistic</span>
				    </div>
				    <div class="content" style="height:217px;overflow-y:scroll;">
					    <div class="listview-outlook" data-role="listview">
						    @foreach($ranks as $data)
						    <div class="list">
						        <div class="list-content">
						            <span class="list-title">{{ $data->judul }}</span>
						            <span class="list-subtitle">{{ $data->created_at }}</span>
						            <span class="list-remark">{{ $data->lihat }} views</span>
						        </div>
						    </div>
						    @endforeach
						</div>
				    </div>
				</div>
			</div>
			<div class="cell colspan8">
				<div class="panel">
				    <div class="heading">
				        <span class="icon mif-list2"></span>
				        <span class="title">What do you want to do?</span>
				    </div>
				    <div class="content" style="">
					    <a href="{{ url('mine/posts/add') }}" class="command-button full-size">
						    <span class="icon mif-pencil"></span>
						    Create a new Tutorial
						    <small>Let people know about your skills</small>
						</a>
					    <a href="{{ url('forum') }}" class="command-button full-size">
						    <span class="icon mif-bubbles"></span>
						    Discuss in Public Forum
						    <small>Discuss with other friends</small>
						</a>
					    <a href="{{ url('mine/share') }}" class="command-button full-size">
						    <span class="icon mif-share"></span>
						    {{ App\Posts::where('deleted_at',NULL)->orderByRaw('rand()')->first()['judul'] }}
						    <small>Share this tutorial</small>
						</a>
				    </div>
				</div>
			</div>
		</div>

		@else
		<div class="row cells12">

			<div class="cell colspan12">
				<div class="panel">
				    <div class="heading">
				        <span class="icon mif-home"></span>
				        <span class="title">Show off your skills</span>
				    </div>
				    <div class="content" style="">
					    <a href="{{ url('mine/posts/add') }}" class="command-button full-size">
						    <span class="icon mif-pencil"></span>
						    Create a new Tutorial
						    <small>Let people know about your skills</small>
						</a>
				    </div>
				</div>
			</div>
		</div>
		@endif

		@endif


		@if(Auth::user()->jenis>1)
		<div class="row cells12">

		<div class="cell colspan4">
			<div class="panel">
			    <div class="heading">
			        <span class="icon mif-user-check"></span>
			        <span class="title">Socialize with members</span>
			    </div>
			    <div class="content" style="text-align:center">
				    <a href="{{ url('admin/users') }}" class="shortcut-button bg-cyan bg-active-darkBlue fg-white full-size">
					    <span class="icon mif-users"></span>
					    <span class="title">Users</span>
					    <span class="badge">10</span>
					</a>
				    <a href="{{ url('admin/status') }}" class="shortcut-button bg-cyan bg-active-darkBlue fg-white">
					    <span class="icon mif-cloud"></span>
					    <span class="title">Status</span>
					    <span class="badge">10</span>
					</a>
				    <a href="{{ url('admin/structure') }}" class="shortcut-button bg-cyan bg-active-darkBlue fg-white">
					    <span class="icon mif-widgets"></span>
					    <span class="title">Structure</span>
					    <span class="badge">10</span>
					</a>
				    <a href="{{ url('admin/divisi') }}" class="shortcut-button bg-cyan bg-active-darkBlue fg-white">
					    <span class="icon mif-share"></span>
					    <span class="title">Division</span>
					    <span class="badge">10</span>
					</a>
			    </div>
			</div>
		</div>
		<div class="cell colspan4">
			<div class="panel">
			    <div class="heading">
			        <span class="icon mif-power"></span>
			        <span class="title">Things about tutorials</span>
			    </div>
			    <div class="content" style="text-align:center">
				    <a href="{{ url('mine/posts') }}" class="shortcut-button bg-cyan bg-active-darkBlue fg-white full-size">
					    <span class="icon mif-pencil"></span>
					    <span class="title">Posts</span>
					    <span class="badge">10</span>
					</a>
				    <a href="{{ url('admin/category') }}" class="shortcut-button bg-cyan bg-active-darkBlue fg-white">
					    <span class="icon mif-tree"></span>
					    <span class="title">Category</span>
					    <span class="badge">10</span>
					</a>
				    <a href="{{ url('admin/statistic') }}" class="shortcut-button bg-cyan bg-active-darkBlue fg-white">
					    <span class="icon mif-chart-line"></span>
					    <span class="title">Statistics</span>
					    <span class="badge">10</span>
					</a>
				    <a href="{{ url('admin/comments') }}" class="shortcut-button bg-cyan bg-active-darkBlue fg-white">
					    <span class="icon mif-bubbles"></span>
					    <span class="title">Comments</span>
					    <span class="badge">10</span>
					</a>
			    </div>
			</div>
		</div>
		<div class="cell colspan4">
			<div class="panel">
			    <div class="heading">
			        <span class="icon mif-feed"></span>
			        <span class="title">Let peoples know</span>
			    </div>
			    <div class="content" style="text-align:center">
				    <a href="{{ url('admin/emailblast') }}" class="shortcut-button bg-cyan bg-active-darkBlue fg-white full-size">
					    <span class="icon mif-mail"></span>
					    <span class="title">Email_Blast</span>
					    <span class="badge">10</span>
					</a>
				    <a href="{{ url('admin/activities') }}" class="shortcut-button bg-cyan bg-active-darkBlue fg-white">
					    <span class="icon mif-flow-line"></span>
					    <span class="title">Activities</span>
					    <span class="badge">10</span>
					</a>
				    <a href="{{ url('admin/forum') }}" class="shortcut-button bg-cyan bg-active-darkBlue fg-white">
					    <span class="icon mif-bubble"></span>
					    <span class="title">Forum</span>
					    <span class="badge">10</span>
					</a>
				    <a href="{{ url('admin/website') }}" class="shortcut-button bg-cyan bg-active-darkBlue fg-white">
					    <span class="icon mif-earth"></span>
					    <span class="title">Website</span>
					    <span class="badge">10</span>
					</a>
				    <a href="{{ url('admin/popups') }}" class="shortcut-button bg-cyan bg-active-darkBlue fg-white">
					    <span class="icon mif-info"></span>
					    <span class="title">Popups</span>
					    <span class="badge">10</span>
					</a>
			    </div>
			</div>
		</div>
	</div>
	<div class="row cells12">
		<div class="cell colspan8">
			<div class="panel">
			    <div class="heading">
			        <span class="icon mif-chart-dots"></span>
			        <span class="title">People Statistic</span>
			    </div>
			    <div class="content" style="text-align:center">
				    
			    </div>
			</div>
		</div>
		<div class="cell colspan4">
			<div class="panel">
			    <div class="heading">
			        <span class="icon mif-paragraph-justify"></span>
			        <span class="title">Last Users Activity</span>
			    </div>
			    <div class="content" style="text-align:center">
				    
			    </div>
			</div>
		</div>
	</div>
	@endif

	@else
		What are you looking for (?) 
	@endif
</div>

@endsection