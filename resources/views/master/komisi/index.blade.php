@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Data Komisi</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>    
                </div>
                
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-3 pull-right" style="margin-bottom:10px;">
                            <a href="{{url('komisi/tambah_dialog')}}" class="pull-right btn btn-primary btn-sm" data-toggle="modal" data-target="#modalKomisi"><i class="fa fa-plus"></i>&nbsp;Tambah</a>
                        </div>                        
                    </div>
                    
                    <div id="tableContainer">
                        <div id="komisiContainerTable">
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>

    <div class="modal inmodal" id="modalKomisi" tabindex="-1" role="dialog" aria-hidden="true">
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