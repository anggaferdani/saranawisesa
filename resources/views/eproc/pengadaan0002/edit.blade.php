@extends('templates.pages')
@section('title', 'Pengadaan')
@section('header')
<h1>Pengadaan</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Edit</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('eproc.perusahaan.pengadaan.update', Crypt::encrypt($lelang->id)) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
          @csrf
          @method('PUT')
          @if($lelang->lampiran_pengadaan == 'penawaran')
            <div class="form-group">
              <label>Penawaran</label>
              <input type="file" class="form-control" name="penawaran" value="{{ $lampiran->penawaran }}">
              <a href="{{ asset('eproc/lampiran/penawaran/'.$lampiran['penawaran']) }}" target="_blank">{{ $lampiran->penawaran }}</a>
              @error('penawaran')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
          @endif
          @if($lelang->lampiran_pengadaan == 'konsep')
            <div class="form-group">
              <label>Konsep</label>
              <input type="file" class="form-control" name="konsep" value="{{ $lampiran->konsep }}">
              <a href="{{ asset('eproc/lampiran/konsep/'.$lampiran['konsep']) }}" target="_blank">{{ $lampiran->konsep }}</a>
              @error('konsep')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
          @endif
          @if($lelang->lampiran_pengadaan == 'penawaran dan konsep')
            <div class="form-group">
              <label>Penawaran Dan Konsep</label>
              <input type="file" class="form-control" name="penawaran_dan_konsep" value="{{ $lampiran->penawaran_dan_konsep }}">
              <a href="{{ asset('eproc/lampiran/penawaran-dan-konsep/'.$lampiran['penawaran_dan_konsep']) }}" target="_blank">{{ $lampiran->penawaran_dan_konsep }}</a>
              @error('penawaran_dan_konsep')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
          @endif
          <a href="{{ route('eproc.perusahaan.pengadaan.index') }}" class="btn btn-secondary">Back</a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection