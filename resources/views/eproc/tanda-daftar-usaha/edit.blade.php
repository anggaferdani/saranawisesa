@extends('templates.pages')
@section('title', 'Tanda Daftar Usaha')
@section('header')
<h1>Tanda Daftar Usaha</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">

    @if(Session::get('success'))
      <div class="alert alert-primary">{{ Session::get('success') }}</div>
    @endif

    @if(Session::get('fail'))
      <div class="alert alert-danger">{{ Session::get('fail') }}</div>
    @endif
    
    <div class="card">
      @include('eproc.menu')
    </div>
    
    <div class="card">
      <div class="card-header">
        <h4>Edit</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('eproc.perusahaan.tanda-daftar-usaha.update', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Masa Berlaku Izin Usaha</label>
            <input type="text" class="form-control" name="masa_berlaku_izin_usaha" value="{{ $tanda_daftar_usaha->masa_berlaku_izin_usaha }}">
            @error('masa_berlaku_izin_usaha')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Instansi Izin Usaha</label>
            <input type="text" class="form-control" name="instansi_pemberi_izin_usaha" value="{{ $tanda_daftar_usaha->instansi_pemberi_izin_usaha }}">
            @error('instansi_pemberi_izin_usaha')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>No. Tanda Daftar Usaha</label>
            <input type="number" class="form-control" name="no_tanda_daftar_usaha" value="{{ $tanda_daftar_usaha->no_tanda_daftar_usaha }}">
            @error('no_tanda_daftar_usaha')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Kualifikasi Usaha</label>
            <input type="text" class="form-control" name="kualifikasi_usaha" value="{{ $tanda_daftar_usaha->kualifikasi_usaha }}">
            @error('kualifikasi_usaha')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Klasifikasi Usaha</label>
            <input type="text" class="form-control" name="klasifikasi_usaha" value="{{ $tanda_daftar_usaha->klasifikasi_usaha }}">
            @error('klasifikasi_usaha')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection