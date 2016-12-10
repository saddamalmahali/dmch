

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Tambah Komisi</h4>
</div>
<form id="form_tambah_komisi" role="form">
<div class="modal-body">
    
	{{ csrf_field() }}
	<div class="form-group">
		<label>Jenis Donat</label>
		<select class="form-control" name="id_jenis" >
            @forelse ($list_jenis as $jenis)
                <option value="{{$jenis->id}}">{{$jenis->kode.' | '.$jenis->nama}}</option>
            @empty
                
            @endforelse
        </select>
	</div>
	<div class="form-group">
		<label>Jenis</label>
		<select class="form-control" name="id_satuan" >
			@forelse ($list_satuan as $satuan)
                <option value="{{$satuan->id}}">{{$satuan->nama.' ('.$satuan->alias.')'}}</option>
            @empty
                
            @endforelse
		</select>
	</div>
    <div class="form-group">
		<label>Komisi</label>
		<input name="komisi" type="number" placeholder="Masukan Komisi" class="form-control">
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
