

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Tambah Data Jabatan</h4>
</div>
<form id="form_tambah_jabatan" role="form">
<div class="modal-body">
    
	{{ csrf_field() }}
	<div class="form-group">
		<label>Kode Jabatan</label>
		<input type="text" id="input_kode_jabatan" name="kode" placeholder="Input Kode Jabatan" class="form-control" value="{{$kode_jabatan}}" readonly='true'>
	</div>
	<div class="form-group">
		<label>Jenis</label>
		<input type="text" id="input_nama_jabatan" name="nama" placeholder="Input Nama Jabatan" class="form-control">
	</div>
	<div class="form-group">
		<label>Keterangan</label>
		<textarea cols="6" id="input_keterangan_jabatan" name="keterangan" placeholder="Masukan Keterangan" class="form-control"></textarea>
	</div>
		
	
</div>
<div class="modal-footer">
	<input type="submit" class="btn btn-primary" value="Simpan" class="form-control"></submit>
</div>
</form>
