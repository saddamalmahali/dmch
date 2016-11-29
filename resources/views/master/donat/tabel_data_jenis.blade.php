<table class="table table-bordered">
	<thead>
		<tr>
			<td style="text-align: center;">No</td>
			<td style="text-align: center;">Kode Jenis</td>
			<td style="text-align: center;">Nama</td>
			<td style="text-align: center;">Keterangan</td>
			<td style="text-align: center;">Opsi</td>

		</tr>
	</thead>
	<tbody>
	<?php $i = 0; ?>
	@forelse($jenis_donat as $jenis)
		<tr>
			<td align="center" style="vertical-align: middle;">{{$i+1}}</td>
			<td align="center" style="vertical-align: middle;">{{$jenis->kode}}</td>
			<td style="vertical-align: middle;">{{$jenis->nama}}</td>
			<td style="vertical-align: middle;">{{$jenis->keterangan}}</td>
			<td align="center" style="vertical-align: middle;">
				<a class="btn btn-primary btn-circle" data-toggle="modal" data-target="#modalJenisDonat" href="{{url('donat/update_jenis_dialog').'/'.$jenis->id}}" title="Update Jenis"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger btn-circle btn_hapus_data_jenis" id ="{{$jenis->id}}" title="Hapus Jenis"><i class="fa fa-close"></i></a>
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

<div style="padding-top: 0; margin-top: 0;text-align: center;">{{ $jenis_donat->links() }}</div>