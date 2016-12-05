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
				<td>{{$i+1}}</td>
				<td>{{$olah->id_toko}}</td>
				<td>{{date('d/m/Y', strtotime($olah->tanggal))}}</td>
				<td>{{$olah->karyawan->nama_depan.' '.$olah->karyawan->nama_belakang}}</td>
				<td>{{$olah->keterangan}}</td>
				<td></td>
				
			</tr>
			@empty
				<tr>
					<td align="center" colspan="6">Tidak Ada Data</td>
				</tr>
			@endforelse
		</tbody>
	</table>
</div>