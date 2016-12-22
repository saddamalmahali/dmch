<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Detail Penjualan</h4>
</div>
<form id="form_penjualan_tambah" role="form">
<div class="modal-body">
    
	{{ csrf_field() }}
	<div class="row">

		<div class="col-md-4">
			
			
			<div class="ibox-content">
				<div class="table-responsive">
                                <table class="table shoping-cart-table">

                                    <tbody>
                                    <tr>
                                        
                                        <td class="desc">
                                            <h4>
                                            <a href="#" class="text-navy">
                                                {{$penjualan->toko->nama .'('.$penjualan->toko->kode.')'}}
                                            </a>
                                            </h4>
                                            <p class="small">
                                                {{$penjualan->toko->alamat}} <br />
												{{$penjualan->toko->kecamatan}} <br />
												
                                            </p>

											<p>
												<b>Tanggal Penjualan<b><br />
												<span class="label label-primary">{{$penjualan->tanggal_penjualan}}</span>
											</p>
											
											<br />
											<p>
												<h3>Total : <span class="pull-right">Rp. {{number_format($total_penjualan)}},-</span></h3>
											</p>
											
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
			</div>		
		</div>
		<div class="col-md-8">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h2 class="panel-title">
						Data Detile Penjualan
						
					</h2>

				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th rowspan="2" style="text-align: center; vertical-align: middle;">No</th>
									<th rowspan="2" style="text-align: center; vertical-align: middle;">Keterangan</th>
									<th colspan="2" style="text-align: center; vertical-align: middle;">Banyak</th>
									<th rowspan="2" style="text-align: center; vertical-align: middle;">Jumlah</th>
								</tr>
								<tr>
									<th style="text-align: center; vertical-align: middle;">Banyak</th>
									<th style="text-align: center; vertical-align: middle;">Satuan</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=0; ?>
								@forelse($list_detile as $detile)
								<tr>
									<td align="center">{{$i+1}}</td>
									<td align="center">
										<?php
											if($detile->jenis =='pokok'){
												$donat = $detile->JenisDonat;
												echo $donat->nama." (".$detile->satuan->nama.")";
											}else if($detile->jenis == 'umum'){
												echo $detile->barang->nama;
											}
										?>

									</td>
									<td align="center">{{$detile->banyak}}</td>
									<td align="center">{{$detile->satuan->alias}}</td>
									<td align="center">Rp. {{number_format($detile->jumlah)}},-</td>
								</tr>
								<?php $i++; ?>
								@empty

								@endforelse
							</tbody>
						</table>
					</div>
					
				</div>
			</div>
		</div>
	</div>
		
	
</div>
<div class="modal-footer">
	<input  class="btn btn-primary" value="Tutup" class="form-control" data-dismiss='modal'></submit>
</div>
</form>

