@extends('templates.pages')
@section('title')
@section('header')
<h1>Detail Pengadaan</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Detail Pengadaan</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div>Kode Pengadaan :</div>
        <p>{{ $pengadaan->kode_pengadaan }}</p>
        <div>Nama Pengadaan :</div>
        <p>{{ $pengadaan->nama_pengadaan }}</p>
        <div>Jenis Pengadaan :</div>
        <p>{{ $pengadaan->jenis_pengadaan }}</p>
        <div>HPS :</div>
        <p>{{ 'Rp. '.strrev(implode('.', str_split(strrev(strval($pengadaan->hps)), 3))) }}</p>
        <div>Tanggal Mulai Pengadaan :</div>
        <p>{{ $pengadaan->tanggal_mulai_pengadaan }}</p>
        <div>Tanggal Akhir Pengadaan :</div>
        @if(now()->toDateTimeString() > $pengadaan->tanggal_akhir_pengadaan)
          <p class="text-danger">{{ $pengadaan->tanggal_akhir_pengadaan }}</p>
        @else
          <p>{{ $pengadaan->tanggal_akhir_pengadaan }}</p>
        @endif
        <div>Created At :</div>
        <p>{{ $pengadaan->created_at }}</p>
        <div>Updated At :</div>
        <p>{{ $pengadaan->updated_at }}</p>
        <div>Created By :</div>
        <p>{{ $pengadaan->created_by }}</p>
        <div>Updated By :</div>
        <p>{{ $pengadaan->updated_by }}</p>
        @if(auth()->user()->level == 'superadmin')
          <a href="{{ route('eproc.superadmin.management-pengadaan.index') }}" class="btn btn-secondary">Back</a>
        @endif
        @if(auth()->user()->level == 'admin')
          <a href="{{ route('eproc.admin.management-pengadaan.index') }}" class="btn btn-secondary">Back</a>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection