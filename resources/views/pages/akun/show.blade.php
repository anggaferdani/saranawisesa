@extends('templates.pages')
@section('title')
@section('header')
<h1>Edit Akun</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Edit Akun</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div>Nama Panjang :</div>
        <p>{{ $akun->nama_panjang }}</p>
        <div>Email :</div>
        <p>{{ $akun->email }}</p>
        <div>Created At :</div>
        <p>{{ $akun->created_at }}</p>
        <div>Updated At :</div>
        <p>{{ $akun->updated_at }}</p>
        @if(Session::has('compro'))
          <a href="{{ route('compro.superadmin.akun.index') }}" class="btn btn-secondary">Back</a>
        @endif
        @if(Session::has('eproc'))
          <a href="{{ route('eproc.superadmin.akun.index') }}" class="btn btn-secondary">Back</a>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection