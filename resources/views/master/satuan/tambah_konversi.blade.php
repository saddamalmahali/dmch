<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Tambah Konversi</h4>
</div>
<form id="form_konversi" role="form">
<div class="modal-body">
    
	{{ csrf_field() }}
	<div class="form-group">
		<label>Satuan</label>
		<select name="id_satuan" class="form-control"> 
			<option value="">Pilih Satuan</option>
			@forelse($data_satuan as $satuan)
				<option value="{{$satuan->id}}">{{$satuan->alias}}</option>
			@empty

			@endforelse
		</select>
	</div>
	<div class="form-group">
		<label>Nilai Satuan</label>
		<input type="number" name="nilai_satuan" class="form-control">
	</div>
	<div class="form-group">
		<label>Satuan Konversi</label>
		<select name="id_konversi" class="form-control"> 
			<option value="">Pilih Satuan</option>
			@forelse($data_satuan as $satuan)
				<option value="{{$satuan->id}}">{{$satuan->alias}}</option>
			@empty

			@endforelse
		</select>
	</div>
	<div class="form-group">
		<label>Nilai Satuan Konversi</label>
		<input type="number" name="nilai_konversi" class="form-control">
	</div>
		
	
</div>
<div class="modal-footer">
	<input type="submit" class="btn btn-primary" value="Simpan" class="form-control"></submit>
</div>
</form>
