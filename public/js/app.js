$(function(){

	var elementBarang = $('div#barangContainerTable');
	var elementKaryawan = $('div#karyawanTableContainer');
	var elementSatuan = $('div#satuanContainerTable');
	var elementKonversi = $('div#konversiContainerTable');
	var elementHargaBahan = $('div#daftarHargaContainerTable');
	var elementDataToko = $('div#tokoContainerTable');
	var elementPengeluaran = $('div#pengeluaranContainerTable');
	var elementOlah = $('div#olahContainerTable');
	var elementHargaJual = $('div#hargaJualContainerTable');
	var elementPenjualan =$('div#penjualanTableContainer');
	var elementKomisi = $('div#komisiContainerTable');
	var elementJenisPengeluaran = $('div#jenisPengeluaranContainerTable');
	var elementJabatan = $('div#jabatanContainerTable');
	var elementTunjangan = $('div#tunjanganContainerTable');

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$(document).ready(function(){

		if(elementBarang.length){
			initData();
		}else if(elementKaryawan.length){
			initTabelKaryawan();
		}else if(elementSatuan.length){
			initTableSatuan();
		}else if(elementKonversi.length){
			initTabelKonversi();
		}else if(elementHargaBahan.length){
			initTabelDaftarHarga();
		}else if(elementDataToko.length){
			initTabelDataToko();
		}else if(elementPengeluaran.length){
			initTablePengeluaran();
		}else if(elementOlah.length){
			initTabelOlah();
		}else if(elementHargaJual.length){
			initTabelHargaJual();
		}else if(elementPenjualan.length){
			initTabelPenjualan();
		}else if(elementKomisi.length){
			initTableKomisi();
		}else if(elementJenisPengeluaran.length){
			initTabelJenisPengeluaran();
		}else if(elementJabatan.length){
			initTabelJabatan();
		}else if(elementTunjangan.length){
			initTabelTunjangan();
		}


	});


	$(document).on('submit', 'form#form_update_barang', function(e){
		e.preventDefault();
		$.ajax({
			url : 'barang/update',
			type : 'post',
			data : $(this).serialize(),
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTable();
				$('#modalBarang').modal('hide');
			},
		});
	});

	$(document).on('submit', 'form#form_barang', function(e){
		e.preventDefault();
		$.ajax({
			url : 'barang/tambah',
			type : 'post',
			data : $(this).serialize(),
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				kosongkanSemuaForm();
				initTable();
				$('#modalBarang').modal('hide');
			},
		});
	});

	function getPosts(url, page, obj) {
        $.ajax({
            url : url,
            type : 'post',
            data : {page : page},
            dataType: 'json',
        }).done(function (data) {
            obj.html(data);
        }).fail(function (xhr) {
            alert('Posts could not be loaded.'+xhr);
        });
    }
	// Barang API
	//



	$(document).on('click', '.pagination a', function (e) {
    	var page = $(this).attr('href').split('page=')[1];
    	var url = $(this).attr('href').split('page=')[0];
    	var obj = $("div#tableContainer");
        getPosts(url, page, obj);
        e.preventDefault();
    });

    $('body').on('hidden.bs.modal', '.modal', function () {
		$(this).removeData('bs.modal');
	});

    // $('#tambah_barang_btn').on('click', function(evt){
    // 	evt.preventDefault();
    // 	var btn = $(this);

    // 	var modal = $('#modalBarang');
    // 	var url = $(this).attr('href');
    // 	modal.find('.modal-title').html('Tambah Barang');
    // 	$.ajax({
    // 		url : url,
    // 		type : 'post',
    // 		dataType : 'html',
    // 		success : function(data){
    // 			modal.find('.modal-body').html(data);
    // 		}
    // 	});
    // 	modal.modal('show');
    // })
    //


	var initData = function(){
		initTable();
	}

	var kosongkanSemuaForm = function(){
		$('#barang').val('');
		$('#jenis').val('');
		$('#keterangan').val('');

	}

	var initTable = function(){
		$.ajax({
			url : 'get_data_barang',
			type : 'post',
			dataType : 'json',
			success : function(data){
				$("div#barangContainerTable").html(data);
			}
		});
	}

	var showMessageSuccess = function(data){
		setTimeout(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            };
            toastr.success(data.message, 'Berhasil!');

        }, 1300);

	}

	// Karyawan API

	$(document).on('submit', 'form#form_karyawan', function(e){
		e.preventDefault();
		console.log('form karyawan aksi');
		$.ajax({
			url : 'karyawan/tambah_karyawan',
			type : 'post',
			data : $(this).serialize(),
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTabelKaryawan();

				$('.modal').modal('hide');
			},
		});
	});

	$(document).on('submit', 'form#form_update_karyawan', function(e){
		e.preventDefault();
		console.log('form karyawan aksi');
		$.ajax({
			url : 'karyawan/update_karyawan',
			type : 'post',
			data : $(this).serialize(),
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTabelKaryawan();

				$('.modal').modal('hide');
			},
		});
	});

	var initTabelKaryawan = function(){
		$.ajax({
			url : 'karyawan/get_data_karyawan',
			type : 'post',
			dataType : 'json',
			success : function(data){
				$("div#karyawanTableContainer").html(data);
			}
		});
	};


	//Menu Satuan
	var initTableSatuan = function(){
		$.ajax({
			url : 'satuan/get_data_satuan',
			type : 'post',
			dataType : 'json',
			success : function(data){
				$("div#satuanContainerTable").html(data);
			}
		});
	}

	$(document).on('submit', 'form#form_satuan', function(e){
		e.preventDefault();
		$.ajax({
			url : 'satuan/tambah_satuan',
			type : 'post',
			data : $(this).serialize(),
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTableSatuan();

				$('.modal').modal('hide');
			},
		});
	});

	$(document).on('submit', 'form#form_satuan_update', function(e){
		e.preventDefault();
		$.ajax({
			url : 'satuan/update_satuan',
			type : 'post',
			data : $(this).serialize(),
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTableSatuan();

				$('.modal').modal('hide');
			},
		});
	});

	//menu konversi
	var initTabelKonversi = function(){
		$.ajax({
			url : 'konversi/get_data_konversi',
			type : 'post',
			dataType : 'json',
			success : function(data){
				$("div#konversiContainerTable").html(data);
			}
		});
	};

	$(document).on('submit', 'form#form_konversi', function(e){
		e.preventDefault();
		$.ajax({
			url : 'konversi/tambah',
			type : 'post',
			data : $(this).serialize(),
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTabelKonversi();

				$('.modal').modal('hide');
			},
		});
	});

	$(document).on('submit', 'form#form_update_konversi', function(e){
		e.preventDefault();
		$.ajax({
			url : 'konversi/update_konversi',
			type : 'post',
			data : $(this).serialize(),
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTabelKonversi();

				$('.modal').modal('hide');
			},
		});
	});

	//Menu Data Toko
	var initTabelDataToko = function(){
		$.ajax({
			url : 'data_toko/get_data_toko',
			type : 'post',
			dataType : 'json',
			success : function(data){
				$("div#tokoContainerTable").html(data);
			}
		});
	};

	$(document).on('submit', 'form#form_tambah_toko', function(e){
		e.preventDefault();
		$.ajax({
			url : 'data_toko/tambah',
			type : 'post',
			data : $(this).serialize(),
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTabelDataToko();

				$('.modal').modal('hide');
			},
		});
	});

	$(document).on('submit', 'form#form_update_toko', function(e){
		e.preventDefault();
		$.ajax({
			url : 'data_toko/update',
			type : 'post',
			data : $(this).serialize(),
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTabelDataToko();

				$('.modal').modal('hide');
			},
		});
	});

	//menu harga jual
	var initTabelHargaJual = function(){
		$.ajax({
			url : 'harga_jual/get_data',
			type : 'post',
			dataType : 'json',
			success : function(data){
				$("div#hargaJualContainerTable").html(data);
			}
		});
	};

	$(document).on('submit', 'form#form_tambah_harga_jual', function(e){
		e.preventDefault();
		// console.log('Submit Tambah Harga Jual');
		$.ajax({
			url : 'harga_jual/tambah',
			type : 'post',
			data : $(this).serialize(),
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTabelHargaJual();

				$('.modal').modal('hide');
			},
		});
	});
	$(document).on('submit', 'form#form_update_harga_jual', function(e){
		e.preventDefault();
		// console.log('Submit Tambah Harga Jual');
		$.ajax({
			url : 'harga_jual/update',
			type : 'post',
			data : $(this).serialize(),
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTabelHargaJual();

				$('.modal').modal('hide');
			},
		});
	});

	//end menu harga jual

	//Menu Komisi
	var initTableKomisi = function(){
		$.ajax({
			url : 'komisi/get_data_komisi',
			type : 'post',
			dataType : 'json',
			success : function(data){
				$('div#komisiContainerTable').html(data);
			}
		});
	}

	$(document).on('submit', 'form#form_tambah_komisi', function(e){
		e.preventDefault();
		$.ajax({
			url : 'komisi/tambah',
			type : 'post',
			data : $(this).serialize(),
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTableKomisi();

				$('.modal').modal('hide');
			}
		});
	});

	$(document).on('click','.btn_hapus_komisi', function(e){
		e.preventDefault();
		// console.log('Hapus Data : '+$(this).attr('id'));
		if(confirm('Apakah Anda Yakin Akan Menghapus?')){
			$.ajax({
				url : 'komisi/hapus',
				type : 'post',
				data : {id : $(this).attr('id')},
				dataType : 'json',
				success : function(data){
					showMessageSuccess(data);
					initTableKomisi();
				}
			});
		}
	});

	$(document).on('submit', 'form#form_update_komisi', function(e){
		e.preventDefault();
		$.ajax({
			url : 'komisi/update',
			type : 'post',
			data : $(this).serialize(),
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTableKomisi();

				$('.modal').modal('hide');
			}
		});
	});
	//End Of Menu Komisi

	//Menu Jenis Pengeluaran 

	var initTabelJenisPengeluaran = function(){
		$.ajax({
			url : 'jenis_pengeluaran/get_tabel',
			type : 'post',
			dataType : 'json',
			success : function(data){
				$("div#jenisPengeluaranContainerTable").html(data);
			}
		});
	}

	$(document).on('submit', 'form#form_tambah_jenis_pengeluaran', function(e){
		e.preventDefault();
		$.ajax({
			url : 'jenis_pengeluaran/tambah',
			type : 'post',
			data : $(this).serialize(), 
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTabelJenisPengeluaran();

				$('.modal').modal('hide');
			}
		});
		console.log('Form Jenis Pengeluaran Submit');
	});

	$(document).on('submit', 'form#form_update_jenis_pengeluaran', function(e){
		e.preventDefault();
		$.ajax({
			url : 'jenis_pengeluaran/update',
			type : 'post',
			data : $(this).serialize(), 
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTabelJenisPengeluaran();

				$('.modal').modal('hide');
			}
		});
		console.log('Form Jenis Pengeluaran Submit');
	});

	$(document).on('click', 'a.btn-hapus-jenis-pengeluaran', function(e){
		e.preventDefault();
		if(confirm('Apakah Anda Yakin akan menghapus data ?')){
			$.ajax({
				url : 'jenis_pengeluaran/hapus',
				type : 'post',
				data : {id : $(this).attr('id') }, 
				dataType : 'json',
				success : function(data){
					showMessageSuccess(data);
					initTabelJenisPengeluaran();
				}
			});
		}
	});

	//end of menu jenis pengeluaran

	//Menu Jabatan 
	var initTabelJabatan = function(){
		$.ajax({
			url : 'jabatan/get_data',
			type : 'post',
			dataType : 'json',
			success : function(data){
				elementJabatan.html(data);
			}
		});
	};

	$(document).on('submit', 'form#form_tambah_jabatan', function(e){
		e.preventDefault();
		$.ajax({
			url : 'jabatan/tambah',
			type : 'post',
			data : $(this).serialize(),
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTabelJabatan();

				$('.modal').modal('hide');
			}
		});
	});

	$(document).on('submit', 'form#form_update_jabatan', function(e){
		e.preventDefault();
		$.ajax({
			url : 'jabatan/update',
			type : 'post',
			data : $(this).serialize(),
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTabelJabatan();

				$('.modal').modal('hide');
			}
		});	
	});

	$(document).on('click', 'a.btn-hapus-jabatan', function(e){
		e.preventDefault();
		if(confirm('Apakah anda yakin akan menghapus data?')){
			var id = $(this).prop('id');
			$.ajax({
				url : 'jabatan/hapus',
				type : 'post',
				data : {id : id},
				dataType : 'json',
				success : function(data){
					showMessageSuccess(data);
					initTabelJabatan();
				}
			});
		}
	});

	//End of Menu Jabatan
	//Menu Tunjangan Jabtan

	var initTabelTunjangan = function(){
		$.ajax({
			url : 'tunjangan/get_data',
			type : 'post',
			dataType : 'json',
			success : function(data){
				elementTunjangan.html(data);
			}
		});
	};

	$(document).on('submit', 'form#form_tambah_tunjangan', function(e){
		e.preventDefault();
		$.ajax({
			url : 'tunjangan/tambah',
			type : 'post',
			data : $(this).serialize(), 
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTabelTunjangan();

				$('.modal').modal('hide');
			}
		});	
	});

	$(document).on('submit', 'form#form_update_tunjangan', function(e){
		e.preventDefault();
		$.ajax({
			url : 'tunjangan/update',
			type : 'post',
			data : $(this).serialize(), 
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTabelTunjangan();

				$('.modal').modal('hide');
			}
		});
	});

	$(document).on('click', 'a.btn-hapus-tunjangan', function(e){
		e.preventDefault();

		if(confirm('Apakah Anda yakin akan menghapus data Tunjangan?')){
			var id = $(this).prop('id');
			$.ajax({
				url : 'tunjangan/hapus',
				type : 'post',
				data : {id : id}, 
				dataType : 'json',
				success : function(data){
					showMessageSuccess(data);
					initTabelTunjangan();
				}
			});
		}
	});

	//End of menu tunjangan jabatan
	/* MODUL DAPUR & GUDANG */
	//Menu Daftar Harga Barang
	var initTabelDaftarHarga = function(){
		$.ajax({
			url : 'dapur/get_daftar_harga',
			type : 'post',
			dataType : 'json',
			success : function(data){
				$("div#daftarHargaContainerTable").html(data);
			}
		});
	};

	$(document).on('submit', 'form#form_harga_barang', function(e){
		e.preventDefault();
		$.ajax({
			url : 'daftar_harga/tambah',
			type : 'post',
			data : {
						_token : $('input[name=_token]').val(),
						kode : $('input#kode_bahan').val(),
						id_barang : $('input#id_bahan_input').attr('value'),
						id_satuan : $('input#id_satuan_input').attr('value'),
						harga : $('input#harga_bahan_input').val(),
						keterangan : $('#keterangan_dapur_input').val()
					},
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTabelDaftarHarga();

				$('.modal').modal('hide');
			}
		});
	});

	// Menu Pengeluaran
	var initTablePengeluaran = function(){
		$.ajax({
			url : 'pengeluaran/get_data',
			type : 'post',
			dataType : 'json',
			success : function(data){
				$('div#pengeluaranContainerTable').html(data);
			}
		});
	}

	var dataPengeluaranByFilter = function(data){
		$.ajax({
			url : 'pengeluaran/get_data',
			type : 'post',
			data : data,
			dataType : 'json',
			success : function(data){
				$('div#pengeluaranContainerTable').html(data);
			}
		});
	}

	$(document).on('submit', 'form#form_filter_index_pengeluaran', function(e){
		e.preventDefault();
		var data = $(this).serialize();
		dataPengeluaranByFilter(data);
	});

	$(document).on('submit', 'form#form_tambah_pengeluaran', function(e){
		e.preventDefault();
		var id_toko = $('select#input_id_toko_pengeluaran').val();
		var kode = $('input#input_kode_pengeluaran').val();
		var id_jenis = $('select#input_id_jenis_pengeluaran').val();
		
		var detile_pengeluaran = $('form#form_tambah_pengeluaran').serializeArray();

		
		var file = document.getElementById('input_file_foto');
		
		var data_file = file.files[0];
		var formData = new FormData();

		formData.append("file_foto", data_file);

		// var xhr = new XMLHttpRequest;
		// xhr.open('POST', 'pengeluaran/upload', true);
		// xhr.send(data);
		// jQuery.each(data_file, function(i, file) {
		// 	formData.append('file['+i+']', file);
		// });
		$.each(detile_pengeluaran, function(index, value){
			
			formData.append(value.name, value.value);
		});
		// console.log(formData.get('data'));
		var tanggal = $('input#input_tanggal_pengeluaran').val();
		var keterangan = $('textarea#input_keterangan_pengeluaran').val();
		var jenis_pembayaran =$('input[name=jenis_pembayaran]:checked').val();

		// formData.append('id_toko',id_toko);
		// formData.append('id_jenis',id_jenis);
		// formData.append('jenis_pembayaran',jenis_pembayaran);
		// formData.append('kode',kode);
		// formData.append('tanggal',tanggal);
		// formData.append('keterangan',keterangan);

		$.ajax({
			url: 'pengeluaran/tambah',
    		data: formData,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			dataType : 'json',
			success: function(data){
				showMessageSuccess(data);
				initTablePengeluaran();
				
				$('.modal').modal('hide');
			}
		});
		//console.log(data_file);
	});

	$(document).on('click', 'a#btn_reset_form_filter_pengeluaran', function(e){
		e.preventDefault();
		initTablePengeluaran();
	});

	$(document).on('click', 'a.btn_pengeluaran_hapus', function(e){
		e.preventDefault();
		if(confirm('Apakah Yakin Akan Menghapus Data?')){
			var id_beli = $(this).attr('id');
			$.ajax({
				url : 'pengeluaran/hapus',
				type : 'post',
				data : {id : id_beli},
				dataType : 'json',
				success : function(data){
					showMessageSuccess(data);
					initTablePengeluaran();
				}
			});
		}
	});

	//Menu Donat
	$(document).on('submit', 'form#form_jenis_donat', function(e){
		e.preventDefault();
		$.ajax({
			url : 'donat/tambah_jenis',
			type : 'post',
			data : $(this).serialize(),
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTableJenisDonat();

				$('.modal').modal('hide');
			}
		});
	});

	$(document).on('submit', 'form#form_update_jenis_donat', function(e){
		e.preventDefault();
		$.ajax({
			url : 'donat/update_jenis',
			type : 'post',
			data : $(this).serialize(),
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTableJenisDonat();

				$('.modal').modal('hide');
			}
		});
	});

	$(document).on('click', 'a.btn_hapus_data_jenis', function(e){
		e.preventDefault();
		if(confirm('Apakah anda Yakin akan menghapus data ?')){
			$.ajax({
				url : 'donat/hapus_jenis',
				type : 'post',
				data : {id : $(this).attr('id')},
				dataType : 'json',
				success : function(data){
					showMessageSuccess(data);
					initTableJenisDonat();
				}
			});
		}
	});

	$(document).on('submit', 'form#form_tambah_donat', function(e){
		e.preventDefault();
		$.ajax({
			url : 'donat/tambah',
			type : 'post',
			data : $(this).serialize(),
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTableDonat();

				$('.modal').modal('hide');
			}
		});
	});

	$(document).on('click', 'a.btn_hapus_donat', function(e){
		e.preventDefault();

		if(confirm('Apakah yakin akan menghapus data ?')){
			$.ajax({
				url : 'donat/hapus_donat',
				type : 'post',
				data : {id_donat : $(this).attr('id')},
				dataType : 'json',
				success : function(data){
					showMessageSuccess(data);
					initTableDonat();

					// $('.modal').modal('hide');
				},
				error : function(e){
					console.log('error dalam proses penghapusan : '+e);
				}
			});
		}
	});

	//Menu Olah

	var initTabelOlah = function(){
		$.ajax({
			url : 'index_olah/get_data_olah',
			type : 'post',
			dataType : 'json',
			success : function(data){
				$('div#olahContainerTable').html(data);
			}
		});
	};

	$(document).on('submit', 'form#form_filter_olah', function(e){
		e.preventDefault();
		$.ajax({
			url : 'index_olah/get_data_olah',
			type : 'post',
			dataType : 'json',
			data : $(this).serialize(),
			success : function(data){
				$('div#olahContainerTable').html(data);
				//console.log(data);
			}
		});
	});

	$(document).on('submit','form#form_tambah_olah_donat',  function(e){
		e.preventDefault();
		$.ajax({
			url : 'olah/tambah',
			type : 'post',
			data : $(this).serialize(),
			dataType : 'json',
			success: function(data){
				console.log(data);
			}
		});
	});

	$(document).on('click', 'a.btn_hapus_olah', function(e){
		e.preventDefault();
		console.log('Tombol Hapus di click : '+$(this).attr('id'));
	});


	/* MODUL PENJUALAN */

	var initTabelPenjualan = function(){
		$.ajax({
			url : 'penjualan/get_data_penjualan',
			type : 'post',
			dataType : 'json',
			success : function(data){
				$('div#penjualanTableContainer').html(data);
			}
		});
	}

	$(document).on('submit', 'form#form_filter_penjualan', function(e){
		e.preventDefault();
		console.log($(this).serialize());
		$.ajax({
			url : 'penjualan/get_data_penjualan',
			type : 'post',
			data : $(this).serialize(),
			dataType : 'json',
			success : function(data){
				//console.log(data);
				$('div#penjualanTableContainer').html(data);
			}
		});
	});	

	

	$(document).on('submit', 'form#form_penjualan_tambah', function(e){
		e.preventDefault();
		$.ajax({
			url : 'penjualan/tambah',
			type : 'post',
			data : $(this).serialize(),
			dataType : 'json',
			success : function(data){
				showMessageSuccess(data);
				initTabelPenjualan();

				$('.modal').modal('hide');
			}
		});
	});

	$(document).on('click', 'a.btn_penjualan_hapus', function(e){
		e.preventDefault();
		// console.log('Btn Hapus dipilih')
		
		if(confirm('Yakin, Akan Menghapus Data?')){
			$.ajax({
				url : 'penjualan/hapus',
				type : 'post',
				data : {id : $(this).attr('id')},
				dataType : 'json',
				success : function(data){
					showMessageSuccess(data);
					initTabelPenjualan();

					// $('.modal').modal('hide');
				}
			});
		}
	});



});
