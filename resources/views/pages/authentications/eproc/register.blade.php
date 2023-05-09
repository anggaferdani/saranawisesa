@extends('templates.authentications')
@section('title', 'Register')
@section('content')
<div class="card card-primary">
  <div class="card-header"><h4>@yield('title')</h4></div>
  <div class="card-body">

    @if(Session::get('success'))
      <div class="alert alert-important alert-success" role="alert">
        {{ Session::get('success') }}
      </div>
    @endif

    @if(Session::get('fail'))
      <div class="alert alert-important alert-danger" role="alert">
        {{ Session::get('fail') }}
      </div>
    @endif

    <form method="POST" action="{{ route('eproc.postregister') }}" class="needs-validation" novalidate="#">
      @csrf
      <div class="form-group">
        <label for="nama_panjang">Nama Perusahaan</label>
        <input id="nama_panjang" type="text" class="form-control" name="nama_panjang">
        @error('nama_panjang')<div class="text-danger">{{ $message }}</div>@enderror
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input id="email" type="email" class="form-control" name="email">
        @error('email')<div class="text-danger">{{ $message }}</div>@enderror
      </div>
      <div class="form-group">
        <label for="password" class="control-label">Password</label>
        <input id="password" type="password" class="form-control" name="password">
        @error('password')<div class="text-danger">{{ $message }}</div>@enderror
      </div>
      <div class="form-group">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" name="agree" class="custom-control-input" id="agree">
          <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block">
          Login
        </button>
      </div>
    </form>
  </div>
</div>
@endsection