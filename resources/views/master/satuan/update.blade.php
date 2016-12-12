

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Update Satuan</h4>
</div>
<form id="form_satuan_update" role="form">
<div class="modal-body">
    
	{{ csrf_field() }}
	<input type="hidden" name="id" value="{{$satuan->id}}">
	<div class="form-group">
		<label>Nama Satuan</label>
		<input type="text" id="nama_satuan" name="nama" placeholder="Input Nama Satuan" class="form-control" value="{{$satuan->nama}}">
	</div>
	<div class="form-group">
		<label>Alias Satuan</label>
		<input type="text" id="alias_satuan" name="alias" placeholder="Input Alias Satuan" class="form-control" value="{{$satuan->alias}}">
	</div>
	
	<div class="form-group">
		<label>Keterangan</label>
		<textarea cols="6" id="keterangan" name="keterangan" placeholder="Masukan Keterangan" class="form-control">{{$satuan->keterangan}}</textarea>
	</div>
		
	
</div>
<div class="modal-footer">
	<input type="submit" class="btn btn-primary" value="Simpan" class="form-control"></submit>
</div>
</form>
