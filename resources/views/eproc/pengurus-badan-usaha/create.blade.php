@extends('templates.pages')
@section('title', 'Pengurus Badan Usaha')
@section('header')
<h1>Pengurus Badan Usaha</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Create</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('eproc.perusahaan.pengurus-badan-usaha.store', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="needs-validation" novalidate="">
          @csrf
          <div class="form-group">
            <label>Nama Pengurus Badan Usaha</label>
            <input type="text" class="form-control" name="nama_pengurus_badan_usaha">
            @error('nama_pengurus_badan_usaha')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>No. KTP/ Paspor/ Keterangan Domisili Tinggal</label>
            <input type="text" class="form-control" name="no_ktp_paspor_keterangan_domisili_tinggal">
            @error('no_ktp_paspor_keterangan_domisili_tinggal')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Jabatan</label>
            <select class="form-control select2" name="jabatan">
              <option selected disabled>Pilih</option>
              <option value="komisaris">Komisaris</option>
              <option value="direksi">Direksi</option>
            </select>
            @error('jabatan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Jabatan Pengurus Badan Usaha</label>
            <input type="text" class="form-control" name="jabatan_pengurus_badan_usaha">
            @error('jabatan_pengurus_badan_usaha')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <a href="{{ route('eproc.perusahaan.pengurus-badan-usaha.index', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary">Back</a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection