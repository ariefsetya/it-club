<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Illuminate\Http\Request;
use App\Activities;
use Illuminate\Support\Facades\Input;

class ActivitiesController extends HomeController {


	public function index()
	{
		if($this->checkauth(9)['err']==1){
			return $this->checkauth(9)['view'];
		}
		$div = Activities::where('deleted_at',NULL)->paginate(20);
		return view('admin.activities.all')->withData($div); 
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		if($this->checkauth(9)['err']==1){
			return $this->checkauth(9)['view'];
		}
		return view('admin.activities.add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//

		if($this->checkauth(9)['err']==1){
			return $this->checkauth(9)['view'];
		}
		$divisi = new Activities;
		$divisi->judul =  Input::get('judul');
		$divisi->jenis = 'text';
		$divisi->isi = Input::get('isi');

		if(Input::hasFile('gambar') and Input::file('gambar')->isValid()){
			$gambar = date("YmdHis")
				.uniqid()
				."."
				.Input::file('gambar')->getClientOriginalExtension();
		
			Input::file('gambar')->move(storage_path().'/activities',$gambar);
			$divisi->isi = $gambar;
			$divisi->jenis = 'picture';
		}		
		if(Input::get('video')<>""){
			$divisi->isi = Input::get('video');
			$divisi->jenis = 'video';
		}
                if(Input::get('url')<>""){
                        $divisi->isi = Input::get('url');
                        $divisi->jenis = 'urlimage';
                }


		$divisi->save();


		return redirect(url('admin/activities'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if($this->checkauth(9)['err']==1){
			return $this->checkauth(9)['view'];
		}
		Activities::where('id',$id)->delete();
		return redirect(url('admin/activities'));
	}

}
