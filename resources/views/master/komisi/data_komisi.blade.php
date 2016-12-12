<div class="table-responsive">
    <table class="table table-striped">
        <thead class="bg-primary">
            <tr>
                <th style="text-align:center; vertical-align : middle; width: 10%;">No</th>
                <th style="text-align:center; vertical-align : middle;">Jenis Donat</th>
                <th style="text-align:center; vertical-align : middle;">Satuan</th>
                <th style="text-align:center; vertical-align : middle;">Komisi</th>
                <th style="text-align:center; vertical-align : middle;">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; ?>
            @forelse ($data as $komisi)
                <tr>
                    <td align="center" style="vertical-align:middle;">{{$i+1}}</td>
                    <td align="center" style="vertical-align:middle;">{{$komisi->jenis->kode.' | '.$komisi->jenis->nama}}</td>
                    <td align="center" style="vertical-align:middle;">{{$komisi->satuan->nama.' | '.$komisi->satuan->alias}}</td>
                    <td align="center" style="vertical-align:middle;">Rp. {{number_format($komisi->komisi)}},-</td>
                    <td align="center" style="vertical-align:middle;">
                        <a href="{{url('komisi/update').'/'.$komisi->id}}" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#modalKomisi"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-danger btn-circle btn_hapus_komisi" id="{{$komisi->id}}"><i class="fa fa-close"></i></a>                        
                    </td>
                </tr>
                <?php $i++; ?>
            @empty
                <tr>
                    <td colspan="5" align="center">Tidak Ada Data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>