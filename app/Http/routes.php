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
Route::group(['middleware' => 'auth'], function(){
	Route::get('app/home', 'AdminController@index')->name('admin_home');
	Route::resource('app/info', 'InfoController');
	Route::resource('app/indukkategori', 'IndukController');
	Route::get('/app/logout', 'AdminController@getLogout')->name('get_logout');

	Route::get('app/kategori', 'KategoriController@index')->name('index_kategori');
	Route::get('app/kategori/insert', 'KategoriController@create')->name('get_insert_kategori');
	Route::post('app/kategori/insert', 'KategoriController@store')->name('post_insert_kategori');
	Route::get('app/kategori/edit/{id}', 'KategoriController@edit')->name('get_update_kategori');
	Route::put('app/kategori/edit/{id}', 'KategoriController@update')->name('post_update_kategori');
	Route::delete('app/kategori/delete/{id}', 'KategoriController@destroy')->name('get_delete_kategori');

	Route::get('app/indukkategori', 'IndukController@index')->name('index_indukkategori');
	Route::get('app/indukkategori/insert', 'IndukController@create')->name('get_insert_indukkategori');
	Route::post('app/indukkategori/insert', 'IndukController@store')->name('post_insert_indukkategori');
	Route::get('app/indukkategori/edit/{id}', 'IndukController@edit')->name('get_update_indukkategori');
	Route::put('app/indukkategori/edit/{id}', 'IndukController@update')->name('post_update_indukkategori');
	Route::delete('app/indukkategori/delete/{id}', 'IndukController@destroy')->name('get_delete_indukkategori');

	Route::get('app/user', [
		'uses' => 'UserController@index',
		'as' => 'index_user',
		'middleware' => 'roles',
		'roles' => ['admin']
	]);
	Route::get('app/user/insert', [
		'uses' => 'UserController@create',
		'as' => 'get_insert_user',
		'middleware' => 'roles',
		'roles' => ['admin']
	]);
	Route::post('app/user/insert', 'UserController@store')->name('post_insert_user');
	Route::get('app/user/edit/{id}', [
		'uses' => 'UserController@edit',
		'as' => 'get_update_user',
		'middleware' => 'roles',
		'roles' => ['admin']
	]);
	Route::put('app/user/edit/{id}', 'UserController@update')->name('post_update_user');
	Route::delete('app/user/delete/{id}', [
		'uses' => 'UserController@destroy',
		'as' => 'get_delete_user',
		'middleware' => 'roles',
		'roles' => ['admin']
	]);
	Route::post('app/user/assign', [
		'uses' => 'UserController@postAssignRoles',
		'as' => 'assign_roles'
	]);

	Route::get('app/artikel', 'ArtikelController@index')->name('index_artikel');
	Route::get('app/artikel/insert', 'ArtikelController@create')->name('get_insert_artikel');
	Route::post('app/artikel/insert', 'ArtikelController@store')->name('post_insert_artikel');
	Route::get('app/artikel/edit/{id}', 'ArtikelController@edit')->name('get_update_artikel');
	Route::put('app/artikel/edit/{id}', 'ArtikelController@update')->name('post_update_artikel');
	Route::delete('app/artikel/delete/{id}', 'ArtikelController@destroy')->name('get_delete_artikel');

	Route::get('app/subscriber', 'subscriberController@index')->name('index_subscriber');
	Route::get('app/subscriber/edit/{id}', 'subscriberController@edit')->name('get_update_subscriber');
	Route::put('app/subscriber/edit/{id}', 'subscriberController@update')->name('post_update_subscriber');
	Route::delete('app/subscriber/delete/{id}', 'subscriberController@destroy')->name('get_delete_subscriber');

	Route::get('app/message', 'messageController@index')->name('index_message');
	Route::get('app/message/insert', 'messageController@create')->name('get_insert_message');
	Route::post('app/message/insert', 'messageController@store')->name('post_insert_message');
	Route::get('app/message/edit/{id}', 'messageController@edit')->name('get_update_message');
	Route::put('app/message/edit/{id}', 'messageController@update')->name('post_update_message');
	Route::delete('app/message/delete/{id}', 'messageController@destroy')->name('get_delete_message');

	Route::get('app/user/profile', 'profilController@index')->name('index_profil');
	Route::get('app/user/profile/edit/{id}', 'profilController@edit')->name('get_update_profil');
	Route::put('app/user/profile/edit/{id}', 'profilController@update')->name('post_update_profil');	
});

Route::group(['middleware' => 'guest'], function(){
Route::get('/login', 'UserController@getLogin')->name('login');
Route::get('/', 'BlogController@index')->name('get_blog');
Route::post('/login', 'UserController@postLogin')->name('post_login');
Route::get('/register', 'UserController@getRegister')->name('register');
Route::post('/register', 'UserController@postRegister')->name('post_register');
Route::get('/password/email', 'Auth\PasswordController@getEmail')->name('get_forgot_pass');
Route::post('/password/email', 'Auth\PasswordController@postEmail')->name('post_forgot_pass');
Route::get('/password/reset/{token}', 'Auth\PasswordController@getReset')->name('get_reset_pass');
Route::post('/password/reset', 'Auth\PasswordController@postReset')->name('post_reset_pass');
Route::get('/register/verify/{confirmationCode}', 'UserController@confirm');
Route::get('auth/facebook', 'UserController@redirectToProvider')->name('get_auth_facebook');
Route::get('auth/facebook/callback', 'UserController@handleProviderCallback')->name('get_facebook_callback');
Route::get('auth/google', 'UserController@redirectToProviderGoogle')->name('get_auth_google');
Route::get('auth/google/callback', 'UserController@handleProviderCallbackGoogle')->name('get_google_callback');
});

Route::get('/blog/contact', 'BlogController@getContact')->name('get_blog_contact');
Route::post('/blog/contact', 'BlogController@postContact')->name('post_blog_contact');
Route::get('/blog', 'BlogController@index')->name('get_blog');
Route::get('/artikel/{slug}', 'BlogController@show')->name('single_artikel');
Route::get('/blog/seacrh', 'BlogController@search')->name('get_blog_seacrh');
Route::get('/blog/author/{name}', 'BlogController@getAuthor')->name('get_artikel_author');
Route::get('/blog/kategori/{slug}', 'BlogController@getKategori')->name('get_kategori_artikel');
Route::get('app/subscriber/insert', 'subscriberController@create')->name('get_insert_subscriber');
Route::post('app/subscriber/insert', 'subscriberController@store')->name('post_insert_subscriber');

Route::get('/error', function(){
	return view('errors.404');
});