@extends('templates.pages')
@section('title', 'Portofolio')
@section('header')
<h1>Portofolio</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    @if(Session::get('success'))
      <div class="alert alert-danger">{{ Session::get('success') }}</div>
    @endif
    <div class="card">
      <div class="card-header">
        <h4>Edit</h4>
      </div>
      <div class="card-body">
        @if(auth()->user()->level == 'superadmin')
          <form method="POST" action="{{ route('compro.superadmin.portofolio.update', Crypt::encrypt($portofolio->id)) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @endif
        @if(auth()->user()->level == 'admin')
          <form method="POST" action="{{ route('compro.admin.portofolio.update', Crypt::encrypt($portofolio->id)) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @endif
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" name="judul" value="{{ $portofolio->judul }}">
            @error('judul')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Images</label>
            <div class="input-images mb-3"></div>
            <div class="image-uploader">
              <div class="uploaded">
                @foreach($portofolio->portofolio_images as $image)
                  <div class="uploaded-image">
                    <img src="{{ asset('compro/portofolio/image/'.$image["image"]) }}" alt="">
                    <div class="delete-image"><a href="{{ route('compro.superadmin.portofolio.delete-image', Crypt::encrypt($image->id)) }}"><div class="iui-close text-white"></div></a></div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
          {{-- <div class="form-group">
            <label for="">Images</label>
            <input type="file" class="form-control multiple-image" onchange="preview(this)" name="images[]" accept="image/*" multiple>
            <div class="preview-area"></div>
            <div class="card2">
              @foreach($portofolio->portofolio_images as $image)
                <div style="width: 250px; height: 200px; background-image: url({{ asset('compro/portofolio/image/'.$image["image"]) }}); background-position: center; object-fit: cover; margin-bottom: 1%; padding: 1%;">
                  @if(auth()->user()->level == 'superadmin')
                    <a href="{{ route('compro.superadmin.portofolio.delete-image', Crypt::encrypt($image->id)) }}" class="text-white"><i class="fas fa-times"></i></a>
                  @elseif(auth()->user()->level == 'admin')
                    <a href="{{ route('compro.admin.portofolio.delete-image', Crypt::encrypt($image->id)) }}" class="text-white"><i class="fas fa-times"></i></a>
                  @endif
                </div>
              @endforeach
            </div>
            @error('image[]')<div class="text-danger">{{ $message }}</div>@enderror
          </div> --}}
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" name="alamat" value="{{ $portofolio->alamat }}">
            @error('alamat')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Isi</label>
            <textarea class="form-control ckeditor" name="isi">{{ $portofolio->isi }}</textarea>
            @error('isi')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('compro.superadmin.portofolio.index') }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('compro.admin.portofolio.index') }}" class="btn btn-secondary">Back</a>
          @endif
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection