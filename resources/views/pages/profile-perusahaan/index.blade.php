@extends('templates.pages')
@section('title')
@section('header')
<h1>Profile Perusahaan</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Profile Perusahaan</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      @foreach ($profile_perusahaan as $profile_perusahaans)
      <div class="card-body">
          <div>Sejarah Perusahaan :</div>
          <p>{{ $profile_perusahaans->sejarah_perusahaan }}</p>
          <div>Visi :</div>
          <ul>
            @foreach(explode('#', $profile_perusahaans->visi) as $visi)
              <li>{{ $visi }}</li>
            @endforeach
          </ul>
          <div>Misi :</div>
          <ul>
            @foreach(explode('#', $profile_perusahaans->misi) as $misi)
              <li>{{ $misi }}</li>
            @endforeach
          </ul>
      </div>
      <div class="card-footer">
        @if(auth()->user()->level == 'superadmin')
          <a href="{{ route('compro.superadmin.profile-perusahaan.edit', $profile_perusahaans->id) }}" class="btn btn-primary"><i class="fas fa-cog"></i></a>
        @endif
        @if(auth()->user()->level == 'admin')
          <a href="{{ route('compro.admin.profile-perusahaan.edit', $profile_perusahaans->id) }}" class="btn btn-primary"><i class="fas fa-cog"></i></a>
        @endif
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection