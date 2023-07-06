@extends('templates.pages')
@section('title', 'Susunan Kepemilikan Saham')
@section('header')
<h1>Susunan Kepemilikan Saham</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Edit</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('eproc.perusahaan.susunan-kepemilikan-saham.update', ['user_id' => Crypt::encrypt(Auth::id()), 'id' => Crypt::encrypt($susunan_kepemilikan_saham->id)]) }}" class="needs-validation" novalidate="">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Nama Pemilik Saham</label>
            <input type="text" class="form-control" name="nama_pemilik_saham" value="{{ $susunan_kepemilikan_saham->nama_pemilik_saham }}">
          </div>
          <div class="form-group">
            <label>No. KTP/ Paspor/ Keterangan Domisili Tinggal Pemilik Saham</label>
            <input type="text" class="form-control" name="no_ktp_paspor_keterangan_domisili_tinggal_pemilik_saham" value="{{ $susunan_kepemilikan_saham->no_ktp_paspor_keterangan_domisili_tinggal_pemilik_saham }}">
          </div>
          <div class="form-group">
            <label>Alamat Pemilik Saham</label>
            <input type="text" class="form-control" name="alamat_pemilik_saham" value="{{ $susunan_kepemilikan_saham->alamat_pemilik_saham }}">
          </div>
          <div class="form-group">
            <label>Persentase Kepemilikan Saham</label>
            <input type="number" class="form-control" name="persentase_kepemilikan_saham" value="{{ $susunan_kepemilikan_saham->persentase_kepemilikan_saham }}">
          </div>
          <a href="{{ route('eproc.perusahaan.susunan-kepemilikan-saham.index', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary">Back</a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection