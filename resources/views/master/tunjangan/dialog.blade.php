

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Tambah Data Tunjangan</h4>
</div>
<form id="form_tambah_tunjangan" role="form">
<div class="modal-body">
    
	{{ csrf_field() }}
	<div class="form-group">
		<label>Jabatan</label>
		<select class="form-control m-b" name="id_jabatan" id="select_tunjangan_jabatan">
            <option value="" disabled="" selected>Pilih Jabatan</option>
			@forelse ($data_jabatan as $jabatan)
                <option value="{{$jabatan->id}}">{{$jabatan->kode.' | '.$jabatan->nama}}</option>
            @empty
                <option></option>
            @endforelse
		</select>
	</div>
	<div class="form-group">
		<label>Nama</label>
        <input type="text" name="nama" id="input_tunjangan_nama" class="form-control" placeholder="Nama Tunjangan">
		
	</div>
	<div class="form-group">
		<label>Jumlah</label>
		<input type="number" name="jumlah" id="input_tunjangan_jumlah" class="form-control">
	</div>
	<div class="form-group">
		<label>Keterangan</label>
		<textarea class="form-control" rows="6" name="keterangan"></textarea>
	</div>
	
</div>
<div class="modal-footer">
	<input type="submit" class="btn btn-primary" value="Simpan" class="form-control"></submit>
</div>
</form>
