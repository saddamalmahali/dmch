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

//menu data toko
Route::get('data_toko', 'MasterController@index_toko');
Route::get('data_toko/tambah_dialog', 'MasterController@toko_tambah_dialog');
Route::get('data_toko/update_form/{id}', 'MasterController@toko_update_dialog');
Route::get('data_toko/hapus/{id}', 'MasterController@toko_hapus');
Route::post('data_toko/get_data_toko', 'MasterController@data_toko');
Route::post('data_toko/tambah', 'MasterController@data_toko_tambah');
Route::post('data_toko/update', 'MasterController@data_toko_update');

//menu jenis dan donat
Route::get('index_donat', 'MasterController@index_donat');
Route::post('donat/data_jenis', 'MasterController@data_jenis');
Route::post('donat/get_tabel_data_jenis', 'MasterController@tabel_data_jenis');
Route::post('donat/data_donat', 'MasterController@data_donat');
Route::post('donat/get_tabel_data_donat', 'MasterController@tabel_data_donat');
Route::get('donat/tambah_jenis_dialog', 'MasterController@tambah_jenis_dialog');
Route::post('donat/tambah_jenis', 'MasterController@tambah_jenis_donat');
Route::post('donat/update_jenis', 'MasterController@update_jenis_donat');
Route::post('donat/hapus_jenis', 'MasterController@hapus_jenis_donat');
Route::get('donat/update_jenis_dialog/{id}', 'MasterController@update_jenis_dialog');


/* ===================MODUL DAPUR & GUDANG====================== */
//menu daftar harga
Route::get('/daftar_harga', 'DapurGudangController@index_dh');
Route::post('dapur/get_daftar_harga', 'DapurGudangController@daftar_harga');
Route::post('dapur/list_bahan', 'DapurGudangController@list_bahan');
Route::post('dapur/list_satuan', 'DapurGudangController@list_satuan');
Route::post('daftar_harga/tambah', 'DapurGudangController@daftar_harga_tambah');
// Route::get('dapur/tambah_daftar_harga', 'DapurGudangController@daftar_harga_tambah_dialog');

//menu beli bahan
Route::get('beli_bahan', 'DapurGudangController@index_beli_bahan');
Route::get('beli_bahan/tambah_dialog', 'DapurGudangController@tambah_dialog_beli_bahan');
Route::post('beli_bahan/get_data', 'DapurGudangController@list_beli_bahan');
Route::post('beli_bahan/list_satuan', 'DapurGudangController@list_satuan_2');
Route::post('beli_bahan/tambah', 'DapurGudangController@tambah_beli_bahan');
Route::post('beli_bahan/hapus', 'DapurGudangController@hapus_beli_bahan');
Route::get('beli_bahan/view/{id}', 'DapurGudangController@view_beli_bahan');
