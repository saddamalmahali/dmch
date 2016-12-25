<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width:10%; text-align:center;">No</th>
                <th style=" text-align:center;">Jabatan</th>
                <th style=" text-align:center;">Nama Tunjangan</th>
                <th style="text-align:center;">Jumlah</th>
                <th style="width:20%; text-align:center;">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0; ?>
            @forelse ($data as $tunjangan)
                <tr>
                    <td align="center">{{$i+1}}</td>
                    <td align="center">{{$tunjangan->jabatan->kode.' | '.$tunjangan->jabatan->nama}}</td>
                    <td align="center">{{$tunjangan->nama}}</td>
                    <td align="center">Rp. {{number_format($tunjangan->jumlah)}},-</td>
                    <td align="center">
                        <a href="{{url('tunjangan/update_dialog').'/'.$tunjangan->id}}" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#modalTunjangan"><i class="fa fa-pencil"></i></a> 
                        <a href="" class="btn btn-danger btn-circle btn-hapus-tunjangan" id="{{$tunjangan->id}}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @empty
                
            @endforelse
        </tbody>
    </table>
</div>