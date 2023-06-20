@extends('templates.pages')
@section('title', 'Jadwal Kegiatan Lelang')
@section('header')
<h1>Jadwal Kegiatan Lelang : {{ $lelang->kode_lelang }}</h1>
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
          <form method="POST" action="{{ route('eproc.superadmin.jadwal-lelang.update', ['id' => Crypt::encrypt($jadwal_lelang->id), 'lelang_id' => Crypt::encrypt($lelang->id)]) }}" class="needs-validation" novalidate="">
        @endif
        @if(auth()->user()->level == 'admin')
          <form method="POST" action="{{ route('eproc.admin.jadwal-lelang.update', ['id' => Crypt::encrypt($jadwal_lelang->id), 'lelang_id' => Crypt::encrypt($lelang->id)]) }}" class="needs-validation" novalidate="">
        @endif
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Nama Kegiatan Lelang</label>
            <input type="text" class="form-control" name="nama_kegiatan_lelang" value="{{ $jadwal_lelang->nama_kegiatan_lelang }}">
            @error('nama_kegiatan_lelang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Tanggal Mulai Kegiatan Lelang</label>
              <input type="date" class="form-control" name="tanggal_mulai_kegiatan_lelang" value="{{ $jadwal_lelang->tanggal_mulai_kegiatan_lelang }}">
              @error('tanggal_mulai_kegiatan_lelang')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="form-group col-md-6">
              <label>Tanggal Akhir Kegiatan Lelang</label>
              <input type="date" class="form-control" name="tanggal_akhir_kegiatan_lelang" value="{{ $jadwal_lelang->tanggal_akhir_kegiatan_lelang }}">
              @error('tanggal_akhir_kegiatan_lelang')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
          </div>
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('eproc.superadmin.jadwal-lelang.index', Crypt::encrypt($lelang->id)) }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('eproc.admin.jadwal-lelang.index', Crypt::encrypt($lelang->id)) }}" class="btn btn-secondary">Back</a>
          @endif
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection