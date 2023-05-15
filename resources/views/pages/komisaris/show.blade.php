@extends('templates.pages')
@section('title')
@section('header')
<h1>Detail Komisaris</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Detail Komisaris</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div>Nama Komisaris :</div>
        <p>{{ $komisaris->nama_komisaris }}</p>
        <div>Komisaris :</div>
        <p><img src="{{ asset('komisaris/'.$komisaris['komisaris']) }}" alt="" width="200px"></p>
        <div>Jabatan Komisaris :</div>
        <p>{{ $komisaris->jabatan_komisaris }}</p>
        <div>Pendapat Komisaris :</div>
        <p>{!! $komisaris->pendapat_komisaris !!}</p>
        <div>Created At :</div>
        <p>{{ $komisaris->created_at }}</p>
        <div>Updated At :</div>
        <p>{{ $komisaris->updated_at }}</p>
        <div>Created By :</div>
        <p>{{ $komisaris->created_by }}</p>
        <div>Updated By :</div>
        <p>{{ $komisaris->updated_by }}</p>
        @if(auth()->user()->level == 'superadmin')
          <a href="{{ route('compro.superadmin.komisaris.index') }}" class="btn btn-secondary">Back</a>
        @endif
        @if(auth()->user()->level == 'admin')
          <a href="{{ route('compro.admin.komisaris.index') }}" class="btn btn-secondary">Back</a>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection