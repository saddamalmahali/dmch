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

/* Modul Master */

//menu barang
Route::get('/barang', 'MasterController@page_barang');
Route::post('/get_data_barang', 'MasterController@getDataBarang');
Route::post('barang/tambah', 'MasterController@addDataBarang');
Route::get('barang/tambah_dialog', 'MasterController@tambahDialog');
Route::get('barang/hapus/{id}', 'MasterController@hapus_barang');
Route::get('barang/update/{id}', 'MasterController@update_barang');
Route::post('barang/update', 'MasterController@post_update_barang');

//menu karyawan
Route::get('/index_karyawan', 'MasterController@index_karyawan');
Route::get('/karyawan/tambah', 'MasterController@tambah_karyawan');
Route::post('/karyawan/tambah_karyawan', 'MasterController@karyawan_add');
Route::post('/karyawan/get_data_karyawan', 'MasterController@get_data');
Route::get('/karyawan/update_form/{id}', 'MasterController@update_karyawan_form');
Route::get('/karyawan/hapus/{id}', 'MasterController@hapus_karyawan');
Route::post('/karyawan/update_karyawan', 'MasterController@karyawan_update');

//menu satuan
Route::get('/index_satuan', 'MasterController@index_satuan');
Route::post('/satuan/get_data_satuan', 'MasterController@get_list_satuan');
Route::get('/satuan/tambah', 'MasterController@tambah_satuan_dialog');
Route::get('/satuan/update_dialog/{id}', 'MasterController@update_satuan_dialog');
Route::post('/satuan/tambah_satuan', 'MasterController@tambah_satuan');
Route::post('/satuan/update_satuan', 'MasterController@update_satuan');
Route::get('/satuan/delete/{id}', 'MasterController@delete_satuan');

//menu konversi

Route::get('/index_konversi', 'MasterController@index_konversi');
Route::post('konversi/get_data_konversi', 'MasterController@data_konversi');
Route::get('konversi/tambah_dialog', 'MasterController@tambah_konversi_dialog');
Route::get('konversi/update/{id}', 'MasterController@update_konversi_dialog');
Route::post('konversi/tambah', 'MasterController@tambah_konversi');
Route::post('konversi/update_konversi', 'MasterController@update_konversi');
Route::get('konversi/hapus/{id}', 'MasterController@hapus_konversi');


/* ===================MODUL DAPUR & GUDANG====================== */
Route::get('/daftar_harga', 'DapurGudangController@index_dh');
Route::post('dapur/get_daftar_harga', 'DapurGudangController@daftar_harga');
Route::post('dapur/list_bahan', 'DapurGudangController@list_bahan');
Route::get('dapur/tambah_daftar_harga', 'DapurGudangController@daftar_harga_tambah_dialog');