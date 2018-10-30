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

    Route::group(['prefix' => 'ajax'], function () {
        Route::get('district,{provinceId}', 'AjaxController@getDistrict');
    });
});

//*************** Phan Admin *****************

//login
Route::get('admin/login', [
    'as' => 'login',
    'uses' => 'Admin\loginController@ViewLogin',
]);
Route::post('admin/login', [
    'as' => 'LoginAdmin',
    'uses' => 'Admin\loginController@PostLogin',
]);

//đăng ký
Route::get('admin/register', [
    'as' => 'create_acount',
    'uses' => 'Admin\RegisterController@create',
]);
Route::post('admin/register', [
    'as' => 'store',
    'uses' => 'Admin\RegisterController@store',
]);

//logout
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

    //category
    Route::resource('/categories', 'Admin\CategoryController')->except(['show']);
    //hidden and show status of category
    Route::post('hidden_status_categories/{id?}',
        'Admin\CategoryController@hiddenStatusCategories')->name('hidden_status_categories');
    Route::post('show_status_categories/{id?}',
        'Admin\CategoryController@showStatusCategories')->name('show_status_categories');

    //posts
    Route::resource('/posts', 'Admin\PostController');
    //hidden and show status of post
    Route::post('hidden_status_posts/{id?}', 'Admin\PostController@hiddenStatusPosts')->name('hidden_status_posts');
    Route::post('show_status_posts/{id?}', 'Admin\PostController@showStatusPosts')->name('show_status_posts');

    //pages
    Route::resource('/pages', 'Admin\PageController');
    //hidden and show status of page
    Route::post('hidden_status_pages/{id?}', 'Admin\PageController@hiddenStatusPages')->name('hidden_status_pages');
    Route::post('show_status_pages/{id?}', 'Admin\PageController@showStatusPages')->name('show_status_pages');

    //slides
    Route::resource('/slides', 'Admin\SlideController');
    //hidden and show status of slide
    Route::post('hidden_status_slides/{id?}',
        'Admin\SlideController@hiddenStatusSlides')->name('hidden_status_slides');
    Route::post('show_status_slides/{id?}', 'Admin\SlideController@showStatusSlides')->name('show_status_slides');

    //about us
    Route::resource('/about_us', 'Admin\AboutUsController');
    //hidden and show status of aboutus
    Route::post('hidden_status_about_us/{id?}',
        'Admin\AboutUsController@hiddenStatusAboutUs')->name('hidden_status_about_us');
    Route::post('show_status_about_us/{id?}',
        'Admin\AboutUsController@showStatusAboutUs')->name('show_status_about_us');

    //role
    Route::resource('roles', 'Admin\RoleController');

    //permission
    Route::resource('permissions', 'Admin\PermissionController');

    //users
    Route::resource('users', 'Admin\UserController');
    Route::put('update_img/{id?}','Admin\UserController@update_img')->name('update_img');
    //hidden and show status of user
    Route::post('hidden_status_users/{id?}', 'Admin\UserController@hiddenStatusUsers')->name('hidden_status_users');
    Route::post('show_status_users/{id?}', 'Admin\UserController@showStatusUsers')->name('show_status_users');
});
