<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width:10%; text-align:center">No</th>
                <th style="text-align:center">Kode</th>
                <th style="text-align:center">Nama</th>   
                <th style="text-align:center">Keterangan</th>
                <th style="width:20%; text-align:center">Opsi</th>
            </tr>
        </thead>
        <tbody>
        <?php $i =0; ?>
            @forelse ($data as $jabatan)
                <tr>
                    <td align="center" style="vertical-align:middle;">{{$i+1}}</td>
                    <td>{{$jabatan->kode}}</td>
                    <td>{{$jabatan->nama}}</td>
                    <td>{{$jabatan->keterangan}}</td>
                    <td align="center" width="20%">
                        <a href="{{url('jabatan/update_dialog').'/'.$jabatan->id}}" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#modalJabatan" title="Update Data"><i class="fa fa-pencil"></i></a> 
                        <a href="#" class="btn btn-danger btn-circle btn-hapus-jabatan" id="{{$jabatan->id}}"><i href="" class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td align="center" colspan="5">Tidak Ada Data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>