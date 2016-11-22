

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Tambah Barang</h4>
</div>
<form id="form_barang" role="form">
<div class="modal-body">
    
	{{ csrf_field() }}
	<div class="form-group">
		<label>Nama Barang</label>
		<input type="text" id="barang" name="barang" placeholder="Input Nama Barang" class="form-control">
	</div>
	<div class="form-group">
		<label>Jenis</label>
		<select class="form-control m-b" name="jenis" id="jenis">
			<option>Pilih Jenis</option>
			<option value="pokok">Pokok</option>
			<option value="pelengkap">Pelengkap</option>
		</select>
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
