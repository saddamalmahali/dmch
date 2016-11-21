$(function(){
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$(document).ready(function(){
		$('#form_barang').on('submit', function(e){
			e.preventDefault();
			$.ajax({
				url : 'barang/tambah',
				type : 'post',
				data : $(this).serialize(),

				success : function(data){
					console.log(data);
					showMessageSuccess(data);
					initTable();
				}
			})
		});
		initData();
	});

	// Barang API
	var initData = function(){
		initTable();
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