@extends('templates.pages')
@section('title', 'Portofolio')
@section('header')
<h1>Portofolio</h1>
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
            <label>Judul</label>
            <input disabled type="text" class="form-control" name="judul" value="{{ $portofolio->judul }}">
            @error('judul')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Images</label>
            <input disabled type="file" class="form-control" name="images[]" onchange="file(event)" accept="image/*" multiple>
            <div>
              @foreach ($portofolio->portofolio_images as $portofolio_image)
              <div style="width: 200px; height: 150px; background: url({{ asset('compro/portofolio/image/'.$portofolio_image["image"]) }}); background-size: cover; background-repeat: no-repeat;"></div>
              @endforeach
            </div>
            @error('images[]')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input disabled type="text" class="form-control" name="alamat" value="{{ $portofolio->alamat }}">
            @error('alamat')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Isi</label>
            <textarea disabled class="form-control ckeditor" name="isi">{{ $portofolio->isi }}</textarea>
            @error('isi')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('compro.superadmin.portofolio.index') }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('compro.admin.portofolio.index') }}" class="btn btn-secondary">Back</a>
          @endif
        </form>
      </div>
    </div>
  </div>
</div>
@endsection