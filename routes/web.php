<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['namespace'=>'Admin','prefix'=>'admin'], function() {
	Route::get('/', 'AdminController@index');
	Route::group(['prefix'=>'news'], function () {
		Route::get('/',['as' => 'news.index','uses' => 'ListNewsController@index']);
		Route::get('/create',['as' => 'news.create','uses' => 'ListNewsController@create']);
		Route::post('/store',['as' => 'news.store','uses' => 'ListNewsController@store']);
		Route::get('/edit/{id}',['as' => 'news.edit','uses' => 'ListNewsController@edit']);
		Route::put('/update/{id}',['as' => 'news.update','uses' => 'ListNewsController@update']);
	});
});
	