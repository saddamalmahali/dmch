@extends('layouts.main')

@section('content')
<div class="row" style="padding-bottom: 20px;">
	<div class="col-md-12" >
		<div align="center">
			<h2>DATA BARANG</h2>
		</div>
	</div>
</div>
<div class="col-md-5">
	<div class="ibox">
		<div class="ibox-title">
			<h5>Tambah Barang</h5>
		</div>
		<div class="ibox-content">
			<form id="form_barang" action="{{url('')}}" role="form" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<label>Nama Barang</label>
					<input type="text" name="barang" placeholder="Input Nama Barang" class="form-control">
				</div>
				<div class="form-group">
					<label>Jenis</label>
					<select class="form-control m-b" name="jenis">
						<option>Pilih Jenis</option>
						<option value="pokok">Pokok</option>
						<option value="pelengkap">Pelengkap</option>
					</select>
				</div>
				<div class="form-group">
					<label>Keterangan</label>
					<textarea cols="6" name="keterangan" placeholder="Masukan Keterangan" class="form-control"></textarea>
				</div>
				<div class="button-group">
					<input type="submit" class="btn btn-primary" value="Simpan"></submit>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-md-7">
	
	<div id="barangContainerTable">
		
	</div>
</div>

@endsection