
<style type="text/css">
	.loading {
		border: 16px solid #f3f3f3; /* Light grey */
	    border-top: 16px solid blue;
		 border-bottom: 16px solid blue;
	    border-radius: 50%;
	    width: 120px;
	    height: 120px;
	    animation: spin 2s linear infinite;
	}

	@keyframes spin {
	    0% { transform: rotate(0deg); }
	    100% { transform: rotate(360deg); }
	}
</style>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">Detile Olahan</h4>
</div>

<div class="modal-body">
  <div class="row">
    <section class="panel panel-primary">
      <div class="panel-body">
        <div class="col-md-12">
          <table class="table" style="padding:0; margin:0;">
            <tr>
              <td>Karyawan</td>
              <td> : </td>
              <td> {{$olah->karyawan->nama_depan.' '.$olah->karyawan->nama_belakang}} </td>
            </tr>
            <tr>
              <td>Kode Proses</td>
              <td> : </td>
              <td> {{$olah->kode}} </td>
            </tr>
            <tr>
              <td>Tanggal</td>
              <td> : </td>
              <td> {{date('d-m-Y', strtotime($olah->tanggal))}} </td>
            </tr>
            <tr>
              <td>Keterangan </td>
              <td> : </td>
              <td> {{$olah->keterangan}} </td>
            </tr>
            <tr>
              <td>Toko</td>
              <td> : </td>
              <td> {{$olah->toko->kode.' | '.$olah->toko->nama}} </td>
            </tr>
          </table>
        </div>
      </div>
    </section>
  </div>
  <div class="row">
    <section class="panel">
      <table class="table table-striped">
        <thead class="bg-primary">
          <tr>
            <th style="text-align:center;">No</th>
            <th style="text-align:center;">Jenis</th>
            <th style="text-align:center;">Varian</th>
            <th style="text-align:center;">Jumlah</th>
          </tr>
        </thead>
        <tbody >
          <?php $i = 0; ?>
          @forelse($list_detile as $detile)
            <tr>
              <td align="center">{{$i+1}}</td>
              <td align="center">{{$detile->varian->jenis->kode.' | '.$detile->varian->jenis->nama}}</td>
              <td align="center">{{$detile->varian->kode.' | '.$detile->varian->rasa}}</td>
              <td align="center">{{number_format($detile->jumlah)}}</td>
            </tr>
            <?php $i++; ?>
          @empty

          @endforelse
        </tbody>
      </table>
    </section>
  </div>
</div>
<div class="modal-footer">
	<input type="submit" data-dismiss="modal" class="btn btn-primary" value="Tutup" class="form-control"></submit>
</div>