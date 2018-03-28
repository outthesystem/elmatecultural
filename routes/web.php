<?php

//dashboard routes

Route::get('/', 'FrontendController@index')->name('front.index');
Route::post('store', 'FrontendController@store')->name('front.store');

Route::group(['middleware' => ['permission:ver_dashboard']], function () {
  Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
});

Route::group(['middleware' => ['permission:ver_categorias']], function () {
  Route::get('/category', 'CategoryController@index')->name('category.index');
});
Route::group(['middleware' => ['permission:crear_categorias']], function () {
  Route::post('/category', 'CategoryController@store')->name('category.store');
});
Route::group(['middleware' => ['permission:editar_categorias']], function () {
  Route::get('/category/{category}/edit', 'CategoryController@edit')->name('category.edit');
});
Route::group(['middleware' => ['permission:actualizar_categorias']], function () {
  Route::post('/category/{category}', 'CategoryController@update')->name('category.update');
});
Route::group(['middleware' => ['permission:eliminar_categorias']], function () {
  Route::delete('/category/{category}', 'CategoryController@delete')->name('category.destroy');
});


Route::group(['middleware' => ['permission:ver_publicaciones']], function () {
  Route::get('/posts', 'PostController@index')->name('post.index');
});
Route::group(['middleware' => ['permission:crear_publicaciones']], function () {
  Route::get('/post/create', 'PostController@create')->name('post.create');
  Route::post('/post', 'PostController@store')->name('post.store');
});
Route::group(['middleware' => ['permission:editar_publicaciones']], function () {
  Route::get('/post/{post}/edit', 'PostController@edit')->name('post.edit');
});
Route::group(['middleware' => ['permission:actualizar_publicaciones']], function () {
  Route::post('/post/{post}', 'PostController@update')->name('post.update');
});
Route::group(['middleware' => ['permission:eliminar_publicaciones']], function () {
  Route::delete('/post/{post}', 'PostController@delete')->name('post.destroy');
});

Auth::routes();

Route::group( ['middleware' => ['auth']], function() {
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('posts', 'PostController');
	Route::resource('permissions','PermissionController');
});
