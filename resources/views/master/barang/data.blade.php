<div class="row">
	
</div>
<div class="table-responsive">
	<table class="table table-bordered" style="padding: 0; margin: 0;">
		<thead>
			<tr>
				<th style="text-align: center;">No</th>
				<th style="text-align: center;">Nama Barang</th>
				<th style="text-align: center;">Jenis</th>
				<th style="text-align: center;">Keterangan</th>
				<th style="text-align: center; width:20%;">Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php $i =0; ?>
			@forelse($data as $barang)
			<tr>
				<td align="center">{{$i+1}}</td>
				<td>{{$barang->nama}}</td>
				<td align="center">{{$barang->jenis}}</td>
				<td>{{$barang->keterangan}}</td>
				<td align="center"><a class="btn btn-primary btn-circle" href="{{url('barang/update')."/".$barang->id}}" data-toggle="modal" data-target="#modalBarang"><i class="fa fa-pencil"></i></a>  <a class="btn btn-danger btn-circle" href="{{url('barang/hapus')."/".$barang->id}}"><i class="fa fa-trash"></i></a></td>
			</tr>
			<?php $i++; ?>
			@empty
			<tr>
				<td colspan="5">Tidak Ada Data</td>
			</tr>
			@endforelse
		</tbody>
	</table>	

	<div style="padding-top: 0; margin-top: 0;text-align: center;">{{ $data->links() }}</div>
</div>
