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

Route::group(['middleware' => 'locale'], function () {
    Route::get('/', [
        'as' => 'home',
        'uses' => 'Web\HomeController@getIndex',
    ]);

    // Route::group(['prefix' => 'ajax'], function () {
    //     Route::get('district,{provinceId}', 'AjaxController@getDistrict');
    // });
});
Route::get('/', [
    'as' => 'home',
    'uses' => 'Web/HomeController@getIndex',
]);

//*************** Phan Admin *****************

Route::get('admin/login', [
    'as' => 'login',
    'uses' => 'Admin\loginController@ViewLogin',
]);
Route::post('admin/login', [
    'as' => 'LoginAdmin',
    'uses' => 'Admin\loginController@PostLogin',
]);

Route::get('admin/logOut', 'Admin\loginController@AdminlogOut');

Route::group(['prefix' => 'admin', 'middleware' => ['adminLogin', 'locale']], function () {
    Route::resource('dashboard', 'Admin\DashboardController');
    Route::get('change-language/{lang}', [
        'as' => 'change_lang',
        'uses' => 'Admin\DashboardController@change_lang',
    ]);

    Route::resource('apartments', 'Admin\ApartmentController');
    Route::post('apartments-delete\{id}', 'Admin\ApartmentController@delete')->name('delete_apartment');

    Route::get('apartment-data', 'Admin\ApartmentController@getData')->name('getdata-pro');
});
