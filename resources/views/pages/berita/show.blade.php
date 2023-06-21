@extends('templates.pages')
@section('title')
@section('header')
<h1>Detail Berita</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Detail Berita</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div>Judul Berita :</div>
        <p>{{ $berita->judul_berita }}</p>
        <div>Thumbnail :</div>
        <p><img src="{{ asset('eproc/berita/'.$berita["thumbnail"]) }}" alt="" width="200px"></p>
        <div>Tanggal Publikasi :</div>
        <p>{{ $berita->tanggal_publikasi }}</p>
        <div>Isi Berita :</div>
        <p>{!! $berita->isi_berita !!}</p>
        <div>Created At :</div>
        <p>{{ $berita->created_at }}</p>
        <div>Updated At :</div>
        <p>{{ $berita->updated_at }}</p>
        @if(auth()->user()->level == 'superadmin')
          <a href="{{ route('eproc.superadmin.berita.index') }}" class="btn btn-secondary">Back</a>
        @endif
        @if(auth()->user()->level == 'admin')
          <a href="{{ route('eproc.admin.berita.index') }}" class="btn btn-secondary">Back</a>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection