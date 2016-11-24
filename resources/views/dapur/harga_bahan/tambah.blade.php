

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Tambah Harga Bahan</h4>
</div>
<form id="form_barang" role="form">
<div class="modal-body">
    
	{{ csrf_field() }}
	<div class="form-group">
		<label>Kode Bahan</label>
		<input type="text" id="kode_bahan" name="kode_bahan" placeholder="Input Kode Bahan" class="form-control">
	</div>
	<div class="form-group">
		<label>Bahan</label>
		<input type="text" id="id_bahan_input" name="id_barang" class="form-control">
	</div>
	<div class="form-group">
		<label>Keterangan</label>
		<textarea cols="6" id="keterangan" name="keterangan" placeholder="Masukan Keterangan" class="form-control"></textarea>
	</div>
		
	
</div>
<div class="modal-footer">
	<input type="submit" class="btn btn-primary" value="Simpan" class="form-control"></submit>
</div>
</form>
