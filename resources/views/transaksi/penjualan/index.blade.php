@extends('layouts.main')

@section('content')
<div class="wrapper-content">
	<form id="form_filter_penjualan">
		<div class="ibox">
			<div class="ibox-title">
				<h5>Filter Data</h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
			</div>
			<div class="ibox-content">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Toko</label>
							<select class="form-control" name="id_toko">
								@forelse ($data_toko as $toko)
									<option value="{{$toko->id}}">{{$toko->kode.' | '.$toko->nama}}</option>
								@empty
									<option>Tidak Ada Data Toko</option>
								@endforelse
							</select>
						</div>
						
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Bulan</label>
							<input type="month" name="bulan" class="form-control">
							
						</div>
						
					</div>
					<div class="col-md-1 pull-right">
						<input type="submit" value="Filter" class="btn btn-success">
					</div>
				</div>
			</div>
		</div>
		
	</form>
	<div class="row">
		<div class="col-md-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Data Transaksi Penjualan</h5>
					<div class="ibox-tools">
						<a class="collapse-link">
							<i class="fa fa-chevron-up"></i>
						</a>
						<a  title="Tambah Penjualan" href="{{url('penjualan/tambah_dialog')}}" data-toggle="modal" data-target="#modalPenjualan">
							<i class="fa fa-plus"></i>
						</a>

					</div>
					
				</div>
				<div class="ibox-content">
					
					<div id="tableContainer">
						<div id="penjualanTableContainer"></div>
					</div>
					

				</div>
			</div>
		</div>
	</div>
	
</div>

<script>
	$(document).on('submit', 'form#form-filter', function(e){
		e.preventDefault();
		var inisialisasiData = function(){
			
		}
	});
	$(document).on('click', '.btn-penjualan-print', function(e){
		e.preventDefault();
		var id = $(this).attr('id');
		console.log('Button Print di Klik : '+id);
	});
</script>

@endsection