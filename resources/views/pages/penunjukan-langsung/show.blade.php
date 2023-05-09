@extends('templates.pages')
@section('title')
@section('header')
<h1>Detail Lelang</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Detail Lelang</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div>Kode Lelang :</div>
        <p>{{ $penunjukan_langsung->kode_lelang }}</p>
        <div>Jenis Lelang :</div>
        <p>{{ $penunjukan_langsung->jenis_pengadaans->jenis_pengadaan }}</p>
        <div>Nama Lelang :</div>
        <p>{{ $penunjukan_langsung->nama_lelang }}</p>
        <div>Uraian Singkat Pekerjaan :</div>
        <p>{{ $penunjukan_langsung->uraian_singkat_pekerjaan }}</p>
        <div>Tanggal Mulai Lelang :</div>
        <p>{{ $penunjukan_langsung->tanggal_mulai_lelang }}</p>
        <div>Tanggal Akhir Lelang :</div>
        @if(now()->toDateTimeString() > $penunjukan_langsung->tanggal_akhir_lelang)
          <p class="text-danger">{{ $penunjukan_langsung->tanggal_akhir_lelang }}</p>
        @else
          <p>{{ $penunjukan_langsung->tanggal_akhir_lelang }}</p>
        @endif
        <div>Jenis Kontrak :</div>
        <p>{{ $penunjukan_langsung->jenis_kontrak }}</p>
        <div>Lokasi Pekerjaan :</div>
        <p>{{ $penunjukan_langsung->lokasi_pekerjaan }}</p>
        <div>HPS :</div>
        <p>{{ 'Rp. '.strrev(implode('.', str_split(strrev(strval($penunjukan_langsung->hps)), 3))) }}</p>
        <div>Syarat Kualifikasi :</div>
        <p>{!! $penunjukan_langsung->syarat_kualifikasi !!}</p>
        <div>Lampiran Pengadaan :</div>
        @if($penunjukan_langsung->lampiran_pengadaan == 'penawaran')
          <p>Penawaran</p>
        @endif
        @if($penunjukan_langsung->lampiran_pengadaan == 'konsep')
          <p>Konsep</p>
        @endif
        @if($penunjukan_langsung->lampiran_pengadaan == 'penawaran_dan_konsep')
          <p>Penawaran Dan Konsep</p>
        @endif
        <div>Created At :</div>
        <p>{{ $penunjukan_langsung->created_at }}</p>
        <div>Updated At :</div>
        <p>{{ $penunjukan_langsung->updated_at }}</p>
        <div>Created By :</div>
        <p>{{ $penunjukan_langsung->created_by }}</p>
        <div>Updated By :</div>
        <p>{{ $penunjukan_langsung->updated_by }}</p>
        @if(auth()->user()->level == 'superadmin')
          <a href="{{ route('eproc.superadmin.lelang.index') }}" class="btn btn-secondary">Back</a>
        @endif
        @if(auth()->user()->level == 'admin')
          <a href="{{ route('eproc.admin.lelang.index') }}" class="btn btn-secondary">Back</a>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection