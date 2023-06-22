@extends('templates.pages')
@section('title', 'Akta Pendirian Perusahaan')
@section('header')
<h1>Akta Pendirian Perusahaan</h1>
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
            <label>No. Pengesahan</label>
            <input disabled type="number" class="form-control" name="no_pengesahan" value="{{ $akta_pendirian_perusahaan->no_pengesahan }}">
            @error('no_pengesahan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Tanggal Pengesahan</label>
            <input disabled type="date" class="form-control" name="tanggal_pengesahan" value="{{ $akta_pendirian_perusahaan->tanggal_pengesahan }}">
            @error('tanggal_pengesahan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Nama Notaris</label>
            <input disabled type="text" class="form-control" name="nama_notaris" value="{{ $akta_pendirian_perusahaan->nama_notaris }}">
            @error('nama_notaris')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <a href="{{ route('eproc.perusahaan.akta-pendirian-perusahaan.index', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary">Back</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection