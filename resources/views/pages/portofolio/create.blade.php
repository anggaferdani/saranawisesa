@extends('templates.pages')
@section('title')
@section('header')
<h1>Tambah Portofolio</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Tambah Portofolio</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @if(auth()->user()->level == 'superadmin')
          <form method="POST" action="{{ route('compro.superadmin.portofolio.store') }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @endif
        @if(auth()->user()->level == 'admin')
          <form method="POST" action="{{ route('compro.admin.portofolio.store') }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @endif
          @csrf
          <div class="form-group">
            <label for="judul_portofolio">Judul Portofolio</label>
            <input id="judul_portofolio" type="text" class="form-control" name="judul_portofolio">
            @error('judul_portofolio')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="portofolio">Portofolio</label>
            <input id="portofolio" type="file" class="form-control" name="portofolio" onchange="file(event)">
            @error('portofolio')<div class="text-danger">{{ $message }}</div>@enderror
            <p><img src="#" id="output" alt="" width="200px"></p>
          </div>
          <div class="form-group">
            <label for="alamat_portofolio">Alamat Portofolio</label>
            <input id="alamat_portofolio" type="text" class="form-control" name="alamat_portofolio">
            @error('alamat_portofolio')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="isi_portofolio">Isi Portofolio</label>
            <textarea id="isi_portofolio" class="form-control" name="isi_portofolio"></textarea>
            @error('isi_portofolio')<div class="text-danger">{{ $message }}</div>@enderror
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

<script type="text/javascript">
  var file = function(event){
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  }
</script>
@endsection