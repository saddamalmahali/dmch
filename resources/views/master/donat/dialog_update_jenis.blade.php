

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Tambah Barang</h4>
</div>
<form id="form_update_jenis_donat" role="form">
<div class="modal-body">
    
	{{ csrf_field() }}
	<input type="hidden" name="id" value="{{$jenis_donat->id}}">
	<div class="form-group">
		<label>Kode Jenis Donat</label>
		<input type="text" id="input_kode_jenis" name="kode" placeholder="Input Kode Jenis" class="form-control" readonly="true" value="{{$jenis_donat->kode}}">
	</div>
	<div class="form-group">
		<label>Nama Jenis</label>
		<input type="text" id="input_nama_jenis" name="nama" placeholder="Input Nama Jenis" class="form-control" value="{{$jenis_donat->nama}}">
	</div>
	<div class="form-group">
		<label>Keterangan</label>
		<textarea cols="6" id="input_jenis_keterangan" name="keterangan" placeholder="Masukan Keterangan" class="form-control">{{$jenis_donat->keterangan}}</textarea>
	</div>
		
	
</div>
<div class="modal-footer">
	<input type="submit" class="btn btn-primary" value="Simpan" class="form-control"></submit>
</div>
</form>
