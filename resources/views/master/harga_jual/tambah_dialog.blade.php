

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Tambah Harga Jual</h4>
</div>
<form id="form_tambah_harga_jual" role="form">
<div class="modal-body">
    
	{{ csrf_field() }}
	<div class="form-group">
		<label>Kategori Bahan</label>
		<select id="input_kategori_harga_jual" name="id_kategori" class="form-control">
			<option value="">Pilih Jenis Harga Jual</option>
			<option value="pokok">Barang - Barang Pokok</option>
			<option value="umum"> Barang - Barang Umum</option>
		</select>
	</div>
	<div class="form-group">
		<label>Jenis Barang</label>
		<select id="input_jenis_harga_jual" name="id_jenis" class="form-control">
			<option value="">Pilih Jenis Harga Jual</option>
		
		</select>
	</div>
	<div class="form-group">
		<label>Satuan</label>
		<select class="form-control m-b" name="satuan" id="input_satuan_harga_jual">
			<option value="">Pilih Jenis Satuan</option>
			@forelse($data_satuan as $satuan)
			<option value="{{$satuan->id}}">{{$satuan->nama.' ('.$satuan->alias.')'}}</option>
			@empty
			@endforelse
		</select>
	</div>
	<div class="form-group">
		<label>Harga</label>
		<input type="number" name="harga" id='input_harga_harga_jual' class="form-control">
	</div>
		
	
</div>
<div class="modal-footer">
	<input type="submit" class="btn btn-primary" value="Simpan" class="form-control">
</div>
</form>

<script type="text/javascript">
	

	$(document).ready(function(){

		var selectJenisBarang = $('select#input_jenis_harga_jual');
		var resetJenisBarang = function(){
			$('#input_jenis_harga_jual').find('option').remove();
			selectJenisBarang.attr('disabled', true);

		};

		resetJenisBarang();
		$('select#input_kategori_harga_jual').on('change', function(){
			resetJenisBarang();
			selectJenisBarang.append('<option>Loading...</option>')
			$.ajax({
				url : 'harga_jual/get_jenis',
				type : 'post',
				data : {id_kategori : $(this).val()},
				dataType : 'json',
				success : function(data){
					if(data != null){
						console.log('data isi');
						resetJenisBarang();
						selectJenisBarang.attr('disabled', false);
						$.each(data, function(key, value){
							selectJenisBarang.append("<option value='"+value.id+"'>"+value.nama+"</option")
						});
					}

					if(data == null){
						resetJenisBarang();
					}
				}
			});
		});
	});
</script>
