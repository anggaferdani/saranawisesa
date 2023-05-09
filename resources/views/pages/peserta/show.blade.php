@extends('templates.pages')
@section('title')
@section('header')
<h1>Detail Peserta</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Detail Peserta</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div>Nama Perusahaan :</div>
        <p>{{ $perusahaan->users->nama_panjang }}</p>
        <div>Email Perusahaan :</div>
        <p>{{ $perusahaan->users->email }}</p>
        <div>Lampiran Pengadaan :</div>
        @if($lelang->lampiran_pengadaan == 'penawaran')
          <p>Penawaran</p>
        @endif
        @if($lelang->lampiran_pengadaan == 'konsep')
          <p>Konsep</p>
        @endif
        @if($lelang->lampiran_pengadaan == 'penawaran_dan_konsep')
          <p>Penawaran Dan Konsep</p>
        @endif
        <p>{{ $perusahaan->lampiran_pengadaan }}</p>
        <div>Created At :</div>
        <p>{{ $perusahaan->created_at }}</p>
        <div>Updated At :</div>
        <p>{{ $perusahaan->updated_at }}</p>
        @if(Session::has('compro'))
          <a href="{{ route('compro.superadmin.peserta.index', $lelang->id) }}" class="btn btn-secondary">Back</a>
        @endif
        @if(Session::has('eproc'))
          <a href="{{ route('eproc.superadmin.peserta.index', $lelang->id) }}" class="btn btn-secondary">Back</a>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection