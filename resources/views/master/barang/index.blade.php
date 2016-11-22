@extends('layouts.main')

@section('content')
<div class="row" style="padding-bottom: 20px;">
	<div class="col-md-12" >
		<div align="center">
			<h2>DATA BARANG</h2>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="pull-right" style="padding-right: 14px; padding-bottom: 10px;">
			<a id="tambah_barang_btn" class="btn btn-primary btn-sm" href="{{url('barang/tambah_dialog')}}" data-toggle="modal" data-target="#modalBarang" title="Tambah Barang"><i class="fa fa-plus"></i> &nbsp; Tambah Barang</a>
		</div>
	</div>
</div>
<div class="col-md-12">
	
	
	<div id="barangContainerTable">
		
	</div>
</div>

<div class="modal inmodal" id="modalBarang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                
            </div>
            
        </div>
    </div>
</div>

@endsection