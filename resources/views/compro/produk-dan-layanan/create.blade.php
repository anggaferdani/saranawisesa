@extends('templates.pages')
@section('title', 'Produk Dan Layanan')
@section('header')
<h1>Produk Dan Layanan</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Create</h4>
      </div>
      <div class="card-body">
        @if(auth()->user()->level == 'superadmin')
          <form method="POST" action="{{ route('compro.superadmin.produk-dan-layanan.store') }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @endif
        @if(auth()->user()->level == 'admin')
          <form method="POST" action="{{ route('compro.admin.produk-dan-layanan.store') }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @endif
          @csrf
          <div class="form-group">
            <label>Thumbnail</label>
            <input type="file" class="form-control" name="thumbnail" onchange="file(event)">
            @error('thumbnail')<div class="text-danger">{{ $message }}</div>@enderror
            <div><img src="" class="image" width="200px" alt=""></div>
          </div>
          <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" name="judul">
            @error('judul')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control ckeditor" name="deskripsi"></textarea>
            @error('deskripsi')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('compro.superadmin.produk-dan-layanan.index') }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('compro.admin.produk-dan-layanan.index') }}" class="btn btn-secondary">Back</a>
          @endif
          <button type="mit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection