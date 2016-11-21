<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th style="text-align: center;">No</th>
				<th style="text-align: center;">Nama Barang</th>
				<th style="text-align: center;">Jenis</th>
				<th style="text-align: center;">Keterangan</th>
				<th style="text-align: center;">Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php $i =0; ?>
			@forelse($data as $barang)
			<tr>
				<td>{{$i+1}}</td>
				<td>{{$barang->nama}}</td>
				<td>{{$barang->jenis}}</td>
				<td>{{$barang->keterangan}}</td>
				<td align="center"><a class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a> | <a class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
			</tr>
			<?php $i++; ?>
			@empty
			<tr>
				<td colspan="5">Tidak Ada Data</td>
			</tr>
			@endforelse
		</tbody>
	</table>	
</div>
