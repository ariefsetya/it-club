<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Category;
use App\Posts;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\HomeController;

class PostController extends HomeController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if($this->checkauth(1)['err']==1){
			return $this->checkauth(1)['view'];
		}
		$div = Posts::where(array('deleted_at'=>NULL,'idpengguna'=>Auth::user()->id))->orderBy('id','desc')->paginate(10);
		///print_r($div);
		return view('admin.post.all')->withPosts($div); 
	}	

	public function search($tag="")
	{
		
		$arr = array();
		if(($tag>0)){
			$arr = array('posts'=>Posts::where('idcategory',$tag)->orderBy('id','desc')->paginate(10),
				'tag'=>$tag);
		}elseif((Input::get('key')<>"")){
			Session::put('key', Input::get('key'));
		}
		if(Session::get('key')<>""){
			$arr = array('posts'=>Posts::where('judul','LIKE','%'.Session::get('key').'%')->orWhere('isi','LIKE','%'.Session::get('key').'%')->orderBy('id','desc')->paginate(10),
				'key'=>Session::get('key'));
		}
		if(Auth::check()){
			$arr += array('update'=>$this->is_update(),
				'nama'=>$this->getname(),
				'nickname'=>$this->getnick());
		}
		return view('post.search')->with($arr); 
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		if($this->checkauth(1)['err']==1){
			return $this->checkauth(1)['view'];
		}
		$div = Category::where('deleted_at',NULL)->get();
		return view('admin.post.add')->withCategory($div);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		if($this->checkauth(1)['err']==1){
			return $this->checkauth(1)['view'];
		}

		$post = new Posts;
		$post->judul =  Input::get('judul');
		$post->slug = str_slug(Input::get('judul'));

		if(Input::hasFile('sampul') and Input::file('sampul')->isValid()){
			$sampul = date("YmdHis")
				.uniqid()
				."."
				.Input::file('sampul')->getClientOriginalExtension();
		
			Input::file('sampul')->move(storage_path().'/sampulpost',$sampul);
			$post->sampul = $sampul;
		}

		$post->idpengguna = Auth::user()->id;
		$post->idcategory = Input::get('idcategory');
		$post->tags = Input::get('tags');
		$post->isi = Input::get('isi');
		$post->save();


		return redirect(url('mine/posts'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{

		Session::put('key', "");
		$post = array();
		if(is_numeric($slug)){
			$post = $this->getpostbyID($slug);
		}else{
			$post = $this->getpostbySlug($slug);
		}

		if(empty($post)){
			return view('errors.404');
			//return redirect('notfound');
		}


		$arr = array('data'=>$post);
		if(Auth::check()){
			$arr += array('update'=>$this->is_update(),
				'nama'=>$this->getname(),
				'nickname'=>$this->getnick());
		}

		$log = \App\Logdata::where(array('pathinfo'=>'/'.$post->slug,'ip'=>$_SERVER['REMOTE_ADDR']))->get();

		if(sizeof($log)<2){
			$lihat = Posts::where('slug',$post->slug)->first();
			$lihat->lihat = (int)$lihat->lihat+1;
			$lihat->save(); 
		}

		return view('post.detail')->with($arr);
	}
	public function getpostbyID($id)
	{
		return Posts::where('id',$id)->first();
	}
	public function getpostbySlug($id)
	{
		return Posts::where('slug',$id)->first();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		if($this->checkauth(1)['err']==1){
			return $this->checkauth(1)['view'];
		}
		$data = array('category'=>Category::where('deleted_at',NULL)->get(),
			'data'=>Posts::where('id',$id)->first());
		return view('admin.post.edit')->with($data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		if($this->checkauth(1)['err']==1){
			return $this->checkauth(1)['view'];
		}
		$post = Posts::where('id',Input::get('id'))->first();
		$post->judul =  Input::get('judul');
		$post->slug =  str_slug(Input::get('judul'));

		if(Input::hasFile('sampul') and Input::file('sampul')->isValid()){
			$sampul = date("YmdHis")
				.uniqid()
				."."
				.Input::file('sampul')->getClientOriginalExtension();
		
			Input::file('sampul')->move(storage_path().'/sampulpost',$sampul);
			$post->sampul = $sampul;
		}

		$post->idcategory = Input::get('idcategory');
		$post->tags = Input::get('tags');
		$post->isi = Input::get('isi');
		$post->save();


		return redirect(url('mine/posts'));

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Posts::find($id)->delete();
		return redirect(url('mine/posts'));
	}

}
