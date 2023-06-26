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
        <h4>Show</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="" class="needs-validation" novalidate="">
          @csrf
          <div class="form-group">
            <label>Nama</label>
            <input disabled type="text" class="form-control" name="nama" value="{{ $data_personalia->nama }}">
          </div>
          <div class="form-group">
            <label>Tanggal Lahir</label>
            <input disabled type="date" class="form-control" name="tanggal_lahir" value="{{ $data_personalia->tanggal_lahir }}">
          </div>
          <div class="form-group">
            <label>Jabatan</label>
            <input disabled type="text" class="form-control" name="jabatan" value="{{ $data_personalia->jabatan }}">
          </div>
          <div class="form-group">
            <label>Pengalaman Kerja</label>
            <input disabled type="text" class="form-control" name="pengalaman_kerja" value="{{ $data_personalia->pengalaman_kerja }}">
          </div>
          <div class="form-group">
            <label>Profesi Keahlian</label>
            <input disabled type="text" class="form-control" name="profesi_keahlian" value="{{ $data_personalia->profesi_keahlian }}">
          </div>
          <div class="form-group">
            <label>Tahun Sertifikat Ijazah</label>
            <input disabled type="text" class="form-control" name="tahun_sertifikat_ijazah" value="{{ $data_personalia->tahun_sertifikat_ijazah }}">
          </div>
          <a href="{{ route('eproc.perusahaan.data-personalia.index', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary">Back</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection