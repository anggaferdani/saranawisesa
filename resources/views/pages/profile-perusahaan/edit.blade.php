@extends('templates.pages')
@section('title')
@section('header')
<h1>Edit Profile Perusahaan</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Edit Profile Perusahaan</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @if(auth()->user()->level == 'superadmin')
          <form method="POST" action="{{ route('compro.superadmin.profile-perusahaan.update', $profile_perusahaan->id) }}" class="needs-validation" novalidate="">
        @endif
        @if(auth()->user()->level == 'admin')
          <form method="POST" action="{{ route('compro.admin.profile-perusahaan.update', $profile_perusahaan->id) }}" class="needs-validation" novalidate="">
        @endif
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="nama_panjang">Nama Panjang</label>
            <textarea id="sejarah_perusahaan" class="form-control" name="sejarah_perusahaan">{{ $profile_perusahaan->sejarah_perusahaan }}</textarea>
            @error('nama_panjang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <code>Untuk setiap penulisan visi diakhiri dengan penambahan(#) dan untuk yang paling terakhir tidak perlu diberi tambahan(#). Contoh : pertama# kedua# ketiga# keempat.</code>
          <div class="form-group">
            <label for="visi">Visi</label>
            <textarea id="visi" class="form-control" name="visi">{{ $profile_perusahaan->visi }}</textarea>
            @error('visi')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <code>Untuk setiap penulisan misi diakhiri dengan penambahan(#) dan untuk yang paling terakhir tidak perlu diberi tambahan(#). Contoh : pertama# kedua# ketiga# keempat.</code>
          <div class="form-group">
            <label for="misi">Misi</label>
            <textarea id="misi" class="form-control" name="misi">{{ $profile_perusahaan->misi }}</textarea>
            @error('misi')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('compro.superadmin.profile-perusahaan.index') }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('compro.admin.profile-perusahaan.index') }}" class="btn btn-secondary">Back</a>
          @endif
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection