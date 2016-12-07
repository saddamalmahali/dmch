<div class="table-responsive">
	<table class="table table">
		<thead>
			<tr>
				<th style="text-align: center;">No</th>
				<th style="text-align: center;">Toko</th>
				<th style="text-align: center;">Tanggal</th>
				<th style="text-align: center;">Karyawan</th>
				<th style="text-align: center;">Keterangan</th>
				<th style="text-align: center;">Opsi</th>

			</tr>
		</thead>
		<tbody>
			<?php $i = 0; ?>
			@forelse($data as $olah)
			<tr>
				<td align="center" valign="middle">{{$i+1}}</td>
				<td align="center" valign="middle">{{$olah->toko->kode.' | '.$olah->toko->nama}}</td>
				<td align="center" valign="middle">{{date('d/m/Y', strtotime($olah->tanggal))}}</td>
				<td align="center" valign="middle">{{$olah->karyawan->nama_depan.' '.$olah->karyawan->nama_belakang}}</td>
				<td align="center" valign="middle">{{$olah->keterangan}}</td>
				<td align="center" valign="middle" width="15%">
					<a class="btn btn-primary btn-circle" data-toggle="modal" data-target="#modalOlah" href="{{url('olah/lihat').'/'.$olah->id}}"><i class="fa fa-search"></i></a>
					<a class="btn btn-danger btn-circle btn_hapus_olah" id="{{$olah->id}}"><i class="fa fa-close"></i></a>

				</td>

			</tr>
			<?php $i++; ?>
			@empty
				<tr>
					<td align="center" colspan="6">Tidak Ada Data</td>
				</tr>
			@endforelse
		</tbody>
	</table>
</div>
