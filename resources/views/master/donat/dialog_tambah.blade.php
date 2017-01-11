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
									<th style="text-align: center;">Kuantitas</th>
									<th style="text-align: center;">Satuan</th>
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
						"<td><input type='text' class='form-control' id='input_id_bahan_"+i+"' name='list_komposisi["+i+"][id_bahan]'></td>"+
						"<td><input class='form-control' id='input_kuantitas_"+i+"' name='list_komposisi["+i+"][kuantitas]'></td>"+
						"<td><input type='text' class='form-control' id='input_id_satuan_"+i+"'  name='list_komposisi["+i+"][id_satuan]'></td>"+
						"<td align='center'><a class='btn btn-danger btn-circle btn_komposisi_remove' id='"+i+"'><i class='fa fa-close'></i></a></td>"+
					"</tr>"
				);
			
			$("#input_id_bahan_"+i+"").autocomplete({
				source : function(request, response){
					$.ajax({
						url : 'dapur/list_bahan',
						method : 'post',
						datatype : 'jsonp',
						data : {term : request.term},
						success : function(data){
							var parsed = JSON.parse(data);
			                var newArray = new Array(parsed.length);
			                var i = 0;

			                parsed.forEach(function (entry) {
			                    var newObject = {
			                    	id : entry.id,
			                        label: entry.nama
			                    };
			                    newArray[i] = newObject;
			                    i++;
			                });

			                response(newArray);
						},
						
					});
				},
				select : function(evt, ui){
					console.log(evt);
					
					$("#input_id_bahan_"+i+"").val(ui.item.id);
					
				}
			});

			$('#input_id_satuan_'+i).autocomplete({
				source : function(request, response){
					$.ajax({
						url : 'pengeluaran/list_satuan',
						method : 'post',
						datatype : 'jsonp',
						data : {term : request.term},
						success : function(data){
							var parsed = JSON.parse(data);
			                var newArray = new Array(parsed.length);
			                var i = 0;

			                parsed.forEach(function (entry) {
			                    var newObject = {
			                    	id : entry.id,
			                        label: entry.alias
			                    };
			                    newArray[i] = newObject;
			                    i++;
			                });

			                response(newArray);
						}
						

					});
				},
				select : function(evt, ui){
					$('#input_id_satuan_'+i+'').val(ui.item.id);

					console.log(ui.item.id);
				}
			});

			$( "#input_id_bahan_"+i+"" ).autocomplete( "option", "appendTo", "#form_tambah_donat" );
			$( "#input_id_satuan_"+i+"" ).autocomplete( "option", "appendTo", "#form_tambah_donat" );
			i++;
		});

		

		$(document).on('click', '.btn_komposisi_remove', function(e){
			e.preventDefault();
			var row_id = $(this).attr('id');
			$('#data_komposisi_'+row_id).remove();
		});
	});
</script>