<table class="table table-bordered">
	<thead>
		<tr>
			<td style="text-align: center; " >No</td>
			<td style="text-align: center; ">Kode Varian</td>
			<td style="text-align: center; ">Jenis</td>
			<td style="text-align: center; ">Rasa</td>
			<td style="text-align: center; ">Opsi</td>

		</tr>
	</thead>
	<tbody>
		<?php $i =0; ?>
		@forelse($data as $donat)
			<tr>
				<td align="center">{{$i+1}}</td>
				<td align="center">{{$donat->kode}}</td>
				<td align="center">{{$donat->jenis->nama}}</td>
				<td align="center">{{$donat->rasa}}</td>
				<td align="center">
					<a class="btn btn-danger btn-circle btn_hapus_donat" id='{{$donat->id}}'><i class="fa fa-trash"></i></a> 
					<a class="btn btn-primary btn-circle" data-toggle="modal" data-target="#modalDonat" href='{{url('donat/view').'/'.$donat->id}}'><i class="fa fa-search"></i></a> 

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