

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Update Harga Jual</h4>
</div>
<form id="form_update_harga_jual" role="form">
<div class="modal-body">
    
	{{ csrf_field() }}
	<input type="hidden" name="id" value="{{$harga_jual->id}}">
	<div class="form-group">
		<label>Jenis Barang</label>
		<select id="input_jenis_harga_jual" name="id_jenis" class="form-control">
			<option value="">Pilih Jenis Harga Jual</option>
			@forelse($data_jenis as $jenis)
				<option value="{{$jenis->id}}" {{$harga_jual->id_jenis == $jenis->id? 'selected="true"' : ''}}>{{$jenis->nama}}</option>
			@empty

			@endforelse
		</select>
	</div>
	<div class="form-group">
		<label>Satuan</label>
		<select class="form-control m-b" name="satuan" id="input_satuan_harga_jual">
			<option value="">Pilih Jenis Satuan</option>
			@forelse($data_satuan as $satuan)
			<option value="{{$satuan->id}}" {{$harga_jual->id_satuan == $satuan->id? 'selected' : ''}}>{{$satuan->nama.' ('.$satuan->alias.')'}}</option>
			@empty
			@endforelse
		</select>
	</div>
	<div class="form-group">
		<label>Harga</label>
		<input type="number" name="harga" id='input_harga_harga_jual' class="form-control" value="{{$harga_jual->harga}}">
	</div>
		
	
</div>
<div class="modal-footer">
	<input type="submit" class="btn btn-primary" value="Simpan" class="form-control">
</div>
</form>

