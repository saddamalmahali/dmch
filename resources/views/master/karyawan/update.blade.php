<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Tambah Karyawan</h4>
</div>
<form id="form_update_karyawan" role="form">
<div class="modal-body">
    
	{{ csrf_field() }}
	<input type="hidden" name="id" value="{{$karyawan->id}}">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Toko</label>
				<select name="id_toko" class="form-control">
					<option value="">Pilih Toko</option>
					@forelse($toko as $t)
						<option value="{{$t->id}}" {{$karyawan->id_toko == $t->id ? 'selected="true"' : ''}}>{{$t->nama}}</option>
					@empty

					@endforelse
				</select>
			</div>
			<div class="form-group">
				<label>Nama Depan</label>
				<input type="text" name="nama_depan" placeholder="Masukan Nama Depan Anda" class="form-control" value="{{$karyawan->nama_depan}}">
			</div>
			<div class="form-group">
				<label>Nama Belakang</label>
				<input type="text" name="nama_belakang" placeholder="Masukan Nama Belakang Anda" class="form-control" value="{{$karyawan->nama_belakang}}">
			</div>
			<div class="form-group">
				<label>Jenis Kelamin</label>
				<select name='jenis_kelamin' id="jenis_kelamin" class="form-control">
					<option>Pilih Jenis Kelamin</option>
					<option value="l" {{$karyawan->jenis_kelamin == 'l' ? "selected='selected'" : ''}}>Laki - Laki</option>
					<option value="p" {{$karyawan->jenis_kelamin == 'p' ? "selected='selected'" : ''}}>Perempuan</option>
				</select>
			</div>
			<div class="form-group">
				<label>Tempat Lahir</label>
				<input type="text" name="tempat_lahir" placeholder="Masukan Tempat Lahir Anda" class="form-control" value="{{$karyawan->tempat_lahir}}">
			</div>
		</div>
		<div class="col-md-6">
			
			<div class="form-group">
				<label>Tanggal Lahir</label>
				<input type="date" name="tanggal_lahir" class="form-control" value="{{date('Y-m-d', strtotime($karyawan->tanggal_lahir))}}">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea name="alamat" placeholder="Masukan Alamat" rows="8" class="form-control">{{$karyawan->alamat}}</textarea>
			</div>
		</div>

	</div>
		
	
</div>
<div class="modal-footer">
	<input type="submit" class="btn btn-primary" value="Simpan" class="form-control"></submit>
</div>
</form>