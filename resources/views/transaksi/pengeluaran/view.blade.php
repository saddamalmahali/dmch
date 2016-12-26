



<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Detile Pengeluaran : #{{$pengeluaran->kode}}</h4>
</div>
<?php $jumlah =0; ?>
<div class="modal-body">
    <div class="row">
    	<div class="col-md-4">
    		<div class="ibox">
    			<div class="ibox-title">
    				<h5>Deskripsi Pembelian</h5>
    			</div>
    			<div class="ibox-content">
    				<table class="table table-bordered">
    					<tr>
    						<td>Kode Pembelian</td>
    						<td>:</td>
    						<td><span class="label label-primary">{{$pengeluaran->kode}}</span></td>    						
    					</tr>
    					<tr>
    						<td>Tanggal Pembelian</td>
    						<td>:</td>
    						<td>{{date('d/m/Y', strtotime($pengeluaran->tanggal))}}</td>    						
    					</tr>
    					<tr>
    						<td>Keterangan</td>
    						<td>:</td>
    						<td>{{$pengeluaran->keterangan}}</td>    						
    					</tr>
    				</table>
    			</div>
    		</div>

    	</div>
    	<div class="col-md-8">
    		<div class="panel panel-info">
    			<div class="panel-heading">
    				<h5>Detail Bahan Yang Dibeli</h5>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-bordered">
							<thead>
								<tr>
									<th style="text-align: center;">No</th>
									<th style="text-align: center;">Nama Barang</th>
									<th style="text-align: center;">Banyak</th>
									<th style="text-align: center;">Harga</th>
									<th style="text-align: center;">Jumlah</th>
									
								</tr>
							</thead>
							<tbody>
								<?php $i = 0; ?>
								@forelse($data as $detile)
									<tr>
										<td align="center">{{$i+1}}</td>
										<td>{{$detile->barang->nama}}</td>
										<td align="center">{{number_format($detile->kuantitas).' '.$detile->satuan->alias}}</td>
										<td align="center">Rp. {{ number_format($detile->harga) }},-</td>
										<td align="center">Rp. {{ number_format($detile->kuantitas*$detile->harga) }},-</td>
									</tr>
									<?php $i++; $jumlah = $jumlah+($detile->kuantitas*$detile->harga); ?>
								@empty

								@endforelse
							</tbody>
						</table>
    				</div>
					<h3 class="pull-right">Jumlah Pembelian : <b>Rp.{{number_format($jumlah)}},-</b></h3>
    			</div>
    		</div>	
    	</div>
    </div>	
	
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
</div>
