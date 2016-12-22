

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Update Jenis Pengeluaran</h4>
</div>
<form id="form_update_jenis_pengeluaran" role="form">
<div class="modal-body">
    
	{{ csrf_field() }}
    <input type="hidden" name="id" value="{{$jenis_pengeluaran->id}}"> 
	<div class="form-group">
		<label>Kode</label>
		<input type="text" name="kode_jenis" id='input_kode_jenis_pengeluaran' class="form-control" readonly="true" value="{{$jenis_pengeluaran->kode_jenis}}">
	</div>
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama_jenis" id='input_nama_jenis_pengeluaran' class="form-control" value="{{$jenis_pengeluaran->nama_jenis}}">
	</div>
	<div class="form-group">
		<label>Keterangan</label>
		<textarea class="form-control" name="keterangan">{{$jenis_pengeluaran->keterangan}}</textarea>
	</div>
		
	
</div>
<div class="modal-footer">
	<input type="submit" class="btn btn-primary" value="Simpan" class="form-control">
</div>
</form>

