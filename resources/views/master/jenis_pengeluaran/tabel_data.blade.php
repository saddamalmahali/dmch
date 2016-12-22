<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="text-align:center; width:10%;">No</th>
                <th style="text-align:center; width:20%;">Kode</th>
                <th style="text-align:center;">Nama</th>
                <th style="text-align:center;">Keterangan</th>
                <th style="text-align:center; width:20%;">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; ?>
            @forelse ($data as $jenis_pengeluaran)
                <tr>
                    <td align="center" style="vertical-align:middle;">{{$i+1}}</td>
                    <td align="center" style="vertical-align:middle;">{{$jenis_pengeluaran->kode_jenis}}</td>
                    <td align="center" style="vertical-align:middle;">{{$jenis_pengeluaran->nama_jenis}}</td>
                    <td align="center" style="vertical-align:middle;">{{$jenis_pengeluaran->keterangan}}</td>
                    <td align="center" style="vertical-align:middle;">                        
                        <a class="btn btn-primary btn-circle" href="{{url('jenis_pengeluaran/update_dialog').'/'.$jenis_pengeluaran->id}}" data-toggle="modal" data-target="#modalJenisPengeluaran"><i class="fa fa-pencil"></i></a> 
                        <a class="btn btn-danger btn-circle btn-hapus-jenis-pengeluaran" id='{{$jenis_pengeluaran->id}}'><i class="fa fa-trash"></i></a> 
                    </td>
                </tr>
                <?php $i++; ?>
            @empty
                <tr>
                    <td align="center" colspan="5">Tidak Ada Data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>