<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th style="text-align: center;">No</th>
				<th style="text-align: center;">Toko</th>
				<th style="text-align: center;">No Nota</th>
				<th style="text-align: center;">Tanggal</th>
				<th style="text-align: center;">Total Pembelian</th>
				<th style="text-align: center;">Keterangan</th>
				<th style="text-align: center;">Opsi</th>

			</tr>
		</thead>
		<tbody>
			<?php $i = 0; ?>
			@forelse($data as $beli_bahan)
				<tr>
					<td align="center" style="vertical-align: middle;">{{$i+1}}</td>
					<td align="center" style="vertical-align: middle;">{{$beli_bahan->toko->kode.' | '.$beli_bahan->toko->nama}}</td>
					<td align="center" style="vertical-align: middle;">
					<a href="{{url('beli_bahan/view').'/'.$beli_bahan->id}}" data-toggle="modal" data-target="#modalBeliBahan" title="Lihat Detile Pembelian">{{$beli_bahan->kode_beli}}</a>
					

					</td>
					<td align="center" style="vertical-align: middle;">{{date('d/m/Y', strtotime($beli_bahan->tanggal_beli))}}</td>
					<td align="center" style="vertical-align: middle;">
						<?php 
							$harga_total = 0;
							$data_detile = $beli_bahan->detile;

							foreach ($data_detile as $detile) {
								$harga_total = $harga_total+ ($detile->besaran * $detile->harga);
							}

							echo "Rp. ".number_format($harga_total).",-";

						?>
					</td>
					<td width="30%" align="center">{{$beli_bahan->keterangan}}</td>
					<td align="center"><a value="{{$beli_bahan->id}}"  class="btn btn-danger btn-circle btn_beli_bahan_hapus"><i class="fa fa-close"></i></a> <a href="{{url('beli_bahan/view').'/'.$beli_bahan->id}}" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#modalBeliBahan" title="Lihat Detile Pembelian"><i class="fa fa-search" ></i></a></td>
				</tr>
				<?php $i++; ?>
			@empty
				<tr>
					<td colspan="6" align="center">Tidak Ada Data</td>
				</tr>
			@endforelse
		</tbody>
	</table>
</div>
