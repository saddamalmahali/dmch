@extends('layouts.main')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
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

    <script>
        
    </script>
@endsection