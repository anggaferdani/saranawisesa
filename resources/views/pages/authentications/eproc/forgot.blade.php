@extends('templates.authentications')
@section('title', 'Forgot Password')
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

    <form method="POST" action="{{ route('eproc.post.password.forgot') }}" class="needs-validation" novalidate="#">
      @csrf
      <div class="form-group">
        <label for="email">Email</label>
        <input id="email" type="email" class="form-control" name="email">
        {{ Session::get('verified') ? Session::get('verified') : old('email') }}
        @error('email')<div class="text-danger">{{ $message }}</div>@enderror
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