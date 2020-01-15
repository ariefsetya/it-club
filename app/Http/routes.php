<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','HomeController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('md5/{value}',function($value)
{
	echo md5($value);
});

Route::post('vauth/login',function ()
{
	$credentials = App\User::where('email',Input::get('email'))->first();
	if($credentials->password==""){
		if(md5(Input::get('password'))==$credentials->katasandi){
			$credentials->password = bcrypt(Input::get('password'));
			$credentials->katasandi = "";
			$credentials->save();
			Auth::loginUsingId($credentials->id);
			return redirect(url());
		}else{
			return redirect(url('auth/login'));
		}
	}else{
		if (Auth::attempt(['email' => Input::get("email"), 'password' => Input::get("password")]))
        {
            return redirect()->intended(url());
        }else{
        	return redirect(url('auth/login'));
        }
	}
});

Route::get('/check',function ()
{
	
		$user = Auth::user();
		echo $user->email;
});

Route::get("loginid/{id}",function ($id)
{
	Auth::loginUsingId($id);	
});

Route::get('settings', 'HomeController@settings');

Route::get('profile', 'HomeController@profile');
Route::get('login', function()
{
	return redirect(url('auth/login'));
});
Route::get('join', function()
{
	return redirect(url('auth/register'));
});

Route::get('people/{id}', 'HomeController@people');
Route::get('friends/{id}', function ($id)
{
	return redirect(url('people/'.$id));
});

Route::group(['prefix' => 'mine'], function()
{
    Route::post('info', 'HomeController@updateinfo');

    Route::get('dashboard', 'HomeController@dashboard');

    Route::post('komen/{next}','HomeController@komentar');

    Route::post('update/{next?}','HomeController@updateprofile');
    
    Route::post('social','HomeController@updatesocial');

    Route::post('account','HomeController@updateaccount');
    
    Route::get('detail/{slug}',function ($slug)
    {
    	return redirect(url($slug));
    });
    Route::get('timeline/{tgl}',function ($tgl)
    {
    	return redirect(url('activities/'.$tgl));
    });
    Route::get('timeline',function ()
    {
    	return redirect(url('activities'));
    });

	Route::group(['prefix' => 'posts'], function()
	{
	    Route::get('/', 'PostController@index');
		Route::get('add', 'PostController@create');
		Route::post('add', 'PostController@store');
		Route::get('edit/{id}', 'PostController@edit');
		Route::post('update', 'PostController@update');
		Route::get('delete/{id}', 'PostController@destroy');
	});
});

Route::group(['prefix' => 'admin'], function()
{
	Route::group(['prefix' => 'divisi'], function()
	{
	    Route::get('/','DivisiController@index');
		Route::get('add','DivisiController@create');
		Route::post('add','DivisiController@store');
		Route::get('edit/{id}','DivisiController@edit');
		Route::post('update','DivisiController@update');
		Route::get('delete/{id}','DivisiController@destroy');
	});
	Route::group(['prefix' => 'category'], function()
	{
	    Route::get('/','CategoryController@index');
		Route::get('add','CategoryController@create');
		Route::post('add','CategoryController@store');
		Route::get('edit/{id}','CategoryController@edit');
		Route::post('update','CategoryController@update');
		Route::get('delete/{id}','CategoryController@destroy');
	});
	Route::group(['prefix' => 'structure'], function()
	{
	    Route::get('/','StructureController@index');
		Route::get('add','StructureController@create');
		Route::post('add','StructureController@store');
		Route::get('edit/{id}','StructureController@edit');
		Route::post('update','StructureController@update');
		Route::get('delete/{id}','StructureController@destroy');
	});
	Route::group(['prefix' => 'users'], function()
	{
	    Route::get('/','UsersController@index');
		// Route::get('add','UsersController@create');
		// Route::post('add','UsersController@store');
		Route::get('edit/{id}','UsersController@edit');
		Route::post('update','UsersController@update');
		Route::get('delete/{id}','UsersController@destroy');
	});
	Route::group(['prefix' => 'website'], function()
	{
	    Route::get('/','WebsiteController@index');
		Route::get('add','WebsiteController@create');
		Route::post('add','WebsiteController@store');
		Route::get('edit/{id}','WebsiteController@edit');
		Route::post('update','WebsiteController@update');
		Route::get('delete/{id}','WebsiteController@destroy');
	});
	Route::group(['prefix' => 'activities'], function()
	{
	    Route::get('/','ActivitiesController@index');
		Route::get('add','ActivitiesController@create');
		Route::post('add','ActivitiesController@store');
		Route::get('delete/{id}','ActivitiesController@destroy');
	});
	Route::group(['prefix' => 'popups'], function()
	{
	    Route::get('/','PopupsController@index');
		Route::get('add','PopupsController@create');
		Route::post('add','PopupsController@store');
		Route::get('delete/{id}','PopupsController@destroy');
	});
});

Route::get('sendmail/{nama}',function ($nama)
{
	Mail::send('emails.test', ['key' => $nama], function($message)
	{
	    $message->to('emailanenih@gmail.com', 'Arief Setya')->subject('Welcome!');
	});
});
Route::get('mail/{nama}',function ($nama)
{
	return view('emails.test')->withKey($nama);
});

Route::get('itclub10vhs','HomeController@about');

Route::post('search','PostController@search');
Route::get('activities','HomeController@activity');
Route::get('activities/{tgl}','HomeController@actpost');
Route::get('search/{tag?}','PostController@search');
Route::get('friends','HomeController@friends');
Route::get('session',function ()
{
	echo "<pre>".print_r(Session::all(),1)."</pre>";
});


Route::get('/images/{addpath}/{filename}', function ($addpath,$filename)
{
    $path = storage_path() . '/'.$addpath.'/' . $filename;

    $file = File::get($path);
    $type = File::mimeType($path);

    $ext = explode(".",$filename);  //fungsi ini
    $ext = $ext[sizeof($ext)-1];    //buat ngambil ekstensi

    if(in_array($ext,array('png','gif','jpg','jpeg'))){ //ngecek ekstensinya termasuk gambar atau ngga

        if(@is_array(getimagesize($path))){ //ngecek property gambar, karna ekstensi aja bisa diakali
        
            $response = Response::make($file, 200);
            $response->header("Content-Type", $type);
        
            return $response;
        }else{
            return "Iseng bae wkwk"; //kalau format gambar tapi isinya teks keluarannya ini
        }
    }else{
        return "Hayoo lagi ngapain wkwk"; //kalau selain format gambar keluarannya ini
    }
});

Route::get('notfound',function()
{
	echo "hehe (?)";
});
Route::get('/{slug}','PostController@show');