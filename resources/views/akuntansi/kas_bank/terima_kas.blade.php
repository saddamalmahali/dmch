@extends('layouts.main')

@section('content')
    <section class="row white-bg dashboard-1 border-bottom">
        <div class="col-md-12">
            <h2>
                <small>Kas & Bank</small><br />
                Terima Kas
            </h2>
        </div>
    </section>

    <div class="row wrapper-content">
        <div class="col-md-12">
            <div class="ibox">
                
                <div class="ibox-content">
                    <form action="" class="form-horizontal">
                        <div class="important-info form row">
                           
                                <div class="form-group">
                                    <label class="control-label col-md-1">Setor Ke</label>
                                    <div class="col-md-3 col-xs-12">
                                        <select name="id_akun" class="form-control input_select_akun_penerimaan">
                                            <option value="" disabled selected>Penerima</option>
                                            @forelse ($data_akun as $akun)
                                                <option value="{{$akun->id}}">{{$akun->kode.' | '.$akun->nama}}</option>
                                            @empty
                                                
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="invoice-details">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Tanggal Pembayaran</label>  
                                    <input type="text" id="input_tanggal_terima_kas" name='tanggal' class='form-control' placeholder="Input Tanggal">
                                </div>
                            </div>
                            <div class="col-md-offset-1 col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Nomor Nota</label>  
                                    <input type="text" name='no_transaksi' class='form-control' placeholder="No. Nota Penerimaan">
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="wrapper-content row">
                            <table class="table table-hover" id="tabel_transaksi">
                                <thead>
                                    <tr class="table-header">
                                        <th style="width:30%;">Terima Dari</th>
                                        <th style="max-width:35%;">Deskripsi</th>
                                        <th style="width:30%;">Jumlah</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id='detile_transaksi_penerimaan_0'>
                                        <td>
                                            <select name="" id="" class="form-control select_detile_transaksi_akun">
                                                @forelse ($data_akun_detile as $akun)
                                                    <option value="{{$akun->id}}">{{$akun->kode.' | '.$akun->nama}}</option>
                                                @empty
                                                    
                                                @endforelse
                                            </select>
                                        </td>
                                        <td><textarea name="" id="" rows='1' class="form-control"></textarea></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><a class='text-info btn_remove_detile_transaksi' id='0'><i class="fa fa-minus " ></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div >
                            <button class="btn btn-primary btn-tambah-data"><i class='fa fa-plus'></i>&emsp;Tambah Data</button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
    <script>
        var count = 1;
        var i = 1;
        var dynamic_form = $('table#tabel_transaksi > tbody');
        $(document).ready(function(){
            $('.input_select_akun_penerimaan').select2();
            $('#input_tanggal_terima_kas').datepicker();
            $('.select_detile_transaksi_akun').select2();

            
        });
        $(document).on('click', '.btn-tambah-data', function(e){
            e.preventDefault();
            dynamic_form.append(
                '<tr id="detile_transaksi_penerimaan_'+i+'">'+
                    '<td>'+
                        '<select name="kas_bank_detile['+i+'][id_akun]" id="" class="form-control select_detile_transaksi_akun">'+
                            '@forelse ($data_akun_detile as $akun)'+
                                '<option value="{{$akun->id}}">{{$akun->kode." | ".$akun->nama}}</option>'+
                            '@empty'+
                                
                            '@endforelse'+
                        '</select>'+
                    '</td>'+
                    '<td><textarea name="detile_kas_bank['+i+'][kas_bank_detile]" id="" rows="1" class="form-control"></textarea></td>'+
                    '<td><input type="number" class="form-control" name="kas_bank_detile['+i+'][jumlah]"></td>'+
                    '<td><a class="text-info btn_remove_detile_transaksi" id="'+i+'"><i class="fa fa-minus "></i></a></td>'+
                '</tr>'
            );
            $('.select_detile_transaksi_akun').select2();
            i++;
            count++;
        });
        $(document).on('click', '.btn_remove_detile_transaksi', function(e){
			
			var row_id = $(this).attr('id');
            if(!(count < 2)){
                console.log('Remove Data : '+row_id);
			    $('#detile_transaksi_penerimaan_'+row_id).remove();
                count--;
            }
            
		});


    </script>
@endsection