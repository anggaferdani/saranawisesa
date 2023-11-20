@extends('templates.authentications')
@section('title', 'Reset Password')
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

    <form method="POST" action="{{ route('eproc.post.password.reset') }}" class="needs-validation" novalidate="#">
      @csrf
      <input type="hidden" class="form-control" name="email" value="{{ request('email') }}" required>
      <div class="form-group">
        <label for="password" class="control-label">New Password</label>
        <input id="password" type="password" class="form-control" name="new_password" required>
        @error('new_password')<div class="text-danger">{{ $message }}</div>@enderror
      </div>
      <div class="form-group">
        <label for="password" class="control-label">Confirm New Password</label>
        <input id="password" type="password" class="form-control" name="confirm_new_password" required>
        @error('confirm_new_password')<div class="text-danger">{{ $message }}</div>@enderror
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block">
          Submit
        </button>
      </div>
    </form>
  </div>
</div>
@endsection