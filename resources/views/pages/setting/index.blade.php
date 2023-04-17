@extends('templates.pages')
@section('title')
@section('header')
<h1>Setting</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Setting</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      @foreach ($setting as $settings)
      <div class="card-body">
        <div>Nama Perusahaan :</div>
        <p>{{ $settings->nama_perusahaan }}</p>
        <div>No Telepon Perusahaan :</div>
        <p>{{ $settings->no_telepon_perusahaan }}</p>
        <div>Email Perusahaan :</div>
        <p>{{ $settings->email_perusahaan }}</p>
        <div>Alamat Perusahaan :</div>
        <p>{{ $settings->alamat_perusahaan }}</p>
        <div>Instagram :</div>
        <p>{{ $settings->instagram }}</p>
        <div>Facebook :</div>
        <p>{{ $settings->facebook }}</p>
        <div>Twitter :</div>
        <p>{{ $settings->twitter }}</p>
        <div>Youtube :</div>
        <p>{{ $settings->youtube }}</p>
      </div>
      <div class="card-footer">
        @if(auth()->user()->level == 'superadmin')
          <a href="{{ route('compro.superadmin.setting.edit', $settings->id) }}" class="btn btn-primary"><i class="fas fa-cog"></i></a>
        @endif
        @if(auth()->user()->level == 'admin')
          <a href="{{ route('compro.admin.setting.edit', $settings->id) }}" class="btn btn-primary"><i class="fas fa-cog"></i></a>
        @endif
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection