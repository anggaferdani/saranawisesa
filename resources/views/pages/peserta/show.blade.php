@extends('templates.pages')
@section('title')
@section('header')
<h1>Detail Peserta Lelang : {{ $lelang->kode_lelang }}</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Detail Peserta Lelang : {{ $lelang->kode_lelang }}</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div>Nama Perusahaan :</div>
        <p><a href="{{ route('eproc.superadmin.perusahaan.show', $kualifikasi->id) }}" class="text-primary">{{ $perusahaan->users->nama_panjang }}</a> (klik untuk melihat profile perusahaan)</p>
        <div>Email Perusahaan :</div>
        <p class="text-primary">{{ $perusahaan->users->email }}</p>
        @if($lelang->lampiran_pengadaan == 'penawaran')
          <div>Penawaran :</div>
          @if(empty($lampiran->penawaran))
            <p class="text-primary">Belum mengrimkan lampiran penawaran apapun</p>
          @else
            <p class="text-primary"><a href="{{ asset('lampiran/penawaran/'.$lampiran['penawaran']) }}" target="_blank">{{ $lampiran->penawaran }}</a></p>
          @endif
        @endif
        @if($lelang->lampiran_pengadaan == 'konsep')
          <div>Konsep :</div>
          @if(empty($lampiran->konsep))
            <p class="text-primary">Belum mengrimkan lampiran konsep apapun</p>
          @else
            <p class="text-primary"><a href="{{ asset('lampiran/konsep/'.$lampiran['konsep']) }}" target="_blank">{{ $lampiran->konsep }}</a></p>
          @endif
        @endif
        @if($lelang->lampiran_pengadaan == 'penawaran_dan_konsep')
          <div>Penawaran Dan Konsep :</div>
          @if(empty($lampiran->penawaran_dan_konsep))
            <p class="text-primary">Belum mengrimkan lampiran penawaran dan konsep apapun</p>
          @else
            <p class="text-primary"><a href="{{ asset('lampiran/penawaran_dan_konsep/'.$lampiran['penawaran_dan_konsep']) }}" target="_blank">{{ $lampiran->penawaran_dan_konsep }}</a></p>
          @endif
        @endif
        <p class="text-primary">{{ $perusahaan->lampiran_pengadaan }}</p>
        <div>Created At :</div>
        <p class="text-primary">{{ $perusahaan->created_at }}</p>
        <div>Updated At :</div>
        <p class="text-primary">{{ $perusahaan->updated_at }}</p>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
      </div>
    </div>
  </div>
</div>
@endsection