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
Route::get('donat/tambah_dialog', 'MasterController@tambah_donat_dialog');
Route::post('donat/tambah', 'MasterController@tambah_donat');
Route::post('donat/hapus_donat', 'MasterController@hapus_donat');
Route::get('donat/view/{id}', 'MasterController@detile_donat');


//Menu Harga Jual
Route::get('harga_jual', "MasterController@index_harga_jual");
Route::post('harga_jual/get_data', "MasterController@get_data_harga_jual");
Route::get('harga_jual/tambah_dialog', "MasterController@tambah_harga_jual_dialog");
Route::post('harga_jual/get_jenis', 'MasterController@harga_jual_get_jenis');
Route::post('harga_jual/tambah', 'MasterController@tambah_harga_jual');
Route::get('harga_jual/edit_dialog/{id}', 'MasterController@update_harga_jual_dialog');
Route::post('harga_jual/update', 'MasterController@update_harga_jual');


//Menu Komisi
Route::get('index_komisi', 'MasterController@index_komisi');
Route::get('komisi/tambah_dialog', 'MasterController@tambah_komisi_dialog');
Route::post('komisi/get_data_komisi', 'MasterController@get_data_komisi');
Route::post('komisi/tambah', 'MasterController@tambah_komisi');
Route::post('komisi/hapus', 'MasterController@hapus_komisi');
Route::get('komisi/update/{id}', 'MasterController@update_komisi_dialog');
Route::post('komisi/update', 'MasterController@update_komisi');


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


//menu Olah
Route::get('index_olah', 'DapurGudangController@index_olah');
Route::post('index_olah/get_data_olah', 'DapurGudangController@index_data_olah');
Route::post('index_olah/get_karyawan_by_toko', 'DapurGudangController@get_karyawan_toko');
Route::post('index_olah/generate_kode', 'DapurGudangController@generate_kode');
Route::post('olah/tambah', 'DapurGudangController@tambah_olah');
Route::get('index_olah/tambah_dialog', 'DapurGudangController@tambah_olah_dialog');
Route::get('olah/lihat/{id}', 'DapurGudangController@lihat_olah');


/* =======================MODUL JUAL BELI=========================== */
//menu jual
Route::get('index_penjualan', 'JualBeliController@index_penjualan');
Route::get('penjualan/tambah_dialog', 'JualBeliController@tambah_penjualan_dialog');
Route::post('penjualan/get_data_penjualan', 'JualBeliController@data_penjualan');
Route::post('penjualan/get_data_barang', 'JualBeliController@get_data_barang');
Route::post('penjualan/get_harga_from_barang', 'JualBeliController@get_harga_from_barang');
Route::post('penjualan/tambah', 'JualBeliController@tambah_penjualan');
Route::post('penjualan/hapus', 'JualBeliController@hapus_penjualan');
Route::post('penjualan/get_tabel_detile_toko', 'JualBeliController@get_tabel_detile_toko');
Route::get('penjualan/lihat/{id}', 'JualBeliController@lihat_penjualan');
Route::post('penjualan/generate_nomor', 'JualBeliController@penjualan_generate_nomor');



/* ================LAPORAN PENGELUARAN================== */
Route::get('index_pengeluaran', 'KeuanganController@index_pengeluaran');