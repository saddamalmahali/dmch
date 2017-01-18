<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Tambah Penjualan</h4>
</div>
<form id="form_penjualan_tambah" role="form">
<div class="modal-body">
    
	{{ csrf_field() }}
	<div class="row">
		<div class="wrapper-content">
			<div class="col-md-4">
				<div class="ibox-content">
						<div class="form-group">
							<label>Toko</label>
							<select name="id_toko" class="form-control" id='select_id_toko'>
								<option value="">Pilih Toko</option>
								@forelse($data_toko as $toko)
								<option value="{{$toko->id}}">{{$toko->kode.' | '.$toko->nama}}</option>
								@empty

								@endforelse
							</select>
						</div>

						<div class="form-group">
							<label>Tanggal</label>
							<input type="date" name="tanggal_penjualan" class="form-control">
						</div>
				</div>			
			</div>
			<div class="col-md-8">
				<div class="ibox-content">
					<div class="form-group">
						<label>Nomor Penjualan</label>
						<input type='text' name='kode_penjualan' id="input_kode_penjualan" class='form-control' readonly="true">
					</div>
					<div class="tabel_detile_toko">
					
					</div>
					
				</div>
			</div>
		</div>
		
	</div>
	<div class="row">
		<div class="wrapper-content">
			<div class="col-md-12">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h2 class="panel-title">
							Data Detile Penjualan
							<a class="pull-right btn-tambah-detile"><i class="fa fa-plus"></i></a>
						</h2>

					</div>
					<div class="panel-body">
							<table class="table table-primary" id="form_dynamic">
								<thead>
									<tr>
										<th style="text-align: center; width: 22%;">Jenis</th>
										<th style="text-align: center; width: 25%">Barang</th>
										<th style="text-align: center; width: 18%">Kuantitas</th>
										<th style="text-align: center;">Banyak</th>
										<th style="text-align: center; width: 25%">Total</th>
									</tr>
								</thead>
								<tbody>
									
								</tbody>
							</table>	
						
					</div>
				</div>
			</div>
		</div>
	</div>
		
	
</div>
<div class="modal-footer">
	<input type="submit" class="btn btn-primary" value="Simpan" class="form-control"></submit>
</div>
</form>

