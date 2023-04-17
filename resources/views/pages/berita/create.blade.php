@extends('templates.pages')
@section('title')
@section('header')
<h1>Tambah Berita</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Tambah Berita</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @if(auth()->user()->level == 'superadmin')
          <form method="POST" action="{{ route('eproc.superadmin.berita.store') }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @endif
        @if(auth()->user()->level == 'admin')
          <form method="POST" action="{{ route('eproc.admin.berita.store') }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @endif
          @csrf
          <div class="form-group">
            <label for="judul_berita">Judul Berita</label>
            <input id="judul_berita" type="text" class="form-control" name="judul_berita">
            @error('judul_berita')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="thumbnail">Thumbnail</label>
            <input id="thumbnail" type="file" class="form-control" name="thumbnail" onchange="file(event)">
            @error('thumbnail')<div class="text-danger">{{ $message }}</div>@enderror
            <p><img src="#" id="output" alt="" width="200px"></p>
          </div>
          <div class="form-group">
            <label for="tanggal_publikasi">Tanggal Publikasi</label>
            <input id="tanggal_publikasi" type="date" class="form-control" name="tanggal_publikasi">
            @error('tanggal_publikasi')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="isi_berita">Isi Berita</label>
            <textarea id="isi_berita" class="form-control" name="isi_berita"></textarea>
            @error('isi_berita')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('eproc.superadmin.berita.index') }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('eproc.admin.berita.index') }}" class="btn btn-secondary">Back</a>
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