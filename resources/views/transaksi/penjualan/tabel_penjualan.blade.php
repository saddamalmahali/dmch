<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th style="text-align: center;">No</th>
				<th style="text-align: center;">Kode Toko</th>
				<th style="text-align: center;">Nama Toko</th>
				<th style="text-align: center;">Alamat</th>
				<th style="text-align: center;">Tanggal Transaksi</th>
				<th style="text-align: center;">Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 0; ?>
			@forelse($data as $penjualan)
			<tr>
				<td align="center" style="vertical-align: middle;">{{$i+1}}</td>
				<td align="center" style="vertical-align: middle;">{{$penjualan->toko->kode}}</td>
				<td align="center" style="vertical-align: middle;">{{$penjualan->toko->nama}}</td>
				<td align="center" style="vertical-align: middle;">{{$penjualan->toko->alamat}}</td>
				<td align="center" style="vertical-align: middle;">{{date('d/m/Y', strtotime($penjualan->tanggal_penjualan))}}</td>
				<td align="center" style="vertical-align: middle;">
					<a class="btn btn-primary btn-circle" title="Lihat Transaksi" data-toggle="modal" data-target="#modalPenjualan" href="{{url('penjualan/lihat').'/'.$penjualan->id}}"><i class="fa fa-search"></i></a>					
					<a class="btn btn-danger btn-circle btn_penjualan_hapus" title="Hapus Data" id="{{$penjualan->id}}" ><i class="fa fa-trash"></i></a> 
				</td>
			</tr>
			<?php $i++; ?>
			@empty

			@endforelse
		</tbody>
	</table>
	<div>{{$data->links()}}</div>
</div>

<div class="modal inmodal" id="modalPenjualan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                
            </div>
            
        </div>
    </div>
</div>