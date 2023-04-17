@extends('templates.pages')
@section('title')
@section('header')
<h1>Edit Komisaris</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Edit Komisaris</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @if(auth()->user()->level == 'superadmin')
          <form method="POST" action="{{ route('compro.superadmin.komisaris.update', $komisaris->id) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @endif
        @if(auth()->user()->level == 'admin')
          <form method="POST" action="{{ route('compro.admin.komisaris.update', $komisaris->id) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @endif
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="nama_komisaris">Nama Komisaris</label>
            <input id="nama_komisaris" type="text" class="form-control" name="nama_komisaris" value="{{ $komisaris->nama_komisaris }}">
            @error('nama_komisaris')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="komisaris">Komisaris</label>
            <input id="komisaris" type="file" class="form-control" name="komisaris" value="{{ $komisaris->komisaris }}" onchange="file(event)">
            @error('komisaris')<div class="text-danger">{{ $message }}</div>@enderror
            <p><img src="/komisaris/{{ $komisaris->komisaris }}" id="output" alt="" width="200px"></p>
          </div>
          <div class="form-group">
            <label for="jabatan_komisaris">Jabatan Komisaris</label>
            <input id="jabatan_komisaris" type="text" class="form-control" name="jabatan_komisaris" value="{{ $komisaris->jabatan_komisaris }}">
            @error('jabatan_komisaris')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="pendapat_komisaris">Pendapat Komisaris</label>
            <textarea id="pendapat_komisaris" class="form-control" name="pendapat_komisaris">{{ $komisaris->pendapat_komisaris }}</textarea>
            @error('pendapat_komisaris')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('compro.superadmin.komisaris.index') }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('compro.admin.komisaris.index') }}" class="btn btn-secondary">Back</a>
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