@extends('templates.pages')
@section('title')
@section('header')
<h1>Detail Direksi</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Detail Direksi</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div>Nama Direksi :</div>
        <p>{{ $direksi->nama_direksi }}</p>
        <div>Direksi :</div>
        <p><img src="{{ asset('direksi/'.$direksi['direksi']) }}" alt="" width="200px"></p>
        <div>Jabatan Direksi :</div>
        <p>{{ $direksi->jabatan_direksi }}</p>
        <div>Pendapat Direksi :</div>
        <p>{!! $direksi->pendapat_direksi !!}</p>
        <div>Created At :</div>
        <p>{{ $direksi->created_at }}</p>
        <div>Updated At :</div>
        <p>{{ $direksi->updated_at }}</p>
        <div>Created By :</div>
        <p>{{ $direksi->created_by }}</p>
        <div>Updated By :</div>
        <p>{{ $direksi->updated_by }}</p>
        @if(auth()->user()->level == 'superadmin')
          <a href="{{ route('compro.superadmin.direksi.index') }}" class="btn btn-secondary">Back</a>
        @endif
        @if(auth()->user()->level == 'admin')
          <a href="{{ route('compro.admin.direksi.index') }}" class="btn btn-secondary">Back</a>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection