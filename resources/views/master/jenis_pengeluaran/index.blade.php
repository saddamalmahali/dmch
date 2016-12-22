@extends('layouts.main')

@section('content')
    <div class="row wrapper-content">   
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Halaman Jenis Pengeluaran</h5>
                    <div class="ibox-tools">
						<a class="collapse-link">
							<i class="fa fa-chevron-up"></i>
						</a>
						
						<a id="tambah_harga_jual_btn" href="{{url('jenis_pengeluaran/tambah_dialog')}}" data-toggle="modal" data-target="#modalJenisPengeluaran" title="Tambah Data"><i class="fa fa-plus"></i></a>

					</div>
                </div>
                <div class="ibox-content">
                    <div id="tableContainer">
                        <div id="jenisPengeluaranContainerTable"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal inmodal" id="modalJenisPengeluaran" tabindex="-1" role="dialog" aria-hidden="true">
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