@extends('layouts.main')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <h2>Laporan Pemasukan</h2>
    </div> 
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Filter Data</h5>
            </div>
            <div class="ibox-content m-b-sm border-bottom">
                <form id="form_filter">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Toko</label>
                                <select class='form-control' name="id_toko">
                                    @forelse ($list_toko as $toko)
                                        <option value="{{$toko->id}}">{{$toko->kode.' | '.$toko->nama}}</option>
                                    @empty
                                        <option value="">Data Toko Kosong</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input class="input-sm form-control" type="date" name='tanggal' >                                          
                            </div>
                            <input type="submit" class="btn btn-primary pull-right" value="Filter">
                        </div>

                        
                    </div>                    
                    
            </div>
            
            </form>
        </div>

        <div id="data_pengeluaran"></div>
    </div>

    <script>
        $(document).on('submit', '#form_filter', function(e){
            e.preventDefault();
            $.ajax({
                url : 'pemasukan/get_data_harian',
                type : 'post',
                data : $(this).serialize(),
                dataType : 'json',
                success : function(data){
                   $('div#data_pengeluaran').html(data);
                   //console.log(data); 
                }
            });
        });
    </script>
@endsection