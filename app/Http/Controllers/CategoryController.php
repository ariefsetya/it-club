<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Category;
use App\Divisi;
use Illuminate\Support\Facades\Input;

class CategoryController extends HomeController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getdiv($id)
	{
		return Divisi::where('id',$id)->first()->nama;
	}

	public function index()
	{
		if($this->checkauth(9)['err']==1){
			return $this->checkauth(9)['view'];
		}
		$cat = Category::where('deleted_at',NULL)->get();
		return view('admin.category.all')->withCategory($cat); 
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
		$div = Divisi::where('deleted_at',NULL)->get();
		return view('admin.category.add')->withDivisi($div);
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

		$category = new Category;
		$category->nama =  Input::get('nama');
		$category->iddivisi =  Input::get('iddivisi');
		$category->keterangan = Input::get('keterangan');
		$category->save();


		return redirect(url('admin/category'));
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
		$div = Divisi::where('deleted_at',NULL)->get();
		$data = Category::where('id',$id)->first();
		return view('admin.category.edit')->with(array('category'=>$data,'divisi'=>$div));
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
		$category = Category::where('id',Input::get('id'))->first();
		$category->nama =  Input::get('nama');
		$category->iddivisi =  Input::get('iddivisi');
		$category->keterangan = Input::get('keterangan');
		$category->save();


		return redirect(url('admin/category'));
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
		Category::where('id',$id)->delete();
		return redirect(url('admin/category'));
	}

}
