<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Website;
use Illuminate\Support\Facades\Input;

class WebsiteController extends HomeController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if($this->checkauth(9)['err']==1){
			return $this->checkauth(9)['view'];
		}
		$div = Website::where('deleted_at',NULL)->get();
		return view('admin.website.all')->withData($div); 
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
		return view('admin.website.add');
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
		$divisi = new Website;
		$divisi->kunci =  Input::get('kunci');
		$divisi->jenis =  Input::get('jenis');
		$divisi->isi =  Input::get('isi');
		$divisi->save();


		return redirect(url('admin/website'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if($this->checkauth(9)['err']==1){
			return $this->checkauth(9)['view'];
		}
		$data = Website::where('id',$id)->first();
		return view('admin.website.edit')->withData($data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		
		if($this->checkauth(9)['err']==1){
			return $this->checkauth(9)['view'];
		}

		$divisi = Website::where('id',Input::get('id'))->first();
		$divisi->kunci =  Input::get('kunci');
		$divisi->jenis =  Input::get('jenis');
		$divisi->isi =  Input::get('isi');
		$divisi->save();


		return redirect(url('admin/website'));
	}

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
		Website::where('id',$id)->delete();
		return redirect(url('admin/website'));
	}

}
