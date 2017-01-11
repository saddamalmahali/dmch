@extends('layouts.main')

@section('content')
<div class="container-fluid wrapper-content">
	<div class="row">
		<div class="col-md-8">
			<div class="ibox">
				<div class="ibox-title">
					<h5>List Data Olahan</h5>
					<div class="ibox-tools">
						<a class="collapse-link">
		                    <i class="fa fa-chevron-up"></i>
		                </a>

		                <a id="tambah_barang_btn" href="{{url('index_olah/tambah_dialog')}}" data-toggle="modal" data-target="#modalOlah" title="Tambah Data Olah"><i class="fa fa-plus"></i></a>
										
					</div>

				</div>
				<div class="ibox-content">
					<div class="row">
						<div class="col-md-6">
							<div class='panel'>			
								<form class="form-inline" id="form_filter_olah">
									<div class="input-group">
										<input type="date" class="input-sm form-control" id='input_filter_tanggal' name="tanggal" placeholder="Tanggal">
										<span class="input-group-btn">
											<input type='submit' class="btn btn-sm btn-primary">
										</span>
									</div>				
								</form>
							</div>
						</div>
					</div>
					<div id="tableContainer">
						<div id="olahContainerTable">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal inmodal" id="modalOlah" tabindex="-1" role="dialog" aria-hidden="true">
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
	
</script>
@endsection
