@extends('templates.pages')
@section('title', 'Profile')
@section('header')
<h1>Profile</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">

    @if(Session::get('success'))
      <div class="alert alert-primary">{{ Session::get('success') }}</div>
    @endif

    <div class="card">
      <div class="card-body">
        @if(Session::has('compro'))
          @if(auth()->user()->level == 'superadmin')
            <form method="POST" action="{{ route('compro.superadmin.postprofile') }}" class="needs-validation" novalidate="">
          @endif
          @if(auth()->user()->level == 'admin')
            <form method="POST" action="{{ route('compro.admin.postprofile') }}" class="needs-validation" novalidate="">
          @endif
          @if(auth()->user()->level == 'creator')
            <form method="POST" action="{{ route('compro.creator.postprofile') }}" class="needs-validation" novalidate="">
          @endif
          @if(auth()->user()->level == 'helpdesk')
            <form method="POST" action="{{ route('compro.helpdesk.postprofile') }}" class="needs-validation" novalidate="">
          @endif
        @endif
        @if(Session::has('eproc'))
          @if(auth()->user()->level == 'superadmin')
            <form method="POST" action="{{ route('eproc.superadmin.postprofile') }}" class="needs-validation" novalidate="">
          @endif
          @if(auth()->user()->level == 'admin')
            <form method="POST" action="{{ route('eproc.admin.postprofile') }}" class="needs-validation" novalidate="">
          @endif
          @if(auth()->user()->level == 'perusahaan')
            <form method="POST" action="{{ route('eproc.perusahaan.postprofile') }}" class="needs-validation" novalidate="">
          @endif
        @endif
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="nama_panjang">Nama Panjang</label>
            <input id="nama_panjang" type="text" class="form-control" name="nama_panjang" value="{{ $profile->nama_panjang }}">
            @error('nama_panjang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ $profile->email }}">
            @error('email')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="password">New Password</label>
            <input id="password" type="text" class="form-control" name="password">
            @error('password')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          @if(Session::has('compro'))
            @if(auth()->user()->level == 'superadmin')
              <a href="{{ route('compro.superadmin.dashboard') }}" class="btn btn-secondary">Back</a>
            @endif
            @if(auth()->user()->level == 'admin')
              <a href="{{ route('compro.admin.dashboard') }}" class="btn btn-secondary">Back</a>
            @endif
            @if(auth()->user()->level == 'creator')
              <a href="{{ route('compro.creator.dashboard') }}" class="btn btn-secondary">Back</a>
            @endif
            @if(auth()->user()->level == 'helpdesk')
              <a href="{{ route('compro.helpdesk.dashboard') }}" class="btn btn-secondary">Back</a>
            @endif
          @endif
          @if(Session::has('eproc'))
            @if(auth()->user()->level == 'superadmin')
              <a href="{{ route('eproc.superadmin.dashboard') }}" class="btn btn-secondary">Back</a>
            @endif
            @if(auth()->user()->level == 'admin')
              <a href="{{ route('eproc.admin.dashboard') }}" class="btn btn-secondary">Back</a>
            @endif
          @endif
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection