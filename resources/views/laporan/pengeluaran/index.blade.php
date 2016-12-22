@extends('layouts.main')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Filter Data</h5>
            </div>
            <div class="ibox-content m-b-sm border-bottom">
                <form id="form_filter">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group">
                            <input class="input-sm form-control" type="date" >
                            <span class="input-group-btn">
                                <input type="submit" class="btn btn-primary btn-sm">
                            </span>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>

        <div id="data_pengeluaran"></div>
    </div>

    <script>
        $(document).on('submit', '#form_filter', function(e){
            e.preventDefault();
            $.ajax({
                url : 'pengeluaran/get_data_harian',
                type : 'post',
                data : $(this).serialize(),
                dataType : 'json',
                success : function(data){
                   $('div#data_pengeluaran').html(data); 
                }
            });
        });
    </script>
@endsection