<script type="text/javascript">
$(function(){
	var form_detile = $('table#form_dynamic tbody');
	var jenis_pilih = '';
	var resetData = function(){
		form_detile.removeData();
	};

	var clearSelect = function(obj){
		obj.find('option').remove();
		obj.append('<option value="" disabled selected>Pilih Barang</option>');
	}

	var clearSatuan = function(obj){
		obj.find('option').remove();
		obj.append('<option value="" disabled selected>Pilih Satuan</option>');
	}

	var resetInputSatuan = function(obj){
		obj.attr('disabled', true);
	}

	var resetInputBanyak = function(obj){
		obj.val('');
		obj.attr('disabled', true);
	}

	var loadDataInputBarang = function(obj){
		var id_barang = obj.attr('id');
		var inputBanyak = $('.input_banyak_'+id_barang);
		var inputJumlah = $('.input_jumlah_'+id_barang);
		var inputSatuan = $('.input_id_satuan_'+id_barang);
		var objBarang = $('.input_barang_'+obj.attr('id'));




		jenis_pilih = obj.val();
		var id_jenis = obj.attr('id');
		clearSelect(objBarang);
		clearSatuan(inputSatuan);
		
		objBarang.append('<option>Loading...</option>');
		console.log('Data Object :'+obj.val());
		$.ajax({
			url :"penjualan/get_data_barang",
			type : 'post',
			data : {jenis : obj.val()},
			dataType : 'json',
			success : function(data_hasil){
				if(data_hasil != ''){
					clearSelect(objBarang);
					clearSatuan(inputSatuan);

					var data = data_hasil.data;
					objBarang.attr('disabled', false);
					$.each(data, function(index, value){
						objBarang.append('<option value="'+value.id+'">'+value.nama+'</option>');
					});
					
					var satuan = data_hasil.satuan;

					$.each(satuan, function(index, value){
						inputSatuan.append('<option value="'+value.id+'">'+value.alias+'</option>');
					});

					objBarang.trigger("chosen:updated");
				}else{
					clearSelect(objBarang);
					objBarang.find('option').remove();
					objBarang.append('<option value="">Tidak Ada Data</option>');
					//objBarang.attr('disabled', true);
					resetInputSatuan(inputSatuan);
					resetInputBanyak(inputBanyak);
					inputJumlah.val('');
				}
				

			}
		});
		
	};

	var actionChangeBarang = function(obj){
		var id_barang = obj.attr('id');
		var inputBanyak = $('.input_banyak_'+id_barang);
		var inputJumlah = $('.input_jumlah_'+id_barang);
		var inputSatuan = $('.input_id_satuan_'+id_barang);

		//Reset input
		resetInputSatuan(inputSatuan);

		inputBanyak.attr('disabled', false);
		// console.log(obj.val());
		if(obj.val() != ''){
			//console.log('disabled false');
			inputSatuan.attr('disabled', false);

			inputSatuan.change(function(evt){
				// evt.preventDefault();
				var nilai_satuan = $(this).val();
				inputBanyak.attr('disabled', false);
				inputBanyak.val('');
				inputJumlah.val('');
				inputBanyak.keyup(function(ev){
					ev.preventDefault();
					var nilai = $(this).val();

					$.ajax({
						url : 'penjualan/get_harga_from_barang',
						type : 'post',
						data : {jenis_id : jenis_pilih, id_barang : obj.val(), id_satuan : nilai_satuan },
						dataType : 'json',
						success : function(data){
							if(data!=null){
								var harga = nilai*data.harga;

								inputJumlah.val(harga);
							}else{
								var harga = nilai*0;

								inputJumlah.val(0);
							}
						}
					});
				});
			});
			
		}else{
			inputSatuan.attr('disabled', true);
			inputBanyak.val('');
			inputJumlah.val('');
			inputBanyak.attr('disabled', true);
		}

	};

	$(document).ready(function(){
		var i = 0;

		$('.btn-tambah-detile').click(function(event){
			event.preventDefault();
			
			form_detile.append(
								"<tr>"+
									"<td>"+
										"<select name='detile["+i+"][jenis]' id='"+i+"' class='form-control input_jenis_"+i+" chosen-select' style='width:350px;' tabindex='2'>"+
										"<option value=''>Pilih</option>"+
										"<option value='pokok'>Pokok</option>"+
										"<option value='umum'>Umum</option>"
										+"</select>"
									+"</td>"+	
									"<td>"+
										"<select data-placeholder='Pilih Barang' id='"+i+"' name='detile["+i+"][input_barang]' class='form-control input_barang_"+i+" chosen-select' style='width:350px;' tabindex='2' >"+

										"</select>"
									+"</td>"+
									"<td>"+
									"<select name='detile["+i+"][id_satuan]' id='"+i+"' class='form-control input_id_satuan_"+i+"' disabled >"+
									"<option value='' disabled selected>Pilih Satuan</option>"+
									@forelse($data_satuan as $satuan)
									"<option value='{{$satuan->id}}'>{{$satuan->alias}}</option>"+
									@empty
									@endforelse
									+"</select>"+
									"</td>"+	
									"<td><input type='text' class='form-control input_banyak_"+i+"' name='detile["+i+"][banyak]'  disabled></input></td>"+
										
									"<td><input type='number' class='form-control input_jumlah_"+i+"' name='detile["+i+"][jumlah]' readonly></input></td>"+	
								"</tr>"
							);
			$("select.input_barang_"+i+"").chosen({width : '100%'});
			$("select.input_jenis_"+i+"").chosen({width : '100%'});
			$(document).on('change','select.input_jenis_'+i, function(e){
				// e.preventDefault();
				loadDataInputBarang($(this));
				
			});

			

			$(document).on('change', ".input_barang_"+i+"", function(e){
				// e.preventDefault();
				actionChangeBarang($(this));
			});

			
			i++;
		});

		
	});

	$(document).on('change', '#select_id_toko', function(e){
		e.preventDefault();
		//console.log('Toko Dipilih : '+$(this).val());
		$.ajax({
			url : 'penjualan/generate_nomor',
			type : 'post',
			data : {id_toko : $(this).val()},
			success : function(data){
				$('#input_kode_penjualan').val(data);
			}
		});
		$.ajax({
			url : 'penjualan/get_tabel_detile_toko',
			type : 'post',
			data : {id_toko : $(this).val()},
			dataType : 'json',
			success : function(data){
				$('.tabel_detile_toko').html(data);
			}
		});
	});
});
	
</script>