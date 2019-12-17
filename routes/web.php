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
Route::view('/','index')->name('home');
Route::view('/seguridad','secure')->name('secure');

//Auth
Auth::routes();

//Admin
Route::get('/home', 'HomeController@index')->name('dashboard');

//Files
Route::get('archivos/{type}', 'FilesController@index');
Route::get('archivos/subir', 'FilesController@showFileForm');
Route::post('archivos/subir', 'FilesController@store');
Route::post('archivos/editar/{id}', 'FilesController@edit');
Route::post('archivos/aliminar/{id}', 'FilesController@destroy');
