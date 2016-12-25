@extends('layouts.main')

@section('content')
	<div class="row wrapper-content">
		<div class="col-md-12">
			<div class="ibox">
				<div class="ibox-title">
					<h5>Data Pengeluaran</h5>
					<div class="ibox-tools">
		                
		                <a id="tambah_pengeluaran_btn" href="{{url('pengeluaran/tambah_dialog')}}" data-toggle="modal" data-target="#modalPengeluaran" title="Tambah Pengeluaran"><i class="fa fa-plus"></i></a>

					</div>
				</div>
				<div class="ibox-content">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h5 class="panel-title">
										

										<a data-toggle="collapse" href="#collapse_panel" >
											Filter Data
										</a>
									</h5>
									
								</div>
								<form id="form_filter_index_pengeluaran">
									<fieldset>
										<div id="collapse_panel" class="panel-collapse collapse">
											<div class="panel-body">
											
												<div class="row">
													<div class="col-md-8">
														<div class="form-group">
															<label for="id_jenis">Jenis Pengeluaran</label>
															<select name="id_jenis" class="form-control" >
																<option value="" disabled selected>Pilih Jenis Pengeluaran</option>
																@forelse ($data_jenis as $jenis)
																	<option value="{{$jenis->id}}">{{$jenis->nama_jenis}}</option>
																@empty
																	
																@endforelse
															</select> 
														</div>
														<div class="form-group">
															<label >Tanggal Pengeluaran</label>
															<input type="month" name="tanggal" class="form-control" placeholder="Pilih Tanggal">
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
															<label for="id_jenis">Jenis Pembayaran</label>
															<div class="i-checks"><label> <input type="radio" value="tunai" name="jenis_pembayaran" id="input_jenis_pembayaran_pengeluaran"> <i></i> Tunai </label></div>
															<div class="i-checks"><label> <input type="radio" value="bank" name="jenis_pembayaran" id="input_jenis_pembayaran_pengeluaran"> <i></i> Bank </label>
														</div>
														
													</div>
												</div>
												
											</div>
											<div class="panel-footer">
												<div class="row">
													<div class="col-md-12">
														<input type="submit" value="Filter" class="pull-right btn btn-success btn-sm"> <i class="pull-right"> &nbsp;</i>
														<a class="btn btn-danger btn-sm pull-right" id="btn_reset_form_filter_pengeluaran">Reset</a>
													</div>
													
													
												</div>
											</div>
										</div>
										
									</fieldset>
								</form>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div id="tableContainer">
								<div id="pengeluaranContainerTable"></div>
							</div>
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<div class="modal inmodal" id="modalPengeluaran" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="modal-dialog modal-lg">
	    <div class="modal-content animated bounceInRight">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

	                <h4 class="modal-title"></h4>
	            </div>
	            <div class="modal-body">
	                
	            </div>
	            
	        </div>
	    </div>
	</div>
	<script> 
		$(document).ready(function(){
			$('.i-checks').iCheck({
				checkboxClass: 'icheckbox_square-green',
				radioClass: 'iradio_square-green',
			});
		});
	</script>
@endsection