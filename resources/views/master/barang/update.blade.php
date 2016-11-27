

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Update Barang #{{$barang->nama}}</h4>
</div>
<form id="form_update_barang" role="form">
<div class="modal-body">
    
	{{ csrf_field() }}
	<input type="hidden" name="id" value="{{$barang->id}}">
	<div class="form-group">
		<label>Nama Barang</label>
		<input type="text" id="barang" name="barang" placeholder="Input Nama Barang" class="form-control" value="{{$barang->nama}}">
	</div>
	<div class="form-group">
		<label>Jenis</label>
		<select class="form-control m-b" name="jenis" id="jenis" >
			<option>Pilih Jenis</option>
			<option  value="pokok" {{$barang->jenis == 'pokok' ? "selected = 'selected'" : ""}}>Pokok</option>
			<option value="pelengkap" {{$barang->jenis == 'pelengkap' ? "selected = 'selected'" : ""}}>Pelengkap</option>
		</select>
	</div>
	<div class="form-group">
		<label>Keterangan</label>
		<textarea cols="6" id="keterangan" name="keterangan" placeholder="Masukan Keterangan" class="form-control">{{$barang->keterangan}}</textarea>
	</div>
		
	
</div>
<div class="modal-footer">
	<input type="submit" class="btn btn-primary" value="Simpan" class="form-control"></submit>
</div>
</form>
