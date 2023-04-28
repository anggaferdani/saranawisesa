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
        <p>{{ $lelang->kode_lelang }}</p>
        <div>Nama Lelang :</div>
        <p>{{ $lelang->nama_lelang }}</p>
        <div>Jenis Lelang :</div>
        <p>{{ $lelang->jenis_lelang }}</p>
        <div>HPS :</div>
        <p>{{ 'Rp. '.strrev(implode('.', str_split(strrev(strval($lelang->hps)), 3))) }}</p>
        <div>Tanggal Mulai Lelang :</div>
        <p>{{ $lelang->tanggal_mulai_lelang }}</p>
        <div>Tanggal Akhir Lelang :</div>
        @if(now()->toDateTimeString() > $lelang->tanggal_akhir_lelang)
          <p class="text-danger">{{ $lelang->tanggal_akhir_lelang }}</p>
        @else
          <p>{{ $lelang->tanggal_akhir_lelang }}</p>
        @endif
        <div>Created At :</div>
        <p>{{ $lelang->created_at }}</p>
        <div>Updated At :</div>
        <p>{{ $lelang->updated_at }}</p>
        <div>Created By :</div>
        <p>{{ $lelang->created_by }}</p>
        <div>Updated By :</div>
        <p>{{ $lelang->updated_by }}</p>
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