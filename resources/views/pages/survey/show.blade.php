@extends('templates.pages')
@section('title')
@section('header')
<h1>Detail Survey</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Detail Survey</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div>Nama Panjang :</div>
        <p>{{ $survey->nama_panjang }}</p>
        <div>Email :</div>
        <p>{{ $survey->email }}</p>
        <div>Nama Perusahaan :</div>
        <p>{{ $survey->nama_perusahaan }}</p>
        <div>Pesan :</div>
        <p>{{ $survey->pesan }}</p>
        <div>Created At :</div>
        <p>{{ $survey->created_at }}</p>
        <div>Updated At :</div>
        <p>{{ $survey->updated_at }}</p>
        @if(auth()->user()->level == 'superadmin')
          <a href="{{ route('compro.superadmin.survey.index') }}" class="btn btn-secondary">Back</a>
        @endif
        @if(auth()->user()->level == 'admin')
          <a href="{{ route('compro.admin.survey.index') }}" class="btn btn-secondary">Back</a>
        @endif
        @if(auth()->user()->level == 'helpdesk')
          <a href="{{ route('compro.helpdesk.survey.index') }}" class="btn btn-secondary">Back</a>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection