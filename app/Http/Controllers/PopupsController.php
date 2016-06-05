<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Input;

class PopupsController extends HomeController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$s['data'] = \App\Popups::paginate(10);
		return view('admin.popups.all')->with($s);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.popups.add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$a = new \App\Popups;
		$a->judul = Input::get('judul');
		$a->slug = str_slug(Input::get('judul'));
		$a->deskripsi = Input::get('keterangan');
		$a->tipe_valid = Input::get('type_valid');
		if($a->tipe_valid=="by_datetime" or $a->tipe_valid=="by_date"){
			$a->date_valid_start = date_format(date_create(Input::get('date_valid_start')),"Y-m-d");
			$a->date_valid_end = date_format(date_create(Input::get('date_valid_end')),"Y-m-d");
		}
		if($a->tipe_valid=="by_datetime" or $a->tipe_valid=="by_time"){
			$a->time_valid_start = date_format(date_create(Input::get('time_valid_start')),"H:i:s");
			$a->time_valid_end = date_format(date_create(Input::get('time_valid_end')),"H:i:s");
		}
		if(Input::hasFile('image') and Input::file('image')->isValid()){
			$image = date("YmdHis")
				.uniqid()
				."."
				.Input::file('image')->getClientOriginalExtension();
		
			Input::file('image')->move(storage_path().'/popup_image',$image);
			$a->image = $image;
		}
		$a->keep_open = Input::get('keep_open');
		$a->hotlink = Input::get('hotlink');
		$a->idpengguna = Auth::user()->id;
		$a->save();
		return redirect(url('admin/popups'));
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$a = \App\Popups::find($id);
		$a->delete();
		
		return redirect(url('admin/popups'));
	}

}
