@extends('templates.pages')
@section('title', 'Akun')
@section('header')
<h1>Akun</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Create</h4>
      </div>
      <div class="card-body">
        @if(Session::has('compro'))
          <form method="POST" action="{{ route('compro.superadmin.akun.store') }}" class="needs-validation" novalidate="">
        @endif
        @if(Session::has('eproc'))
          <form method="POST" action="{{ route('eproc.superadmin.akun.store') }}" class="needs-validation" novalidate="">
        @endif
          @csrf
          <div class="form-group">
            <label>Nama Panjang</label>
            <input type="text" class="form-control" name="nama_panjang">
            @error('nama_panjang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          @if(Session::has('compro'))
            <div class="form-group">
              <label>Level</label>
              <select class="form-control select2" name="level">
                <option selected disabled>Pilih</option>
                <option value="admin">Admin</option>
                <option value="creator">Creator</option>
                <option value="helpdesk">Helpdesk</option>
              </select>
              @error('level')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
          @endif
          @if(Session::has('eproc'))
            <input hidden type="text" class="form-control" name="level" value="admin">
          @endif
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email">
            @error('email')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" name="password">
            @error('password')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          @if(Session::has('compro'))
            <a href="{{ route('compro.superadmin.akun.index') }}" class="btn btn-secondary">Back</a>
          @endif
          @if(Session::has('eproc'))
            <a href="{{ route('eproc.superadmin.akun.index') }}" class="btn btn-secondary">Back</a>
          @endif
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection