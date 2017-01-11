@extends('layouts.main')
@section('content')
    <div class="row border-bottom white-bg page-heading">
        <div class="col-md-4">
            <h2>
                <small>Akun</small> <br />
                Master Akun
            </h2>            
        </div>
        <div class="col-md-8 wrapper-content">
            <div class="pull-right">
                <a class='btn btn-success btn-md' href="{{url('akun/tambah')}}"><i class="fa fa-plus"></i>&nbsp;Tambah Akun</a>
            </div>
        </div>
        
    </div>

    <div class="row wrapper-content">
        <div class="ibox ibox-primary">
            <div class="ibox-title">
                <h5>
                    Data Akun
                </h5>
            </div>
            <div class="ibox-content">
                <div class="scroll_content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class='table'>
                                    <em class="pull-right">*Tabel Akun</em>
                                    <thead>
                                        <tr class='bg-primary'>
                                            <th style='text-align:center; width:5%;'><input type='checkbox' name='check_all' id='check_all'></th>
                                            <th style='text-align:center; width:15%;'>Kode</th>
                                            <th style='text-align:center; width:30%;'>Nama</th>
                                            <th style='text-align:center; width:30%;'>Deskripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data_kategori as $kategori)
                                            <tr>
                                                <td align="center"></td>
                                                <td><b>{{$kategori->kode}}</b></td>
                                                <td><b>{{$kategori->nama}}</b></td>
                                                <td></td>
                                            </tr>
                                            @if($kategori->list_akun != null)
                                                @foreach($kategori->list_akun as $item)
                                                    @if($item->header == null)
                                                        <tr>
                                                            <td align="center"><input type="checkbox"></td>
                                                            <td >{{$item->kode}}</td>
                                                            <td>&emsp;{{$item->nama}}</td>
                                                            <td>{{$item->deskripsi}}</td>
                                                        </tr>    
                                                        @if($item->sub_akun != null)
                                                            @foreach($item->sub_akun as $sub)
                                                                <tr>
                                                                    <td align="center"><input type="checkbox"></td>
                                                                    <td >{{$sub->kode}}</td>
                                                                    <td>&emsp;&emsp;{{$sub->nama}}</td>
                                                                    <td>{{$sub->deskripsi}}</td>
                                                                </tr>
                                                            @endforeach
                                                        @endif    
                                                    @endif
                                                    
                                                @endforeach
                                            @endif
                                        @empty
                                            <tr>
                                                <td colspan='5' align="center">Tidak Ada Data</td>
                                            </tr>
                                        @endforelse
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>                    
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function () {

            // Add slimscroll to element
            $('.scroll_content').slimscroll({
                height: '350px'
            })

        });

    </script>

@endsection