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
Route::post('home/get_data_chart', 'HomeController@get_data_chart_penjualan');

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

//Menu Jenis Pengeluaran
Route::get('master_jenis_pengeluaran', 'MasterController@index_jenis_pengeluaran');
Route::post('jenis_pengeluaran/get_tabel', 'MasterController@get_tabel_jenis_pengeluaran');
Route::get('jenis_pengeluaran/tambah_dialog', 'MasterController@tambah_jenis_pengeluaran_dialog');
Route::get('jenis_pengeluaran/update_dialog/{id}', 'MasterController@update_jenis_pengeluaran_dialog');
Route::post('jenis_pengeluaran/tambah', 'MasterController@tambah_jenis_pengeluaran');
Route::post('jenis_pengeluaran/update', 'MasterController@update_jenis_pengeluaran');
Route::post('jenis_pengeluaran/hapus', 'MasterController@hapus_jenis_pengeluaran');


//Menu Jabatan
Route::get('index_jabatan', 'MasterController@index_jabatan');
Route::post('jabatan/get_data', 'MasterController@get_data_jabatan');
Route::get('jabatan/tambah_dialog', 'MasterController@tambah_jabatan_dialog');
Route::post('jabatan/tambah', 'MasterController@tambah_jabatan');
Route::get('jabatan/update_dialog/{id}', 'MasterController@update_jabatan_dialog');
Route::post('jabatan/update', 'MasterController@update_jabatan');
Route::post('jabatan/hapus', 'MasterController@hapus_jabatan');

//Menu Tunjangan Jabatan
Route::get('index_tunjangan_jabatan', 'MasterController@index_tunjangan');
Route::post('tunjangan/get_data', 'MasterController@get_data_table');
Route::get('tunjangan/tambah_dialog', 'MasterController@tambah_tunjangan_dialog');
Route::post('tunjangan/tambah', 'MasterController@tambah_tunjangan');
Route::get('tunjangan/update_dialog/{id}', 'MasterController@update_tunjangan_dialog');
Route::post('tunjangan/update', 'MasterController@update_tunjangan');
Route::post('tunjangan/hapus', 'MasterController@hapus_tunjangan');

/* ===================MODUL DAPUR & GUDANG====================== */
//menu daftar harga
Route::get('/daftar_harga', 'DapurGudangController@index_dh');
Route::post('dapur/get_daftar_harga', 'DapurGudangController@daftar_harga');
Route::post('dapur/list_bahan', 'DapurGudangController@list_bahan');
Route::post('dapur/list_satuan', 'DapurGudangController@list_satuan');
Route::post('daftar_harga/tambah', 'DapurGudangController@daftar_harga_tambah');
// Route::get('dapur/tambah_daftar_harga', 'DapurGudangController@daftar_harga_tambah_dialog');




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
Route::get('index_penjualan', 'TransaksiController@index_penjualan');
Route::get('penjualan/tambah_dialog', 'TransaksiController@tambah_penjualan_dialog');
Route::post('penjualan/get_data_penjualan', 'TransaksiController@data_penjualan');
Route::post('penjualan/get_data_barang', 'TransaksiController@get_data_barang');
Route::post('penjualan/get_harga_from_barang', 'TransaksiController@get_harga_from_barang');
Route::post('penjualan/tambah', 'TransaksiController@tambah_penjualan');
Route::post('penjualan/hapus', 'TransaksiController@hapus_penjualan');
Route::post('penjualan/get_tabel_detile_toko', 'TransaksiController@get_tabel_detile_toko');
Route::get('penjualan/lihat/{id}', 'TransaksiController@lihat_penjualan');
Route::post('penjualan/generate_nomor', 'TransaksiController@penjualan_generate_nomor');

//menu Pengeluaran
Route::get('pengeluaran', 'TransaksiController@index_pengeluaran');
Route::get('pengeluaran/tambah_dialog', 'TransaksiController@tambah_dialog_pengeluaran');
Route::post('pengeluaran/get_data', 'TransaksiController@list_pengeluaran');
Route::post('pengeluaran/list_satuan', 'TransaksiController@list_satuan_2');
Route::post('pengeluaran/tambah', 'TransaksiController@tambah_pengeluaran');

Route::post('pengeluaran/hapus', 'TransaksiController@hapus_pengeluaran');

Route::get('pengeluaran/view/{id}', 'TransaksiController@view_pengeluaran');

/* ================LAPORAN PENGELUARAN================== */
//Menu Pengeluaran
Route::get('index_pengeluaran', 'KeuanganController@index_pengeluaran');
Route::post('pengeluaran/get_data_harian', 'KeuanganController@get_data_harian');

//Menu Pemasukan
Route::get('index_pemasukan', 'KeuanganController@index_pemasukan');
Route::post('pemasukan/get_data_harian', 'KeuanganController@get_data_pemasukan_harian');