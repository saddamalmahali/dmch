<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th style="text-align: center;">No</th>
				<th style="text-align: center;">Toko</th>
				<th style="text-align: center;">No Nota</th>
				<th style="text-align: center;">Tanggal</th>
				<th style="text-align: center;">Keterangan</th>
				<th style="text-align: center;">Opsi</th>

			</tr>
		</thead>
		<tbody>
			<?php $i = 0; ?>
			@forelse($data as $pengeluaran)
				<tr>
					<td align="center" style="vertical-align: middle;">{{$i+1}}</td>
					<td align="center" style="vertical-align: middle;">{{$pengeluaran->toko->kode.' | '.$pengeluaran->toko->nama}}</td>
					<td align="center" style="vertical-align: middle;">{{$pengeluaran->kode}}</td>
					<td align="center" style="vertical-align: middle;">{{date('d/m/Y', strtotime($pengeluaran->tanggal))}}</td>
					
					<td width="30%" align="center">{{$pengeluaran->keterangan}}</td>
					<td align="center"><a value="{{$pengeluaran->id}}"  class="btn btn-danger btn-circle btn_pengeluaran_hapus"><i class="fa fa-close"></i></a> <a href="{{url('pengeluaran/view').'/'.$pengeluaran->id}}" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#modalPengeluaran" title="Lihat Detile Pengeluaran"><i class="fa fa-search" ></i></a></td>
				</tr>
				<?php $i++; ?>
			@empty
				<tr>
					<td colspan="7" align="center">Tidak Ada Data</td>
				</tr>
			@endforelse
		</tbody>
	</table>
</div>
