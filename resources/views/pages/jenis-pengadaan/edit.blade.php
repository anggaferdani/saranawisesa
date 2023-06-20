@extends('templates.pages')
@section('title', 'Jenis Pengadaan')
@section('header')
<h1>Jenis Pengadaan</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Edit</h4>
      </div>
      <div class="card-body">
        @if(auth()->user()->level == 'superadmin')
          <form method="POST" action="{{ route('eproc.superadmin.jenis-pengadaan.update', Crypt::encrypt($jenis_pengadaan->id)) }}" class="needs-validation" novalidate="">
        @endif
        @if(auth()->user()->level == 'admin')
          <form method="POST" action="{{ route('eproc.admin.jenis-pengadaan.update', Crypt::encrypt($jenis_pengadaan->id)) }}" class="needs-validation" novalidate="">
        @endif
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Jenis Pengadaan</label>
            <input type="text" class="form-control" name="jenis_pengadaan" value="{{ $jenis_pengadaan->jenis_pengadaan }}">
            @error('jenis_pengadaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('eproc.superadmin.jenis-pengadaan.index') }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('eproc.admin.jenis-pengadaan.index') }}" class="btn btn-secondary">Back</a>
          @endif
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection