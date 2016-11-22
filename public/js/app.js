$(function(){
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$(document).ready(function(){
		
		initData();
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
            data : {page : page, akun:$('#akunselect').val()},
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
    	var obj = $("div#barangContainerTable");
        getPosts(url, page, obj);
        e.preventDefault();
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
            toastr.success('Berhasil!', data.message);

        }, 1300);

	}
});