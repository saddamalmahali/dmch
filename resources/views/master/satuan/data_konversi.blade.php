<div class="row">
	
</div>
<div class="table-responsive">
	<table class="table table-bordered" style="padding: 0; margin: 0;">
		<thead>
			<tr>
				<th style="text-align: center;">No</th>
				<th style="text-align: center;">Satuan</th>
				<th style="text-align: center;">Nominal</th>
				<th style="text-align: center;">Hasil Satuan</th>
				<th style="text-align: center;">Nominal</th>
				<th style="text-align: center;">Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php $i =0; ?>
			@forelse($data as $konversi)
			<tr>
				<td align="center" style="vertical-align: middle;">{{$i+1}}</td>
				<td style="vertical-align: middle;" align="center">{{$konversi->satuan->alias}}</td>
				<td style="vertical-align: middle;" align="center">{{$konversi->nilai_satuan}}</td>
				<td style="vertical-align: middle;" align="center">{{$konversi->konversi->alias}}</td>
				<td style="vertical-align: middle;" align="center">{{$konversi->nilai_konversi}}</td>
				<td style="vertical-align: middle;" align="center"><a class="btn btn-primary btn-circle" href="{{url('konversi/update')."/".$konversi->id}}" data-toggle="modal" data-target="#modalKonversi"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger btn-circle" href="{{url('konversi/hapus')."/".$konversi->id}}"><i class="fa fa-trash"></i></a></td>
			</tr>
			<?php $i++; ?>
			@empty
			<tr>
				<td colspan="6" align="center">Tidak Ada Data</td>
			</tr>
			@endforelse
		</tbody>
	</table>	

	<div style="padding-top: 0; margin-top: 0;text-align: center;">{{ $data->links() }}</div>
</div>