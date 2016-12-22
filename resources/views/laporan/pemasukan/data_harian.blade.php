<div class="row">
    <div class="col-md-6">
        <div class="ibox">
            <div class="ibox-title"><h5>Laporan Pemasukan Harian</h5></div>
            <div class="ibox-content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align:center;">No</th>
                            <th style="text-align:center;">Jenis</th>
                            <th style="text-align:center;">Satuan</th>
                            <th style="text-align:center;">Harga</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; $jumlah =0 ?>
                        @forelse ($list_pemasukan as $pemasukan)
                            <tr>
                                <td align = 'center'>{{$i+1}}</td>
                                <td align = 'center'>{{$pemasukan->JenisDonat->nama}}</td>
                                <td align = 'center'>{{$pemasukan->banyak.' '.$pemasukan->satuan->alias}}</td>
                                <td align = 'center'>Rp. {{number_format($pemasukan->jumlah)}},-</td>
                                
                            </tr>
                            
                            

                            <?php $i++ ?>
                        @empty
                            <tr>
                                <td colspan="4" align="center">Data Kosong</td>
                            </tr>
                        @endforelse

                        @if($list_pemasukan != null)
                            
                            <tr>
                                <td colspan="3" align="center"><b>JUMLAH</b></td>
                                <td align="center"><b>Rp. {{number_format($list_pemasukan->sum('jumlah'))}},-</b></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>