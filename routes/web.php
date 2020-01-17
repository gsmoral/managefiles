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

// Frontend
//Route::view('/','index')->name('home');
Route::get('/','SubscriptionController@index')->name('home');
Route::post('/','SubscriptionController@store')->name('subscription.store');
Route::view('/seguridad','secure')->name('secure');

//Auth
Auth::routes();

//Admin
Route::get('/home', 'HomeController@index')->name('dashboard');

//Files
Route::get('archivos/subir', 'FilesController@create')->name('file.create');

Route::get('archivos/imagenes', 'FilesController@images')->name('file.images');
Route::get('archivos/videos', 'FilesController@videos')->name('file.videos');
Route::get('archivos/audios', 'FilesController@audios')->name('file.audios');
Route::get('archivos/documentos', 'FilesController@documents')->name('file.documents');
Route::post('archivos/subir', 'FilesController@store')->name('file.store');
//Route::post('archivos/editar/{id}', 'FilesController@edit');
Route::patch('archivos/eliminar/{id}', 'FilesController@destroy')->name('file.destroy');

//Roles
Route::get('roles', 'Admin\RolesController@index')->name('role.index');
Route::get('roles/agregar', 'Admin\RolesController@create')->name('role.create');
Route::patch('roles/agregar', 'Admin\RolesController@store')->name('role.store');
Route::get('roles/{id}/editar', 'Admin\RolesController@edit')->name('role.edit');
Route::get('roles/{id}/', 'Admin\RolesController@show')->name('role.show');
Route::patch('roles/{id}/editar', 'Admin\RolesController@update')->name('role.update');
Route::patch('roles/{id}/eliminar', 'Admin\RolesController@destroy')->name('role.destroy');

//Permissions
Route::get('permisos', 'Admin\PermissionsController@index')->name('permission.index');
Route::get('permisos/agregar', 'Admin\PermissionsController@create')->name('permission.create');
Route::patch('permisos/agregar', 'Admin\PermissionsController@store')->name('permission.store');
Route::get('permisos/{id}/editar', 'Admin\PermissionsController@edit')->name('permission.edit');
Route::patch('permisos/{id}/editar', 'Admin\PermissionsController@update')->name('permission.update');
Route::patch('permisos/{id}/eliminar', 'Admin\PermissionsController@destroy')->name('permission.destroy');

//Users
Route::get('usuarios', 'Admin\UsersController@index')->name('user.index');
Route::get('usuarios/agregar', 'Admin\UsersController@create')->name('user.create');
Route::patch('usuarios/agregar', 'Admin\UsersController@store')->name('user.store');
Route::get('usuarios/{id}/editar', 'Admin\UsersController@edit')->name('user.edit');
Route::get('usuarios/{id}/', 'Admin\UsersController@show')->name('user.show');
Route::patch('usuarios/{id}/editar', 'Admin\UsersController@update')->name('user.update');
Route::patch('usuarios/{id}/eliminar', 'Admin\UsersController@destroy')->name('user.destroy');
