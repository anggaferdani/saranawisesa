@extends('templates.pages')
@section('title', 'Data Fasilitas')
@section('header')
<h1>Data Fasilitas</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Edit</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('eproc.perusahaan.data-fasilitas.update', ['user_id' => Crypt::encrypt(Auth::id()), 'id' => Crypt::encrypt($data_fasilitas->id)]) }}" class="needs-validation" novalidate="">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Jenis</label>
            <input type="text" class="form-control" name="jenis" value="{{ $data_fasilitas->jenis }}">
          </div>
          <div class="form-group">
            <label>Jumlah</label>
            <input type="text" class="form-control" name="jumlah" value="{{ $data_fasilitas->jumlah }}">
          </div>
          <div class="form-group">
            <label>Kapasitas Pada Saat Ini</label>
            <input type="text" class="form-control" name="kapasitas_pada_saat_ini" value="{{ $data_fasilitas->kapasitas_pada_saat_ini }}">
          </div>
          <div class="form-group">
            <label>Merek Dan Tipe</label>
            <input type="text" class="form-control" name="merek_dan_tipe" value="{{ $data_fasilitas->merek_dan_tipe }}">
          </div>
          <div class="form-group">
            <label>Tahun Pembuatan</label>
            <input type="number" class="form-control" name="tahun_pembuatan" value="{{ $data_fasilitas->tahun_pembuatan }}">
          </div>
          <div class="form-group">
            <label>Kondisi</label>
            <input type="text" class="form-control" name="kondisi" value="{{ $data_fasilitas->kondisi }}">
          </div>
          <div class="form-group">
            <label>Lokasi</label>
            <input type="text" class="form-control" name="lokasi" value="{{ $data_fasilitas->lokasi }}">
          </div>
          <a href="{{ route('eproc.perusahaan.data-fasilitas.index', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary">Back</a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection