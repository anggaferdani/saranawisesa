@extends('templates.pages')
@section('title')
@section('header')
<h1>Edit Setting</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Edit Setting</a></div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @if(auth()->user()->level == 'superadmin')
          <form method="POST" action="{{ route('compro.superadmin.setting.update', $setting->id) }}" class="needs-validation" novalidate="">
        @endif
        @if(auth()->user()->level == 'admin')
          <form method="POST" action="{{ route('compro.admin.setting.update', $setting->id) }}" class="needs-validation" novalidate="">
        @endif
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="nama_perusahaan">Nama Perusahaan</label>
            <input id="nama_perusahaan" type="text" class="form-control" name="nama_perusahaan" value="{{ $setting->nama_perusahaan }}">
            @error('nama_perusahaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="no_telepon_perusahaan">No Telepon Perusahaan</label>
            <input id="no_telepon_perusahaan" type="text" class="form-control" name="no_telepon_perusahaan" value="{{ $setting->no_telepon_perusahaan }}">
            @error('no_telepon_perusahaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="email_perusahaan">Email Perusahaan</label>
            <input id="email_perusahaan" type="text" class="form-control" name="email_perusahaan" value="{{ $setting->email_perusahaan }}">
            @error('email_perusahaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="alamat_perusahaan">Alamat Perusahaan</label>
            <input id="alamat_perusahaan" type="text" class="form-control" name="alamat_perusahaan" value="{{ $setting->alamat_perusahaan }}">
            @error('alamat_perusahaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="instagram">Instagram</label>
            <input id="instagram" type="text" class="form-control" name="instagram" value="{{ $setting->instagram }}">
            @error('instagram')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="facebook">Facebook</label>
            <input id="facebook" type="text" class="form-control" name="facebook" value="{{ $setting->facebook }}">
            @error('facebook')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="twitter">Twitter</label>
            <input id="twitter" type="text" class="form-control" name="twitter" value="{{ $setting->twitter }}">
            @error('twitter')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="youtube">Youtube</label>
            <input id="youtube" type="text" class="form-control" name="youtube" value="{{ $setting->youtube }}">
            @error('youtube')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('compro.superadmin.setting.index') }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('compro.admin.setting.index') }}" class="btn btn-secondary">Back</a>
          @endif
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection