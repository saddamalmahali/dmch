@forelse ($data as $varian)
    <option value="{{$varian->id}}">{{$varian->jenis->nama.' | '.$varian->kode}}</option>
@empty
    <option>Data Kosong</option>
@endforelse