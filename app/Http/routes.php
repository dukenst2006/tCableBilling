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
// Home URL [Must Be Logged In]
Route::group(['middleware' => 'auth'], function(){
	Route::get('/home', array( 'as' => 'home', 'uses' => 'HomeController@index') );
	Route::get('/general-bill', array( 'as' => 'general-bill',
			function()
			{
				return view('general_bill');
			}
		)
	);

	Route::get('/per-client-bill', array( 'as' => 'per-client-bill',
			function()
			{
				return view('per_client_bill');
			}
		)
	);

	Route::resource( '/clients', 'ClientsController' );
	Route::resource( '/packages', 'PackagesController' );
	Route::resource( '/areas', 'AreasController' );
});
// Authentication routes...
Route::get('/', 'Auth\AuthController@getLogin');
Route::post('/', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');
