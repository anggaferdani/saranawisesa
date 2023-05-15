@extends('templates.pages')
@section('title')
@section('header')
<h1>Edit Jadwal Lelang</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Edit Jadwal Lelang</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @if(auth()->user()->level == 'superadmin')
          <form method="POST" action="{{ route('eproc.superadmin.jadwal-lelang.update', ['id' => $jadwal_lelang->id, 'lelang_id' => $lelang->id]) }}" class="needs-validation" novalidate="">
        @endif
        @if(auth()->user()->level == 'admin')
          <form method="POST" action="{{ route('eproc.admin.jadwal-lelang.update', ['id' => $jadwal_lelang->id, 'lelang_id' => $lelang->id]) }}" class="needs-validation" novalidate="">
        @endif
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="nama_lelang">Nama Kegiatan Lelang</label>
            <input id="nama_lelang" type="text" class="form-control" name="nama_lelang" value="{{ $jadwal_lelang->nama_lelang }}">
            @error('nama_lelang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="tanggal_mulai_lelang">Tanggal Mulai Kegiatan Lelang</label>
            <input id="tanggal_mulai_lelang" type="date" class="form-control" name="tanggal_mulai_lelang" value="{{ $jadwal_lelang->tanggal_mulai_lelang }}">
            @error('tanggal_mulai_lelang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="tanggal_akhir_lelang">Tanggal Akhir Kegiatan Lelang</label>
            <input id="tanggal_akhir_lelang" type="date" class="form-control" name="tanggal_akhir_lelang" value="{{ $jadwal_lelang->tanggal_akhir_lelang }}">
            @error('tanggal_akhir_lelang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('eproc.superadmin.jadwal-lelang.index', $lelang->id) }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('eproc.admin.jadwal-lelang.index', $lelang->id) }}" class="btn btn-secondary">Back</a>
          @endif
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection