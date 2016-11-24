$(function(){

	var elementBarang = $('div#barangContainerTable');
	var elementKaryawan = $('div#karyawanTableContainer');
	var elementSatuan = $('div#satuanContainerTable');
	var elementKonversi = $('div#konversiContainerTable');
	var elementHargaBahan = $('div#daftarHargaContainerTable');
	var elementDataToko = $('div#tokoContainerTable');


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
		}
		
		$('input#id_bahan_input').autocomplete({
			source : function(request, response){
				$.ajax({
					url : 'dapur/list_bahan',
					method : 'post',
					datatype : 'jsonp',
					data : {term : request.term},
					success : function(data){
						var parsed = JSON.parse(data);
		                var newArray = new Array(parsed.length);
		                var i = 0;

		                parsed.forEach(function (entry) {
		                    var newObject = {
		                    	id : entry.id,
		                        label: entry.id+' | '+entry.nama
		                    };
		                    newArray[i] = newObject;
		                    i++;
		                });

		                response(newArray);
					}

				});
			},
		});
		
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

	
});