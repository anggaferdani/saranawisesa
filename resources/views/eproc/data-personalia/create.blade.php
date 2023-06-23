@extends('templates.pages')
@section('title', 'Data Personalia')
@section('header')
<h1>Data Personalia</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Create</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('eproc.perusahaan.data-personalia.store', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="needs-validation" novalidate="">
          @csrf
          <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama">
          </div>
          <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggal_lahir">
          </div>
          <div class="form-group">
            <label>Jabatan</label>
            <input type="text" class="form-control" name="jabatan">
          </div>
          <div class="form-group">
            <label>Pengalaman Kerja</label>
            <input type="text" class="form-control" name="pengalaman_kerja">
          </div>
          <div class="form-group">
            <label>Profesi Keahlian</label>
            <input type="text" class="form-control" name="profesi_keahlian">
          </div>
          <div class="form-group">
            <label>Tahun Sertifikat Ijazah</label>
            <input type="text" class="form-control" name="tahun_sertifikat_ijazah">
          </div>
          <a href="{{ route('eproc.perusahaan.data-personalia.index', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary">Back</a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection