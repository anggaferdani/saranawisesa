@extends('templates.pages')
@section('title')
@section('header')
<h1>Edit Artikel</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Edit Artikel</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @if(auth()->user()->level == 'superadmin')
          <form method="POST" action="{{ route('compro.superadmin.artikel.update', $artikel->id) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @endif
        @if(auth()->user()->level == 'admin')
          <form method="POST" action="{{ route('compro.admin.artikel.update', $artikel->id) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @endif
        @if(auth()->user()->level == 'creator')
          <form method="POST" action="{{ route('compro.creator.artikel.update', $artikel->id) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @endif
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="judul_artikel">Judul Artikel</label>
            <input id="judul_artikel" type="text" class="form-control" name="judul_artikel" value="{{ $artikel->judul_artikel }}">
            @error('judul_artikel')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="thumbnail">Thumbnail</label>
            <input id="thumbnail" type="file" class="form-control" name="thumbnail" value="{{ $artikel->thumbnail }}" onchange="file(event)">
            @error('thumbnail')<div class="text-danger">{{ $message }}</div>@enderror
            <p><img src="/artikel/{{ $artikel->thumbnail }}" id="output" alt="" width="200px"></p>
          </div>
          <div class="form-group">
            <label for="tanggal_publikasi">Tanggal Publikasi</label>
            <input id="tanggal_publikasi" type="date" class="form-control" name="tanggal_publikasi" value="{{ $artikel->tanggal_publikasi }}">
            @error('tanggal_publikasi')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="isi_artikel">Isi Artikel</label>
            <textarea id="isi_artikel" class="form-control" name="isi_artikel">{{ $artikel->isi_artikel }}</textarea>
            @error('isi_artikel')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('compro.superadmin.artikel.index') }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('compro.admin.artikel.index') }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 'creator')
            <a href="{{ route('compro.creator.artikel.index') }}" class="btn btn-secondary">Back</a>
          @endif
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var file = function(event){
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  }
</script>
@endsection