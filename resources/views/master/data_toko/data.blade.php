<div class="row">
	
</div>
<div class="table-responsive">
	<table class="table table-bordered" style="padding: 0; margin: 0;">
		<thead>
			<tr>
				<th style="text-align: center;">No</th>
				<th style="text-align: center;">Kode Toko</th>
				<th style="text-align: center;">Nama Toko</th>
				<th style="text-align: center;">Alamat</th>
				<th style="text-align: center;">Kecamatan</th>
				<th style="text-align: center;">Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php $i =0; ?>
			@forelse($data as $toko)
			<tr>
				<td align="center" width="10%">{{$i+1}}</td>
				<td>{{$toko->kode}}</td>
				<td align="center" width="20%">{{$toko->nama}}</td>
				<td width="25%">{{$toko->alamat}}</td>
				<td>{{$toko->kecamatan}}</td>
				<td align="center"><a class="btn btn-primary btn-circle" href="{{url('data_toko/update_form').'/'.$toko->id}}" data-toggle="modal" data-target="#modalToko"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger btn-circle" href="{{url('data_toko/hapus').'/'.$toko->id}}"><i class="fa fa-trash"></i></a></td>
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
