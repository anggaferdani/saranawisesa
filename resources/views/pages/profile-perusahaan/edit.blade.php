@extends('templates.pages')
@section('title', 'Profile Perusahaan')
@section('header')
<h1>Profile Perusahaan</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">

    @if(Session::get('success'))
      <div class="alert alert-primary">{{ Session::get('success') }}</div>
    @endif

    @if(Session::get('fail'))
      <div class="alert alert-danger">{{ Session::get('fail') }}</div>
    @endif
    
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
            <label>Sejarah Perusahaan</label>
            <textarea class="form-control ckeditor" name="sejarah_perusahaan">{{ $profile_perusahaan->sejarah_perusahaan }}</textarea>
            @error('sejarah_perusahaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Visi</label>
            <textarea class="form-control ckeditor" name="visi">{{ $profile_perusahaan->visi }}</textarea>
            @error('visi')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Misi</label>
            <textarea class="form-control ckeditor" name="misi">{{ $profile_perusahaan->misi }}</textarea>
            @error('misi')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection