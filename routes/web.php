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

Route::get('/', 'FieldController@index');

Auth::routes();

Route::resource('file', 'FilesController');

Route::get('/home', 'HomesController@index')->name('home');
Route::post('/home/{home}', 'HomesController@update');
