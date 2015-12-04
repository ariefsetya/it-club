<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;

class UsersController extends HomeController {

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
		$div = User::withTrashed()->orderBy('email')->paginate(20);
		return view('admin.users.all')->withData($div); 
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
		$data = User::where('id',$id)->first();
		return view('admin.users.edit')->withData($data);
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
		$data = User::where('id',Input::get('id'))->first();
		$data->namadepan = Input::get('namadepan');
		$data->namabelakang = Input::get('namabelakang');

		if(Input::hasFile('foto') and Input::file('foto')->isValid()){
			$foto = date("YmdHis")
				.uniqid()
				."."
				.Input::file('foto')->getClientOriginalExtension();
		
			Input::file('foto')->move(storage_path().'/foto',$foto);
			$data->foto = $foto;
		}

		$data->email = Input::get('email');
		$data->jenis = Input::get('jenis');
		$data->save();


		return redirect(url('admin/users'));
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
		$us = User::where('id',$id)->withTrashed()->first();
		if(is_null($us->deleted_at)){
			User::where('id',$id)->delete();
		}else{
			$us->restore();
		}
		return redirect(url('admin/users'));
	}

}
