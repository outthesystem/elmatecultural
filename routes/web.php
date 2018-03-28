<?php

//dashboard routes

Route::get('/', 'FrontendController@index')->name('front.index');
Route::post('store', 'FrontendController@store')->name('front.store');

Route::group(['middleware' => ['permission:ver_dashboard']], function () {
  Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
});

Auth::routes();

Route::group( ['middleware' => ['auth']], function() {
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('posts', 'PostController');
	Route::resource('permissions','PermissionController');
});
