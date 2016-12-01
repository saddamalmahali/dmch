

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Tambah Harga Bahan</h4>
</div>
<form id="form_beli_bahan" role="form">
<div class="modal-body">
    
	{{ csrf_field() }}
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label>Toko</label>
				<select id="input_id_toko" name="id_toko" class="form-control">
					<option value="">Pilih Peruntukan Toko</option>
					@forelse($data_toko as $toko)
						<option value="{{$toko->id}}">{{$toko->kode.' | '.$toko->nama}}</option>
					@empty

					@endforelse
				</select>
			</div>
			<div class="form-group">
				<label>No. Nota</label>
				<input type="text" id="kode_beli_bahan_input" name="kode_beli" placeholder="Input Kode Bahan" class="form-control">
			</div>
			
			<div class="form-group">
				<label>Tanggal</label>
				<input type="date" id="tanggal_beli_bahan_input" name="tanggal_beli" class="form-control" placeholder="Cari Bahan">
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<textarea rows="4" id="keterangan_dapur_input" name="keterangan" placeholder="Masukan Keterangan" class="form-control"></textarea>
			</div>
		</div>
		<div class="col-md-8">
			<div class="ibox">
				<div class="ibox-title">
					<h5>Data Detail Pembelian</h5>
					<div class="ibox-tools">
						
					</div>
				</div>
				<div class="ibox-content">
					<div class='page-header' style="vertical-align: middle;">
					  <div class='btn-toolbar pull-right'>
					    <div class='btn-group'>
					      <a class="btn btn-primary btn-sm pull-right" id="tambah_detile_bahan"><i class="fa fa-plus"></i>&nbsp; Tambah Bahan</a>
					    </div>
					  </div>
					  <h2 >Detail Pembelian</h2>
					</div>
					<div class="table-responsive">
						<table class="table table-bordered" id="dynamic_detile_bahan">
							<thead>
								<tr>
									<th width="30%" style="text-align: center;">Barang</th>
									<th width="20%" style="text-align: center;">Banyak</th>
									<th width="10%" style="text-align: center;">Satuan</th>
									<th style="text-align: center;">Harga</th>
									<th width="10%" style="text-align: center;">Opsi</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
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
		var dynamic_form = $('table#dynamic_detile_bahan > tbody');
		var count_data = $('table#dynamic_detile_bahan > tbody > tr');
		$(document).on('click', 'a#tambah_detile_bahan', function(e){

			dynamic_form.append(
					"<tr id='detile_beli_"+i+"'>"+
						"<td><input type='text' class='form-control' id='input_id_barang_"+i+"' name='detile_beli["+i+"][id_barang]'></td>"+
						"<td><input type='number' class='form-control' name='detile_beli["+i+"][besaran]'></td>"+
						"<td><input type='text' class='form-control' id='input_id_satuan_"+i+"'  name='detile_beli["+i+"][id_satuan]'></td>"+
						"<td><input type='number' class='form-control' name='detile_beli["+i+"][harga]'></td>"+
						"<td><a id="+i+" class='btn btn-danger btn-circle btn_detile_beli_remove' ><i class='fa fa-close'></i></a></td>"+
						
					"</tr>"
					);
			$("#input_id_barang_"+i+"").autocomplete({
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
					
					$("#input_id_barang_"+i+"").attr('value', ui.item.id);
					
				}
			});

			$('#input_id_satuan_'+i).autocomplete({
				source : function(request, response){
					$.ajax({
						url : 'beli_bahan/list_satuan',
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
					$('#input_id_satuan_'+i+'').attr('value', ui.item.id);

					console.log(ui.item.id);
				}
			});

			$( "#input_id_barang_"+i+"" ).autocomplete( "option", "appendTo", "#form_beli_bahan" );
			$( "#input_id_satuan_"+i+"" ).autocomplete( "option", "appendTo", "#form_beli_bahan" );
			i++;
		});

		$(document).on('click', '.btn_detile_beli_remove', function(e){
			e.preventDefault();
			var row_id = $(this).attr('id');
			$('#detile_beli_'+row_id+'').remove();
		});

		
		
	});
	// $(document).ready(function(){
	// 	$('#id_bahan_input').autocomplete({
	// 		source : function(request, response){
	// 			$.ajax({
	// 				url : 'dapur/list_bahan',
	// 				method : 'post',
	// 				datatype : 'jsonp',
	// 				data : {term : request.term},
	// 				success : function(data){
	// 					var parsed = JSON.parse(data);
	// 	                var newArray = new Array(parsed.length);
	// 	                var i = 0;

	// 	                parsed.forEach(function (entry) {
	// 	                    var newObject = {
	// 	                    	id : entry.id,
	// 	                        label: entry.nama
	// 	                    };
	// 	                    newArray[i] = newObject;
	// 	                    i++;
	// 	                });

	// 	                response(newArray);
	// 				},
					
	// 			});
	// 		},
	// 		select : function(evt, ui){
	// 			console.log(evt);
				
	// 			$('input#id_bahan_input').attr('value', ui.item.id);
				
	// 		}
	// 	});

	// 	$('#id_satuan_input').autocomplete({
	// 		source : function(request, response){
	// 			$.ajax({
	// 				url : 'dapur/list_satuan',
	// 				method : 'post',
	// 				datatype : 'jsonp',
	// 				data : {term : request.term},
	// 				success : function(data){
	// 					var parsed = JSON.parse(data);
	// 	                var newArray = new Array(parsed.length);
	// 	                var i = 0;

	// 	                parsed.forEach(function (entry) {
	// 	                    var newObject = {
	// 	                    	id : entry.id,
	// 	                        label: entry.id+' | '+entry.nama
	// 	                    };
	// 	                    newArray[i] = newObject;
	// 	                    i++;
	// 	                });

	// 	                response(newArray);
	// 				}
					

	// 			});
	// 		},
	// 		select : function(evt, ui){
	// 			$('input#id_satuan_input').attr('value', ui.item.id);

	// 			console.log(ui.item.id);
	// 		}
	// 	});

	// 	$( "#id_satuan_input" ).autocomplete( "option", "appendTo", "#form_harga_barang" );
	// 	$( "#id_bahan_input" ).autocomplete( "option", "appendTo", "#form_harga_barang" );
	// });
</script>
