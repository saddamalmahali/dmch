@extends('layouts.main')

@section('content')
<div class="col-md-8">
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
	<div class="col-md-4">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5><i class="fa fa-life-ring"></i>&nbsp; Keterangan</h5>
			</div>
			<div class="ibox-content">
				
			</div>
		</div>
	</div>


@endsection