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
//*************** Phan frontend *****************
Route::get('/', function () {
	return view('website');

});

//*************** Phan Admin *****************

Route::get('admin/login', [
	'as' => 'login',
	'uses' => 'admin\loginController@ViewLogin',
]);
Route::post('admin/login', [
	'as' => 'LoginAdmin',
	'uses' => 'admin\loginController@PostLogin',
]);

Route::get('admin/logOut', 'admin\loginController@AdminlogOut');

Route::group(['prefix' => 'admin', 'middleware' => ['adminLogin', 'locale']], function () {
	Route::resource('Dashboard', 'admin\DashboardController');
	Route::get('change-language/{lang}', [
		'as' => 'change_lang',
		'uses' => 'admin\DashboardController@change_lang',
	]);

	// code tiếp theo

});
