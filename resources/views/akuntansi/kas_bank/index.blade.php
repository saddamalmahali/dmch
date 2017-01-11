@extends('layouts.main')

@section('content')
    <div class="row white-bg border-bottom dashboard-1">
        <div class="col-md-6">
            <h2>
                <small>Kas</small><br />
                Kas & Bank
            </h2>
        </div>
        <div class="col-md-6" style='horizontal-align:right;'>
            <div class="pull-right">
                <a class='btn btn-primary ' href="{{url('/kas_bank/terima')}}" style="margin-top:25px; width:100px"><i class="fa fa-plus"></i>&nbsp;Terima</a>&nbsp; 
                <a class='btn btn-primary ' style="margin-top:25px; width:100px"><i class="fa fa-plus"></i>&nbsp;Transfer</a>
            </div>
            
        </div>
    </div>  
    <div class="row wrapper-content">
        <div class="col-md-3">
            <section class="ibox ibox-primary primary-bg">
                <div class="ibox-title">
                    <span class='label label-success pull-right'>Debet</span>
                    <h5>Saldo Kas & Bank</h5>
                </div>
                <div class="ibox-content">
                    <h3>
                        <small>Total</small><br />
                        Rp. 0,-
                    </h3>
                </div>
            </section>
        </div>
        <div class="col-md-3">
            <section class="ibox">
                <div class="ibox-title">
                    <span class='label label-success pull-right'>Debet</span>
                    <h5>Column Bank</h5>
                </div>
                <div class="ibox-content">
                    <h3>
                        <small>Total</small><br />
                        Rp. 0,-
                    </h3>
                </div>
            </section>
        </div>
        <div class="col-md-3">
            <section class="ibox">
                <div class="ibox-title">
                    <span class='label label-danger pull-right'>Kredit</span>
                    <h5>Column Utang</h5>
                </div>
                <div class="ibox-content">
                    <h3>
                        <small>Total</small><br />
                        Rp. 0,-
                    </h3>
                </div>
            </section>
        </div>
        <div class="col-md-3">
            <section class="ibox">
                <div class="ibox-title">
                    <span class='label label-success pull-right'>Debet</span>
                    <h5>Column Piutang</h5>
                </div>
                <div class="ibox-content">
                    <h3>
                        <small>Total</small><br />
                        Rp. 0,-
                    </h3>
                </div>
            </section>
        </div>
    </div>
@endsection
