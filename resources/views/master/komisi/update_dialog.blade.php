

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Update Komisi</h4>
</div>
<form id="form_update_komisi" role="form">
<div class="modal-body">
    
	{{ csrf_field() }}
    <input type="hidden" name="id" value="{{$komisi->id}}">
	<div class="form-group">
		<label>Jenis Donat</label>
		<select class="form-control" name="id_jenis" >
            @forelse ($list_jenis as $jenis)
                <option value="{{$jenis->id}}" {{$jenis->id==$komisi->id_jenis ? 'selected="true"': ''}}>{{$jenis->kode.' | '.$jenis->nama}}</option>
            @empty
                
            @endforelse
        </select>
	</div>
	<div class="form-group">
		<label>Jenis</label>
		<select class="form-control" name="id_satuan" >
			@forelse ($list_satuan as $satuan)
                <option value="{{$satuan->id}}" {{$satuan->id==$komisi->id_satuan ? 'selected="true"': ''}}>{{$satuan->nama.' ('.$satuan->alias.')'}}</option>
            @empty
                
            @endforelse
		</select>
	</div>
    <div class="form-group">
		<label>Komisi</label>
		<input name="komisi" type="number" placeholder="Masukan Komisi" class="form-control" value="{{$komisi->komisi}}">
	</div>
	<div class="form-group">
		<label>Keterangan</label>
		<textarea cols="6" id="keterangan" name="keterangan" placeholder="Masukan Keterangan" class="form-control">{{$komisi->keterangan}}</textarea>
	</div>
		
	
</div>
<div class="modal-footer">
	<input type="submit" class="btn btn-primary" value="Simpan" class="form-control"></submit>
</div>
</form>
