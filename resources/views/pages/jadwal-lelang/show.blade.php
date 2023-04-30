@extends('templates.pages')
@section('title')
@section('header')
<h1>Detail Jadwal Lelang</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Detail Jadwal Lelang</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div>Nama Lelang :</div>
        <p>{{ $jadwal_lelang->nama_lelang }}</p>
        <div>Tanggal Mulai Lelang :</div>
        <p>{{ $jadwal_lelang->tanggal_mulai_lelang }}</p>
        <div>Tanggal Akhir Lelang :</div>
        @if(now()->toDateTimeString() > $jadwal_lelang->tanggal_akhir_lelang)
          <p class="text-danger">{{ $jadwal_lelang->tanggal_akhir_lelang }}</p>
        @else
          <p>{{ $jadwal_lelang->tanggal_akhir_lelang }}</p>
        @endif
        <div>Created At :</div>
        <p>{{ $jadwal_lelang->created_at }}</p>
        <div>Updated At :</div>
        <p>{{ $jadwal_lelang->updated_at }}</p>
        <div>Created By :</div>
        <p>{{ $jadwal_lelang->created_by }}</p>
        <div>Updated By :</div>
        <p>{{ $jadwal_lelang->updated_by }}</p>
        @if(auth()->user()->level == 'superadmin')
          <a href="{{ route('eproc.superadmin.jadwal-lelang.index', $lelang->id) }}" class="btn btn-secondary">Back</a>
        @endif
        @if(auth()->user()->level == 'admin')
          <a href="{{ route('eproc.admin.jadwal-lelang.index', $lelang->id) }}" class="btn btn-secondary">Back</a>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection