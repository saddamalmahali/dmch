<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th style="text-align: center;">No</th>
				<th style="text-align: center;">Nama Barang</th>
				<th style="text-align: center;">Satuan</th>
				<th style="text-align: center;">Harga</th>
				<th style="text-align: center;">Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 0; ?>
			@forelse($data as $harga_jual)
			<tr>
				<td align="center">{{$i+1}}</td>
				<td align="center">{{$harga_jual->data_jenis->nama}}</td>
				<td align="center">{{$harga_jual->satuan->nama.' ('.$harga_jual->satuan->alias.')'}}</td>
				<td align="center">Rp. {{number_format($harga_jual->harga)}},-</td>
				<td align="center">
					<a class="btn btn-primary btn-circle" href="{{url('harga_jual/edit_dialog').'/'.$harga_jual->id}}" data-toggle="modal" data-target="#modalHargaJual"><i class="fa fa-pencil"></i></a> 
					<a class="btn btn-danger btn-circle btn-hapus-harga-jual" id="{{$harga_jual->id}}"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			<?php $i++ ?>
			@empty
			<tr>
				<td colspan="5">Tidak Ada Data</td>
			</tr>
			@endforelse
		</tbody>
	</table>
	<div align="center">{{$data->links()}}</div>
</div>