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
        <h4>Edit</h4>
      </div>
      <div class="card-body">
        @if(Session::has('compro'))
          <form method="POST" action="{{ route('compro.superadmin.akun.update', Crypt::encrypt($akun->id)) }}" class="needs-validation" novalidate="">
        @endif
        @if(Session::has('eproc'))
          <form method="POST" action="{{ route('eproc.superadmin.akun.update', Crypt::encrypt($akun->id)) }}" class="needs-validation" novalidate="">
        @endif
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Nama Panjang</label>
            <input type="text" class="form-control" name="nama_panjang" value="{{ $akun->nama_panjang }}">
            @error('nama_panjang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          @if(Session::has('compro'))
            <div class="form-group">
              <label>Level</label>
              <select class="form-control select2" name="level">
                <option selected disabled>Pilih</option>
                <option value="admin" @if($akun->level == 'admin')@selected(true)@endif>Admin</option>
                <option value="creator" @if($akun->level == 'creator')@selected(true)@endif>Creator</option>
                <option value="helpdesk" @if($akun->level == 'helpdesk')@selected(true)@endif>Helpdesk</option>
              </select>
              @error('level')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
          @endif
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="{{ $akun->email }}">
            @error('email')<div class="text-danger">{{ $message }}</div>@enderror
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