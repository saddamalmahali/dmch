

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Tambah Data Toko</h4>
</div>
<form id="form_tambah_toko" role="form">
<div class="modal-body">
    
	{{ csrf_field() }}
	<div class="form-group">
		<label>Kode</label>
		<input type="text" id="kode_toko" name="kode" placeholder="Input Kode Toko" class="form-control">
	</div>
	<div class="form-group">
		<label>Nama</label>
		<input type="text" id="nama_toko" name="nama" placeholder="Input Nama Toko" class="form-control">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea name="alamat" rows="6" class="form-control" placeholder="Input Alamat"></textarea>
	</div>
	
	<div class="form-group">
		<label>Kecamatan</label>
		<input type="text" id="input_toko_kecamatan" name="kecamatan" class="form-control">
	</div>
		
	
</div>
<div class="modal-footer">
	<input type="submit" class="btn btn-primary" value="Simpan" class="form-control"></submit>
</div>
</form>
