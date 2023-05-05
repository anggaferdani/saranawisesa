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
        <p>{{ $perusahaan->nama_perusahaan }}</p>
        <div>Email Perusahaan :</div>
        <p>{{ $perusahaan->email_perusahaan }}</p>
        @if($additional_lampiran_pengadaan->status_aktif == 'aktif')
        <div>Email Perusahaan :</div>
        <p>{{ $perusahaan->email_perusahaan }}</p>
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