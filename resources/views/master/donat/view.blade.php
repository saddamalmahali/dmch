<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Detail Varian</h4>
</div>
<form id="form_tambah_donat" role="form">
<div class="modal-body">
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-5">
    			<div class="panel panel-primary">
    				<table class="table table-border">
	    				<tr>
	    					<td>Jenis</td>
	    					<td>:</td>
	    					<td>{{$donat->jenis->nama}}</td>
	    				</tr>
	    				<tr>
	    					<td>Kode</td>
	    					<td>:</td>
	    					<td><span class="label label-primary">{{$donat->kode}}</span></td>
	    				</tr>
	    				<tr>
	    					<td>Nama</td>
	    					<td>:</td>
	    					<td>{{$donat->rasa}}</td>
	    				</tr>
	    			</table>
    			</div>
    		</div>
    		<div class="col-md-7">
    			<div class="panel panel-warning">
    				<table class="table table-border">
	    				<tr>
	    					<td colspan="3" align="center"><b>Komposisi</b></td>
	    				</tr>
	    				<?php $i=0; ?>
	    				@forelse($data_komposisi as $komposisi)
						<tr>
							<td>{{$i+1}}</td>
							<td>{{$komposisi->bahan->nama}}</td>
							<td>{{number_format($komposisi->kuantitas).''.$komposisi->satuan->alias}}</td>

						</tr>
						<?php $i++; ?>
	    				@empty
						<tr>
							<td colspan="3">Tidak Ada Komposisi</td>
						</tr>
	    				@endforelse
	    			</table>
    			</div>
    		</div>

    	</div>
    </div>
		
	
</div>
<div class="modal-footer">
	<button data-dismiss="modal" class="btn btn-primary btn-sm">Tutup</button>
</div>
</form>
