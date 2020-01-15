<?php namespace App\Http\Controllers;

use Auth;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\User;
use App\Komentar;
use App\Posts;
use App\Logdata;
use App\Activities;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(Request $r)
	{
		date_default_timezone_set("Asia/Jakarta");
		//$this->middleware('auth');
		//echo "<pre>".print_r($_SERVER,1)."</pre>";
		$log = new Logdata();
		$log->idpengguna = (Auth::check())?Auth::user()->id:0;
		$log->url = $r->url();;
		$log->user_agent = $_SERVER['HTTP_USER_AGENT'];
		$log->ip = $_SERVER['REMOTE_ADDR'];
		$log->ip_port = isset($_SERVER['REMOTE_PORT'])?$_SERVER['REMOTE_PORT']:"";
		$log->http_host = isset($_SERVER['HTTP_HOST'])?$_SERVER['HTTP_HOST']:"";
		$log->http_referer = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:"";
		$log->pathinfo = isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:"";
		$log->save();

		// echo Auth::user()->password;
		// if(Auth::check()){
		// 	if(Auth::user()->password==""){
		// 		header("location:".url('notfound'));
		// 		die();
		// 	}
		// }
//		Session::put("a-".getenv('REMOTE_ADDR')."-3",'x');

		foreach (\App\Popups::all() as $key) {
			$isi = array();
			if($key->tipe_valid=="by_datetime" or $key->tipe_valid=="by_date"){
				$cek = $this->check_in_range( date_format(date_create($key->date_valid_start." ".$key->time_valid_start),"Y-m-d H:i:s"), date_format(date_create($key->date_valid_end." ".$key->time_valid_end),"Y-m-d H:i:s"), date("Y-m-d H:i:s") );
				if($cek){
					if(!Session::has("a-".getenv('REMOTE_ADDR')."-".$key->id)){
						Session::put("a-".getenv('REMOTE_ADDR')."-".$key->id,'x');
					}
				}
			} 
		}
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */

	function check_in_range($start_date, $end_date, $date_from_user)
	{
	  // Convert to timestamp
	  $start_ts = strtotime($start_date);
	  $end_ts = strtotime($end_date);
	  $user_ts = strtotime($date_from_user);




	  // Check that user date is between start & end
	  return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
	}
	public function updatesocial()
	{
		$upt = User::find(Auth::user()->id);
		$upt->fb = Input::get('fb');
		$upt->twitter = Input::get('twitter');
		$upt->gplus = Input::get('gplus');
		$upt->save();

		return redirect(url('settings'));
	}
	public function updateaccount()
	{
		$upt = User::find(Auth::user()->id);
		$upt->email = Input::get('email');
		if(Input::get('password')<>""){
			$upt->password = bcrypt(Input::get('password'));
		}
		$upt->save();

		return redirect(url('settings'));
	}

	public function is_open($min)
	{
		if(!Auth::check()){
			header("location:".url());
			exit();
		}else{
			if(Auth::user()->jenis<$min){
				header("location:".url());
				exit();
			}
		}
	}
	public function index()
	{
		Session::put('key', "");
		$arr = array('posts'=>Posts::where('deleted_at',NULL)->orderBy('id','desc')->paginate(5));
		if(Auth::check()){
			$arr += array('update'=>$this->is_update(),
				'nama'=>$this->getname(),
				'nickname'=>$this->getnick(),
				'profile'=>Auth::user());
		}
		return view('home')->with($arr);
	}

	public function is_update()
	{

		$user = Auth::user();
		if(!empty($user->namadepan)
			and !empty($user->foto)){
			return true;
		}
		return false;
	}
	public function getname()
	{
		$user = Auth::user();
		$nama = $this->slicer($user->namadepan." ".$user->namabelakang, 32);
		return $nama;
	}
	public function getnick()
	{
		$user = Auth::user();
		$nama = $this->slicer($user->namapengguna,14);
		return $nama;
	}
	public function slicer($value, $len=15)
	{
		if(strlen($value)>$len){
			$value = substr($value, 0, $len)."...";
		}
		return $value;
	}
	public function updateprofile($next='/')
	{
		$data = Input::all();
		$data['tanggallahir'] = date_format(date_create($data['tanggallahir']),"Y-m-d");
	 	if(Input::hasFile('foto') and Input::file('foto')->isValid()){
		$foto = date("YmdHis")
			.uniqid()
			."."
			.Input::file('foto')->getClientOriginalExtension();
		
			Input::file('foto')->move(storage_path().'/foto',$foto);
			$data['foto'] = $foto;
		}
		unset($data['_token']);

    	User::where('id',Auth::user()->id)->update($data);
    	
    	return redirect(url($next));
	}
	public function profile()
	{
		Session::put('key', "");
		return view('mine.profile')->withProfile(Auth::user());
	}
	public function updateinfo()
	{
		User::where('id',Auth::user()->id)->update(array('info'=>Input::get('info')));
	}
	public function dashboard()
	{
		if($this->checkauth(1)['err']==1){
			return $this->checkauth(1)['view'];
		}
		Session::put('key', "");
		//$this->is_open(1);
		$data = array();
		if(Auth::check()){
		$data = array(
			'ranks'=>Posts::where(
				array(
					'deleted_at'=>NULL,
					'idpengguna'=>Auth::user()->id
					)
				)->orderBy('lihat','desc')->limit(10)->get()
			);
		}
		return view('admin.dashboard')->with($data);
	}

	public function about()
	{
		return view('mine.about');
	}

	public function friends()
	{
		$data = array(
			'slide'=>array('up','down','left','right'),
			'size'=>array('tile','tile-wide','tile-large','tile-big','tile-square','tile-big-x'),
			'color'=>array('blue','green','red','black'),
			'friends'=>User::whereRaw('namadepan<>"" and namabelakang<>"" and tanggallahir<>"0000-00-00" and blokir=0 and foto not in ('',1) and hubungan<>"" and namapanggilan<>""')->orderByRaw('id')->paginate(25)
			);

		return view('mine.friends')->with($data);
	}
	public function people($id)
	{
		return view('mine.profile')->withProfile(User::where('id',$id)->first());
	}
	public function activity()
	{
		return view('mine.activity');
	}
	public function settings()
	{
		$data = array('profile'=>Auth::user(),
			'foto_require'=>false);
		return view('mine.settings')->with($data);
	}
	public function komentar($next)
	{
		if(trim(Input::get('isi'))!=""){
			$komen = new Komentar;
			$komen->idpengguna = Auth::user()->id;
			$komen->idpost = $next;
			$komen->isi = Input::get('isi');
			$komen->save();

			$a = Posts::find($next);

			return redirect(url($a->slug));
		}else{
			return redirect(url($a->slug));
		}

	}
	public function actpost($tgl)
	{
		$data = array('act'=>Activities::whereRaw('date_format(created_at,"%Y-%m-%d")="'.$tgl.'"')->get(),
			'tgl'=>$tgl);
		return view('mine.actpost')->with($data);
	}
	public function checkauth($jenis)
	{
		if(Auth::check()){
			if(Auth::user()->jenis<$jenis){
				return array('err'=>1,'view'=>view('errors.404'));
			}else{
				return array('err'=>0,'view'=>view('errors.404'));
			}
		}else{
				return array('err'=>1,'view'=>view('errors.404'));
		}
	}
}
