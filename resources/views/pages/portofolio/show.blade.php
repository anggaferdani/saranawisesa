@extends('templates.pages')
@section('title')
@section('header')
<h1>Detail Portofolio</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Detail Portofolio</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div>Judul Portofolio :</div>
        <p>{{ $portofolio->judul_portofolio }}</p>
        <div>Portofolio :</div>
        <p><img src="/portofolio/{{ $portofolio->portofolio }}" alt="" width="200px"></p>
        <div>Alamat Portofolio :</div>
        <p>{{ $portofolio->alamat_portofolio }}</p>
        <div>Isi Portofolio :</div>
        <p>{{ $portofolio->isi_portofolio }}</p>
        <div>Created At :</div>
        <p>{{ $portofolio->created_at }}</p>
        <div>Updated At :</div>
        <p>{{ $portofolio->updated_at }}</p>
        @if(auth()->user()->level == 'superadmin')
          <a href="{{ route('compro.superadmin.portofolio.index') }}" class="btn btn-secondary">Back</a>
        @endif
        @if(auth()->user()->level == 'admin')
          <a href="{{ route('compro.admin.portofolio.index') }}" class="btn btn-secondary">Back</a>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection