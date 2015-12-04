<div class="cell colspan4">
	<div class="panel image-container">
	    <div class="frame"><img src="{{ App\Website::where(array('jenis'=>'site','kunci'=>'image'))->first()['isi'] }}"></div>
	</div>
    @if(Auth::check())

    @if(Auth::user()->jenis>0)
    <a class="button full-size" href="{{ url('mine/dashboard') }}">Open Dashboard</a>
    <hr>
    @endif
	<div class="accordion" data-role="accordion" data-close-any="true">
        <div class="frame active">
            <div class="heading">Profile<span class="mif-paper-plane icon"></span></div>
            <div class="content" style="display:block">
            @if($update)
            	<table class="table" style="width:100%">
            		<thead>
            			<th colspan="2" class="text-center">{{ $nama }}</th>
            		</thead>
            		<tbody>
            			<tr>
            				<td colspan="2">
            					<img class="full-size" src="{{ url('images/foto/'.Auth::user()->foto) }}">
            				</td>
            			</tr>
                        @if(!empty($nickname))
            			<tr>
            				<td>Nickname</td>
            				<td><span class="mif-user"></span> {{ $nickname }}</td>
            			</tr>
                        @endif
                        @if(!empty(Auth::user()->jeniskelamin))
            			<tr>
            				<td>Gender</td>
            				<td><span class="mif-male"></span> {{ ucwords(Auth::user()->jeniskelamin) }}</td>
            			</tr>
                        @endif
                        @if(!empty(Auth::user()->tanggallahir))
            			<tr>
            				<td>Birth Date</td>
            				<td><span class="mif-calendar"></span> {{ date_format(date_create(Auth::user()->tanggallahir),"d M Y") }}</td>
            			</tr>
                        @endif
            		</tbody>
            	</table>
                @else
                    Update your Profile <a href="{{ url('settings') }}">here</a> ^_^
                @endif
                <hr>
                <span class="place-right"><a class="button" href="{{ url('profile') }}">View Profile</a> <a class="button" href="{{ url('auth/logout') }}">Sign Out</a></span>
                <div style="margin-bottom:45px;"></div>
            </div>
        </div>
        @if(Auth::user()->jenis>0)
        <div class="frame">
            <div class="heading">Tutorials<span class="mif-file-text icon"></span></div>
            <div class="content" style="display: none;">
                <a href="{{ url('mine/posts/add') }}" class="button full-size"><span class="mif-plus"></span> Create New</a>
                <a href="{{ url('mine/posts') }}" class="button full-size"><span class="mif-list"></span> My Tutorials</a>
            </div>
        </div>
        @if(Auth::user()->jenis>1)
        <div class="frame">
            <div class="heading">Super Admin Menu<span class="mif-fire icon"></span></div>
            <div class="content" style="display: none;">
                <a href="{{ url('admin/users') }}" class="button full-size"><span class="mif-users"></span> Users</a>
                <a href="{{ url('admin/divisi') }}" class="button full-size"><span class="mif-share"></span> Division</a>
                <a href="{{ url('admin/category') }}" class="button full-size"><span class="mif-tree"></span> Category</a>
                <a href="{{ url('admin/structure') }}" class="button full-size"><span class="mif-widgets"></span> Structure</a>
                <a href="{{ url('admin/activities') }}" class="button full-size"><span class="mif-flow-line"></span> Activities</a>
                <a href="{{ url('admin/website') }}" class="button full-size"><span class="mif-earth"></span> Website</a>
            </div>
        </div>
        @if(Auth::user()->jenis>9)
        <div class="frame">
            <div class="heading">Root Menu<span class="mif-lock icon"></span></div>
            <div class="content" style="display: none;">
                <a href="{{ url('admin/blast') }}" class="button full-size"><span class="mif-mail"></span> E-Mail Blast</a>
                <a href="{{ url('admin/logdata') }}" class="button full-size"><span class="mif-list"></span> Logdata</a>
            </div>
        </div>
        @endif
        @endif
        @endif
        <div class="frame">
            <div class="heading">Settings<span class="mif-cog icon"></span></div>
            <div class="content">
                <a class="button full-size" href="{{ url('settings') }}">Open Settings</a>
            </div>
        </div>
    </div>
    <div style="margin-top:5px;"></div>
    @endif
    @if(!Auth::check())
    <div class="panel">
        <div class="heading">
            <span class="icon">
                <span class="mif-user-check mif-ani-heartbeat"></span>
            </span>
            <span class="title">Sign In</span>
        </div>
        <div class="content">
            Sign In to Your Account :)
        <hr>
        <span class="place-right"><a href="{{ url('auth/login') }}" class="button">Sign In</a> or <a href="{{ url('auth/register') }}" class="button">Sign Up</a></span>
        <div style="margin-top:30px;">&nbsp;</div>
        </div>
    </div>
    @else
    <!--div class="panel">
        <div class="heading">
            <span class="icon">
                <span class="mif-earth mif-ani-shuttle"></span>
            </span>
            <span class="title">Public Forum</span>
        </div>
        <div class="content">
          Have any opinions or questions about programming, hardware or design?
        <hr>
        <span class="place-right"><a href="{{ url('mine/forum') }}" class="button">Discuss Here</a></span>
        <div style="margin-top:30px;">&nbsp;</div>
        </div>
    </div-->
    @if(false)
    <div class="panel">
        <div class="heading">
            <span class="icon">
                <span class="mif-users mif-ani-heartbeat"></span>
            </span>
            <span class="title">Groups</span>
        </div>
        <div class="content">
            Discuss with your groups
        <hr>
        <span class="place-right"><a href="{{ url('mine/mygroups') }}" class="button">My Groups</a> <a href="{{ url('mine/groups') }}" class="button">Join Group</a></span>
        <div style="margin-top:30px;">&nbsp;</div>
        </div>
    </div>
    @endif
    @endif
    <div class="panel">
        <div class="heading">
            <span class="icon">
                <span class="mif-twitter mif-ani-float"></span>
            </span>
            <span class="title">Follow Us on Twitter</span>
        </div>
        <div class="content" style="">
            <a class="twitter-timeline" href="https://twitter.com/ITCsmkn10" data-widget-id="578931350318792704">Tweet oleh @ITCsmkn10</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>
    </div>
    <div class="panel">
        <div class="heading">
            <span class="icon">
                <span class="mif-facebook mif-ani-flash"></span>
            </span>
            <span class="title">Find Us on Facebook</span>
        </div>
        <div class="content" style="margin:0 !important;padding:0 !important;">
            <div data-width="306" class="fb-like-box" data-href="https://www.facebook.com/itc10vhs" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="true" data-show-border="false"></div>
            <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=219059468269637&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
        </div>
    </div>
</div>