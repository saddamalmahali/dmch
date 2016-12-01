<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Tambah Donat</h4>
</div>
<form id="form_tambah_donat" role="form">
<div class="modal-body">
    <div class="container-fluid">
    	<div class="col-md-12">
	    	{{ csrf_field() }}
			<div class="form-group">
				<label>Kode Jenis Donat</label>
				<select class="form-control" name="id_jenis">
					@forelse($data as $jenis_donat)
					<option value="{{$jenis_donat->id}}">{{$jenis_donat->kode.' | '.$jenis_donat->nama}}</option>
					@empty

					@endforelse
				</select>
			</div>
			<div class="form-group">
				<label>Kode Varian</label>
				<input type="text" id="input_donat_kode_varian" name="kode" placeholder="Input Nama Jenis" class="form-control" value="{{$kode_varian}}" readonly="true">
			</div>
			<div class="form-group">
				<label>Rasa</label>
				<input type="text" name="rasa" class="form-control" placeholder="Input Varian Rasa">
			</div>
	    </div>
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">
					Komposisi
						<a class="pull-right" id="tambah_komposisi"><i class="fa fa-plus"></i></a>
					</h3>
					
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dynamic_komposisi">
							<thead>
								<tr>
									<th style="text-align: center;">Nama Barang</th>
									<th style="text-align: center;">Opsi</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
    </div>
		
	
</div>
<div class="modal-footer">
	<input type="submit" class="btn btn-primary" value="Simpan" class="form-control"></submit>
</div>
</form>

<script type="text/javascript">
	$(document).ready(function(){
		var i = 0;
		var dynamic_form = $('table#dynamic_komposisi > tbody');

		$(document).on('click', 'a#tambah_komposisi', function(e){
			dynamic_form.append(
					"<tr id='data_komposisi_"+i+"'>"+
						"<td><select class='form-control' id='input_komposisi_"+i+"' name='list_komposisi["+i+"][id_bahan]'>@forelse($data_bahan as $bahan) <option value='{{$bahan->id}}'>{{$bahan->nama}}</option>@empty @endforelse</select></td>"+
						"<td align='center'><a class='btn btn-danger btn-circle btn_komposisi_remove' id='"+i+"'><i class='fa fa-close'></i></a></td>"+
					"</tr>"
				);

			i++;
		});

		$(document).on('click', '.btn_komposisi_remove', function(e){
			e.preventDefault();
			var row_id = $(this).attr('id');
			$('#data_komposisi_'+row_id).remove();
		});
	});
</script>