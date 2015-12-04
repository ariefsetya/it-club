<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Divisi;
use Illuminate\Support\Facades\Input;

class DivisiController extends HomeController {

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
		$div = Divisi::where('deleted_at',NULL)->get();
		return view('admin.divisi.all')->withDivisi($div); 
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
		return view('admin.divisi.add');
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
		$gambar = "";


		$divisi = new Divisi;
		$divisi->nama =  Input::get('nama');

		if(Input::hasFile('gambar') and Input::file('gambar')->isValid()){
			$gambar = date("YmdHis")
				.uniqid()
				."."
				.Input::file('gambar')->getClientOriginalExtension();
		
			Input::file('gambar')->move(storage_path().'/gambardivisi',$gambar);
		}

		$divisi->gambar = $gambar;
		$divisi->keterangan = Input::get('keterangan');
		$divisi->save();


		return redirect(url('admin/divisi'));
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
		$data = Divisi::where('id',$id)->first();
		return view('admin.divisi.edit')->withDivisi($data);
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
		
		$gambar = "";


		$divisi = Divisi::where('id',Input::get('id'))->first();
		$divisi->nama =  Input::get('nama');

		if(Input::hasFile('gambar') and Input::file('gambar')->isValid()){
			$gambar = date("YmdHis")
				.uniqid()
				."."
				.Input::file('gambar')->getClientOriginalExtension();
		
			Input::file('gambar')->move(storage_path().'/gambardivisi',$gambar);
		
			$divisi->gambar = $gambar;
		}
		
		$divisi->keterangan = Input::get('keterangan');
		$divisi->save();


		return redirect(url('admin/divisi'));
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
		Divisi::where('id',$id)->delete();
		return redirect(url('admin/divisi'));
	}

}
