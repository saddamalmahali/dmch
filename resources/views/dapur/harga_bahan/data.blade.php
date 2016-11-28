<div class="row">
	
</div>
<div class="table-responsive">
	<table class="table table-bordered" style="padding: 0; margin: 0;">
		<thead>
			<tr>
				<th style="text-align: center;">No</th>
				<th style="text-align: center;">Kode Barang</th>
				<th style="text-align: center;">Nama Barang</th>
				<th style="text-align: center;">Satuan</th>
				<th style="text-align: center;">Harga</th>
				<th style="text-align: center;">Keterangan</th>
				<th style="text-align: center;">Opsi</th>

			</tr>
		</thead>
		<tbody>
			<?php $i =0; ?>
			@forelse($data as $harga)
			<tr>
				<td align="center">{{$i+1}}</td>
				<td align="center">{{$harga->kode}}</td>
				<td align="center">{{$harga->barang->nama}}</td>
				<td align="center">{{$harga->satuan->alias}}</td>
				<td align="center" width="20%">Rp. {{number_format($harga->harga)}},-</td>
				<td align="center">{{$harga->keterangan}}</td>
				<td align="center"> <a class="btn btn-danger btn-circle" href="{{url('harga_bahan/hapus')."/".$harga->id}}"><i class="fa fa-trash"></i></a></td>
			</tr>
			<?php $i++; ?>
			@empty
			<tr>
				<td colspan="7" align="center">Tidak Ada Data</td>
			</tr>
			@endforelse
		</tbody>
	</table>	

	<div style="padding-top: 0; margin-top: 0;text-align: center;">{{ $data->links() }}</div>
</div>
