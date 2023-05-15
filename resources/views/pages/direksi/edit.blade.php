@extends('templates.pages')
@section('title')
@section('header')
<h1>Edit Direksi</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Edit Direksi</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @if(auth()->user()->level == 'superadmin')
          <form method="POST" action="{{ route('compro.superadmin.direksi.update', $direksi->id) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @endif
        @if(auth()->user()->level == 'admin')
          <form method="POST" action="{{ route('compro.admin.direksi.update', $direksi->id) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @endif
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="nama_direksi">Nama Direksi</label>
            <input id="nama_direksi" type="text" class="form-control" name="nama_direksi" value="{{ $direksi->nama_direksi }}">
            @error('nama_direksi')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="direksi">Direksi</label>
            <input id="direksi" type="file" class="form-control" name="direksi" value="{{ $direksi->direksi }}" onchange="file(event)">
            @error('direksi')<div class="text-danger">{{ $message }}</div>@enderror
            <p><img src="/direksi/{{ $direksi->direksi }}" id="output" alt="" width="200px"></p>
          </div>
          <div class="form-group">
            <label for="jabatan_direksi">Jabatan Direksi</label>
            <input id="jabatan_direksi" type="text" class="form-control" name="jabatan_direksi" value="{{ $direksi->jabatan_direksi }}">
            @error('jabatan_direksi')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="pendapat_direksi">Pendapat Direksi</label>
            <textarea id="pendapat_direksi" class="form-control ckeditor" name="pendapat_direksi">{{ $direksi->pendapat_direksi }}</textarea>
            @error('pendapat_direksi')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('compro.superadmin.direksi.index') }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('compro.admin.direksi.index') }}" class="btn btn-secondary">Back</a>
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