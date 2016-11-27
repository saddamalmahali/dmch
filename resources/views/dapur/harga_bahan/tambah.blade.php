

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Tambah Harga Bahan</h4>
</div>
<form id="form_harga_barang" role="form">
<div class="modal-body">
    
	{{ csrf_field() }}
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Kode Bahan</label>
				<input type="text" id="kode_bahan" name="kode" placeholder="Input Kode Bahan" class="form-control">
			</div>
			<div class="form-group">
				<label>Bahan</label>
				<input type="text" id="id_bahan_input" name="id_barang" class="form-control" placeholder="Cari Bahan">
			</div>
			<div class="form-group">
				<label>Satuan</label>
				<input type="text" id="id_satuan_input" name="id_satuan" class="form-control" placeholder="Cari Satuan">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Harga</label>
				<input type="number" id="harga_bahan_input" name="harga" class="form-control" placeholder="Harga">
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<textarea rows="4" id="keterangan_dapur_input" name="keterangan" placeholder="Masukan Keterangan" class="form-control"></textarea>
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
		$('#id_bahan_input').autocomplete({
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
				
				$('input#id_bahan_input').attr('value', ui.item.id);
				
			}
		});

		$('#id_satuan_input').autocomplete({
			source : function(request, response){
				$.ajax({
					url : 'dapur/list_satuan',
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
		                        label: entry.id+' | '+entry.nama
		                    };
		                    newArray[i] = newObject;
		                    i++;
		                });

		                response(newArray);
					}
					

				});
			},
			select : function(evt, ui){
				$('input#id_satuan_input').attr('value', ui.item.id);

				console.log(ui.item.id);
			}
		});

		$( "#id_satuan_input" ).autocomplete( "option", "appendTo", "#form_harga_barang" );
		$( "#id_bahan_input" ).autocomplete( "option", "appendTo", "#form_harga_barang" );
	});
</script>
