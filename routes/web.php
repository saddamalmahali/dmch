<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

//module master
Route::get('/barang', 'MasterController@page_barang');
Route::post('/get_data_barang', 'MasterController@getDataBarang');
Route::post('barang/tambah', 'MasterController@addDataBarang');
Route::get('barang/tambah_dialog', 'MasterController@tambahDialog');
Route::get('barang/hapus/{id}', 'MasterController@hapus_barang');
Route::get('barang/update/{id}', 'MasterController@update_barang');
Route::post('barang/update', 'MasterController@post_update_barang');
