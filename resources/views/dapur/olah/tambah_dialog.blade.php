<style type="text/css">
	.loading {
		border: 16px solid #f3f3f3; /* Light grey */
	    border-top: 16px solid blue;
		 border-bottom: 16px solid blue;
	    border-radius: 50%;
	    width: 120px;
	    height: 120px;
	    animation: spin 2s linear infinite;
	}

	@keyframes spin {
	    0% { transform: rotate(0deg); }
	    100% { transform: rotate(360deg); }
	}
</style>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Tambah Proses Olahan</h4>
</div>
<form id="form_tambah_olah_donat" role="form">
<div class="modal-body">

	{{ csrf_field() }}
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-body">
				<div class="col-md-6">
					<div class="form-group">
						<label>Kode</label>
						<input type="text" name="kode" class="form-control input_kode_generate_olah" placeholder="Input Kode Proses" readonly="true">
					</div>
					<div class="form-group">
						<label>Toko</label>
						<select id="input_select_toko" class="form-control" name="id_toko">
							<option value="">Pilih Toko</option>
							@forelse($data_toko as $toko)
							<option value="{{$toko->id}}">{{$toko->kode.' | '.$toko->nama}}</option>
							@empty

							@endforelse
						</select>
					</div>

					<div class="form-group">
						<label>Karyawan</label>
						<select id="input_id_karyawan" name="id_karyawan" class="form-control"></select>
					</div>

				</div>
				<div class="col-md-6">

					<div class="form-group">
						<label>Tanggal</label>
						<input type="date" name="tanggal" class="form-control" placeholder="Tanggal">
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="4"></textarea>
					</div>
				</div>
			</div>
		</div>

	</div>
	<div class="row">
			<div class="ibox">
				<div class="ibox-title">
					<h5>Data Detail Olah</h5>
					<div class="ibox-tools">

					</div>
				</div>
				<div class="ibox-content">
					<div class='page-header' style="vertical-align: middle;">
					  <div class='btn-toolbar pull-right'>
					    <div class='btn-group'>
					      <a class="btn btn-primary btn-sm pull-right" id="tambah_detile_olah"><i class="fa fa-plus"></i>&nbsp; Tambah Bahan</a>
					    </div>
					  </div>
					  <h2 >Detail Pembelian</h2>
					</div>
					<div class="table-responsive">
						<table class="table table-bordered" id="dynamic_detile_bahan">
							<thead>
								<tr>
									<th style="text-align: center;">Varian</th>
									<th width="20%" style="text-align: center;">Banyak</th>
									<th width="20%" style="text-align: center;">Opsi</th>
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
<div class="modal-footer">
	<input type="submit" class="btn btn-primary" value="Simpan" class="form-control"></submit>
</div>
</form>

<script type="text/javascript">

	$(document).ready(function(){
		var tabel_dynamic = $('table#dynamic_detile_bahan > tbody');
		var initSelectKaryawan = function(){
			$('select#input_id_karyawan').attr('disabled', true);
			$('select#input_id_karyawan').html('<option>Pilih Karyawan</option>');
		};

		initSelectKaryawan();
		var i =0;

		var hapusRowDynamic = function(obj){
			var id = obj.attr('id');
			$('table#dynamic_detile_bahan > tbody > tr#'+id).remove();
		};

		$('#tambah_detile_olah').click(function(){
			tabel_dynamic.append('<tr id="'+i+'">'+
														'<td valign="middle" align="center"><select class="form-control" name="detile['+i+'][id_varian]">@forelse($data_varian as $varian) <option value="{{$varian->id}}">{{"(".$varian->jenis->kode."|".$varian->jenis->nama.") | ".$varian->rasa}}</option>@empty @endforelse</select></td>'+
														'<td valign="middle" align="center" ><input class="form-control" name="detile['+i+'][jumlah]"></td>'+
														'<td valign="middle" align="center"><a class="btn btn-danger btn-circle btn_hapus_detile_olah" id="'+i+'"><i class="fa fa-close"></i></a></td>'+
													'</tr>');
			$('a.btn_hapus_detile_olah').on('click', function(e){
				e.preventDefault();
				hapusRowDynamic($(this));
			});
			i++;
		});

		$('select#input_select_toko').on('change', function(e){
			if($(this).val() != ""){
				$.ajax({
					url : 'index_olah/generate_kode',
					type : 'post',
					data : {id_toko : $(this).val()},
					dataType : 'json',
					success : function(data){
						console.log(data);
						$('.input_kode_generate_olah').val(data);
					}
				});
			}else{
				$('.input_kode_generate_olah').val('');
			}
			$('select#input_id_karyawan').html('<option>Loading...</option>');

			$.ajax({
				url : 'index_olah/get_karyawan_by_toko',
				type : 'post',
				data : {id_toko : $(this).val()},
				dataType : 'json',
				success : function(data){
					initSelectKaryawan();
					data.forEach(function (entry) {
	                    $('select#input_id_karyawan').append('<option value="'+entry.id+'">'+entry.nama_depan+' '+entry.nama_belakang+'</option>');


	                });

					// data.
					// for( var k in data){
					// 	$('select#input_id_karyawan').html('<option value="'+data[k].id+'">'+data[k].nama_depan+' '+data[k].nama_belakang+'</option>');
					// }
					$('select#input_id_karyawan').attr('disabled', false);
				}
			});

		});
	});
</script>
