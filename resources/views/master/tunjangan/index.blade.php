@extends('layouts.main')

@section('content')
    <div class="row wrapper-content">
        <div class="col-md-8">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Data Tunjangan Jabatan</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        
                        <a id="tambah_tunjangan_btn" href="{{url('tunjangan/tambah_dialog')}}" data-toggle="modal" data-target="#modalTunjangan" title="Tambah Data Tunjangan Jabatan"><i class="fa fa-plus"></i></a>

                    </div>

                </div>

                <div class="ibox-content">
                    <div id="tableContainer">
                        <div id="tunjanganContainerTable">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    

    <div class="modal inmodal" id="modalTunjangan" tabindex="-1" role="dialog" aria-hidden="true">
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
