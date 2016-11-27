<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr >
				<th style="vertical-align: middle;text-align: center;width: 10%;">No.</th>
				<th style="vertical-align: middle;text-align: center;width: 25%">Nama</th>
				<th style="vertical-align: middle;text-align: center;width: 25%;">Alamat</th>
				<th style="vertical-align: middle;text-align: center;">Tempat <br />& Tanggal Lahir</th>
				<th style="vertical-align: middle;text-align: center;width: 15%;">Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 0; ?>
			@forelse($data as $karyawan)
				<tr>
					<td>{{$i+1}}</td>
					<td>{{$karyawan->nama_depan." ".$karyawan->nama_belakang}}</td>
					<td>{{$karyawan->alamat}}</td>
					<td align="center">{{$karyawan->tempat_lahir.", ".date('d-M-Y', strtotime($karyawan->tanggal_lahir))}}</td>
					<td align="center"><a class="btn btn-circle btn-primary btn-xs" href="{{url('karyawan/update_form').'/'.$karyawan->id}}" data-toggle="modal" data-target="#modalKaryawan"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger btn-circle " href="{{url('karyawan/hapus').'/'.$karyawan->id}}" ><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php $i++; ?>
			@empty
				<tr>
					<td colspan="5" align="center">Tidak Ditemukan Data</td>
				</tr>
			@endforelse
		</tbody>
	</table>
	<div style="padding-top: 0; margin-top: 0;text-align: center;">{{ $data->links() }}</div>
</div>