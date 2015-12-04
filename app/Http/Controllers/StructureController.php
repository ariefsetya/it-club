<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Structure;
use Illuminate\Support\Facades\Input;

class StructureController extends HomeController {

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
		$div = Structure::where('deleted_at',NULL)->get();
		return view('admin.structure.all')->withData($div); 
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
		return view('admin.structure.add');
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
		$divisi = new Structure;
		$divisi->nama =  Input::get('nama');
		$divisi->level =  Input::get('level');

		// if(Input::hasFile('gambar') and Input::file('gambar')->isValid()){
		// 	$gambar = date("YmdHis")
		// 		.uniqid()
		// 		."."
		// 		.Input::file('gambar')->getClientOriginalExtension();
		
		// 	Input::file('gambar')->move(storage_path().'/gambardivisi',$gambar);
		// }

		//$divisi->gambar = $gambar;
		$divisi->periode_awal = Input::get('periode_awal');
		$divisi->periode_akhir = Input::get('periode_akhir');
		$divisi->save();


		return redirect(url('admin/structure'));
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
		$data = Structure::where('id',$id)->first();
		return view('admin.structure.edit')->withData($data);
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

		$divisi = Structure::where('id',Input::get('id'))->first();
		$divisi->nama =  Input::get('nama');
		$divisi->level =  Input::get('level');

		// if(Input::hasFile('gambar') and Input::file('gambar')->isValid()){
		// 	$gambar = date("YmdHis")
		// 		.uniqid()
		// 		."."
		// 		.Input::file('gambar')->getClientOriginalExtension();
		
		// 	Input::file('gambar')->move(storage_path().'/gambardivisi',$gambar);
		
		// 	$divisi->gambar = $gambar;
		// }
		
		$divisi->periode_awal = Input::get('periode_awal');
		$divisi->periode_akhir = Input::get('periode_akhir');
		$divisi->save();


		return redirect(url('admin/structure'));
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
		Structure::where('id',$id)->delete();
		return redirect(url('admin/structure'));
	}

}
