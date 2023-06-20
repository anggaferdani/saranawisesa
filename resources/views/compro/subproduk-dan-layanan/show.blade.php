@extends('templates.pages')
@section('title', 'Subproduk Dan Layanan')
@section('header')
<h1>Subproduk Dan Layanan : {{ $produk_dan_layanan->judul }}</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Show</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="" class="needs-validation" enctype="multipart/form-data" novalidate="">
          @csrf
          <div class="form-group">
            <label>Thumbnail</label>
            <div><img src="{{ asset('compro/subproduk-dan-layanan/thumbnail/'.$subproduk_dan_layanan["thumbnail"]) }}" width="200px" alt=""></div>
          </div>
          <div class="form-group">
            <label>Judul</label>
            <input disabled type="text" class="form-control" name="judul" value="{{ $subproduk_dan_layanan->judul }}">
            @error('judul')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea disabled class="form-control ckeditor" name="deskripsi">{{ $subproduk_dan_layanan->deskripsi }}</textarea>
            @error('deskripsi')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('compro.superadmin.subproduk-dan-layanan.index', Crypt::encrypt($produk_dan_layanan->id)) }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('compro.admin.subproduk-dan-layanan.index', Crypt::encrypt($produk_dan_layanan->id)) }}" class="btn btn-secondary">Back</a>
          @endif
        </form>
      </div>
    </div>
  </div>
</div>
@endsection