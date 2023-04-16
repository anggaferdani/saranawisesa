@extends('templates.pages')
@section('title')
@section('header')
<h1>Edit Akun</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Edit Akun</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @if(Session::has('compro'))
          <form method="POST" action="{{ route('compro.superadmin.akun.update', $akun->id) }}" class="needs-validation" novalidate="">
        @endif
        @if(Session::has('eproc'))
          <form method="POST" action="{{ route('eproc.superadmin.akun.update', $akun->id) }}" class="needs-validation" novalidate="">
        @endif
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="nama_panjang">Nama Panjang</label>
            <input id="nama_panjang" type="text" class="form-control" name="nama_panjang" value="{{ $akun->nama_panjang }}">
            @error('nama_panjang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ $akun->email }}">
            @error('email')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          @if(Session::has('compro'))
            <a href="{{ route('compro.superadmin.akun.index') }}" class="btn btn-secondary">Back</a>
          @endif
          @if(Session::has('eproc'))
            <a href="{{ route('eproc.superadmin.akun.index') }}" class="btn btn-secondary">Back</a>
          @endif
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection