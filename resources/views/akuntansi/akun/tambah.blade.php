@extends('layouts.main')
@section('content')
    <header class="row border-bottom page-heading white-bg ">
        <div class="col-md-12">
            <h2 class="page-title-heading">
                <small>Akun</small><br/>
                TAMBAH AKUN
            </h2>
        </div>
    </header>
    <div class="row wrapper-content">
        <div class="ibox">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{url('akun/tambah')}}" class='form-horizontal' method='post'>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-md-3 control-label" >Kategori Akun</label>
                                <div class="col-md-9">
                                    <select name="id_kategori" id="" class="form-control input_kategori_akun">
                                        <option value="" disabled selected>Pilih Kategori</option>
                                        @forelse ($data_kategori as $kategori)
                                        <option value="{{$kategori->id}}">{{$kategori->kode.' | '.$kategori->nama}}</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Header</label>
                                <div class="col-md-9">
                                    <select name="header" class="form-control input_header_akun">
                                        <option value='' selected>ROOT</option>
                                        @foreach($data_akun as $item)
                                            <option value='{{$item->id}}'>{{$item->kode.' | '.$item->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class="col-md-3 control-label" >Kode Akun</label>
                                <div class="col-md-9">
                                    <input type="number" id='kode_akun' class="form-control" name="kode" placeholder="Kode Akun" style="width:30%;"> 
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class="col-md-3 control-label" >Nama Akun</label>
                                <div class="col-md-9">
                                    <input type="text" id='kode_akun' class="form-control" name="nama" placeholder="Nama Akun" >
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class="col-md-3 control-label" >Posisi</label>
                                <div class="col-md-9">
                                    <select class='form-control' name='posisi'>
                                        <option value="debit">Debet</option>
                                        <option value='kredit'>Kredit</option>
                                    </select>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class="col-md-3 control-label" >Deskripsi</label>
                                <div class="col-md-9">
                                    <textarea name="deskripsi" class="form-control" rows="6"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-3 col-md-9">
                                    <input type="submit" class="btn btn-primary" value="Simpan" style="width:100px"> || <a class="btn btn-danger" href="{{url('/index_akun')}}" style="width:100px;" >Batal</a>
                                </div>
                            </div>
                            
                        </form> 

                    </div>
                      
                </div>
            </div>
            
        </div>
    </div>

    <script>
            $('.input_header_akun').select2();
            $('.input_kategori_akun').select2();
    </script>
@endsection