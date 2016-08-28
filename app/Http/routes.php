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

Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware' => ['web']], function () {
	/* Route cate*/
	Route::get('cates/',			 ['as'=>'admin.cate.index', 'uses'=>'CateController@index']);
	Route::get('cates/add', 		 ['as'=>'admin.cate.create', 'uses'=>'CateController@create']);
	Route::post('cate/', 			 ['as'=>'admin.cate.store', 'uses'=>'CateController@store']);
	Route::get('cate/delete/{cate}', ['as'=>'admin.cate.destroy', 'uses' => 'CateController@destroy']);
	Route::get('cate/{cate}/edit',   ['as'=>'admin.cate.edit', 'uses'=>'CateController@edit']);
	Route::post('cate/{cate}', 		 ['as'=>'admin.cate.update', 'uses'=>'CateController@update']);

	/*route product*/
	Route::get('products/',					['as'=>'admin.product.index', 'uses'=>'ProductController@index']);
	Route::get('products/add', 				['as'=>'admin.product.create', 'uses'=>'ProductController@create']);
	Route::post('product/', 				['as'=>'admin.product.store','uses'=>'ProductController@store']);
	Route::get('product/{product}/edit',	['as'=>'admin.product.edit', 'uses'=>'ProductController@edit']);
	Route::post('product/{product}', 		['as'=>'admin.product.update', 'uses'=>'ProductController@update']);
	Route::get('product/delete/{product}',  ['as'=>'admin.product.destroy', 'uses'=>'ProductController@destroy']);

	Route::get('product/delImg/{image}',	['as'=>'admin.product.getDelImg', 'uses'=>'ProductController@delImg']);

	/*route user*/
	Route::get('users/', 			 ['as'=>'admin.user.index', 'uses'=>'UserController@index']);
	Route::get('users/add', 		 ['as'=>'admin.user.create', 'uses'=>'UserController@create']);
	Route::post('user/', 			 ['as'=>'admin.user.store', 'uses'=>'UserController@store']);
	Route::get('user/{user}/edit', 	 ['as'=>'admin.user.edit', 'uses'=>'UserController@edit']);
	Route::post('user/{user}', 		 ['as'=>'admin.user.update', 'uses'=>'UserController@update']);
	Route::get('user/delete/{user}', ['as'=>'admin.user.delete', 'uses'=>'UserController@destroy']);

	Route::auth();
	Route::get('/master', ['uses'=>'HomeController@master']);
	Route::get('/login', ['uses'=>'Auth\AuthController@getLogin']);
	Route::post('/login', ['uses'=>'Auth\AuthController@postLogin']);
	Route::get('/logout', ['uses'=>'Auth\AuthController@getLogout']);
});

