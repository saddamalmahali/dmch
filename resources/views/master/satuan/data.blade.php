<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th valign="middle" style="text-align: center;">No</th>
				<th valign="middle" style="text-align: center;">Nama</th>
				<th valign="middle" style="text-align: center;">Alias</th>
				<th valign="middle" style="text-align: center;">Keterangan</th>
				<th valign="middle" style="text-align: center;">Opsi</th>				
			</tr>
		</thead>
		<tbody>
			<?php $i = 0; ?>
			@forelse($data as $satuan)
			<tr>
				<td align="center">{{$i+1}}</td>
				<td>{{$satuan->nama}}</td>
				<td align="center">{{$satuan->alias}}</td>
				<td>{{$satuan->keterangan}}</td>
				<td align="center"><a class="btn btn-primary btn-circle" href="{{url('satuan/update_dialog').'/'.$satuan->id}}" data-toggle="modal" data-target="#modalSatuan"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger btn-circle" href="{{url('satuan/delete').'/'.$satuan->id}}"><i class="fa fa-trash" ></i></a></td>
			</tr>
			<?php $i++; ?>
			@empty
			<tr>
				<td colspan="5">Tidak Ditemukan Data</td>
			</tr>
			@endforelse
		</tbody>
	</table>	
</div>