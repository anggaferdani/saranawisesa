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
        <h4>Edit</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('eproc.perusahaan.pengurus-badan-usaha.update', ['user_id' => Crypt::encrypt(Auth::id()), 'id' => Crypt::encrypt($pengurus_badan_usaha->id)]) }}" class="needs-validation" novalidate="">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Nama Pengurus Badan Usaha</label>
            <input type="text" class="form-control" name="nama_pengurus_badan_usaha" value="{{ $pengurus_badan_usaha->nama_pengurus_badan_usaha }}">
            @error('nama_pengurus_badan_usaha')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>No. KTP/ Paspor/ Keterangan Domisili Tinggal</label>
            <input type="text" class="form-control" name="no_ktp_paspor_keterangan_domisili_tinggal" value="{{ $pengurus_badan_usaha->no_ktp_paspor_keterangan_domisili_tinggal }}">
            @error('no_ktp_paspor_keterangan_domisili_tinggal')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Jabatan</label>
            <select class="form-control select2" name="jabatan">
              <option selected disabled>Pilih</option>
              <option value="komisaris" @if($pengurus_badan_usaha->jabatan == 'komisaris')@selected(true)@endif>komisaris</option>
              <option value="direksi" @if($pengurus_badan_usaha->jabatan == 'direksi')@selected(true)@endif>direksi</option>
            </select>
            @error('jabatan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Jabatan Pengurus Badan Usaha</label>
            <input type="text" class="form-control" name="jabatan_pengurus_badan_usaha" value="{{ $pengurus_badan_usaha->jabatan_pengurus_badan_usaha }}">
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