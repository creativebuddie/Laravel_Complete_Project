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

/*Auth Users Routes*/
Route::get('/admin', function(){
	if(session()->get('authId')===NULL):
		return view('admin.adminLogin');
	else:
		return view('admin.dashboard');
	endif;	
});
Route::post('/checkAuthentication', 'adminController@adminLogin');

Route::group(['middleware'=>'loginAuthhentication'], function(){
/*Admin Users Routes*/
Route::get('/dashboard', 'adminController@dashboard');
Route::get('/adminUsers/create', 'adminController@create');
Route::post('/adminUsers/store', 'adminController@store');
Route::get('/adminUsers/show', 'adminController@show');
Route::get('/adminUsers/edit/{id}', 'adminController@edit');
Route::post('/adminUsers/update/{id}', 'adminController@update');
Route::get('/adminUsers/destroy/{id}', 'adminController@destroy');
/*Admin Category Routes*/
Route::get('/proCategory/create', 'categoryController@create');
Route::post('/proCategory/store', 'categoryController@store');
Route::get('/proCategory/show', 'categoryController@show');
Route::get('/proCategory/edit/{id}', 'categoryController@edit');
Route::post('/proCategory/update/{id}', 'categoryController@update');
Route::get('/proCategory/destroy/{id}', 'categoryController@destroy');
Route::get('/adminBanners/create', 'bannerController@create');
Route::post('/adminBanners/store', 'bannerController@store');
Route::get('/adminBanners/show', 'bannerController@show');
Route::get('/adminBanners/edit/{id}', 'bannerController@edit');
Route::post('/adminBanners/update/{id}', 'bannerController@update');
Route::get('/adminBanners/destroy/{id}', 'bannerController@destroy');

/*Genric Routes*/
Route::get('/genric/status', 'genricController@updateStatus');
});

/*Front Website Routes*/
Route::get('/', 'siteController@index');