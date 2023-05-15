@extends('templates.pages')
@section('title')
@section('header')
<h1>Detail Artikel</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Detail Artikel</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div>Judul Artikel :</div>
        <p>{{ $artikel->judul_artikel }}</p>
        <div>Thumbnail :</div>
        <p><img src="{{ asset('artikel/'.$artikel['thumbnail']) }}" alt="" width="200px"></p>
        <div>Tanggal Publikasi :</div>
        <p>{{ $artikel->tanggal_publikasi }}</p>
        <div>Isi Artikel :</div>
        <p>{!! $artikel->isi_artikel !!}</p>
        <div>Created At :</div>
        <p>{{ $artikel->created_at }}</p>
        <div>Updated At :</div>
        <p>{{ $artikel->updated_at }}</p>
        @if(auth()->user()->level == 'superadmin')
          <a href="{{ route('compro.superadmin.artikel.index') }}" class="btn btn-secondary">Back</a>
        @endif
        @if(auth()->user()->level == 'admin')
          <a href="{{ route('compro.admin.artikel.index') }}" class="btn btn-secondary">Back</a>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection