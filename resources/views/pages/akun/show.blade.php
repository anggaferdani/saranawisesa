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
        <h4>Show</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="" class="needs-validation" novalidate="">
          @csrf
          <div class="form-group">
            <label>Nama Panjang</label>
            <input disabled type="text" class="form-control" name="nama_panjang" value="{{ $akun->nama_panjang }}">
            @error('nama_panjang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          @if(Session::has('compro'))
            <div class="form-group">
              <label>Level</label>
              <select disabled class="form-control select2" name="level">
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
            <input disabled type="email" class="form-control" name="email" value="{{ $akun->email }}">
            @error('email')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Created At</label>
              <input disabled type="text" class="form-control" name="created_at" value="{{ $akun->created_at }}">
              @error('created_at')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="form-group col-md-6">
              <label>Updated At</label>
              <input disabled type="text" class="form-control" name="updated_at" value="{{ $akun->updated_at }}">
              @error('updated_at')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
          </div>
          @if(Session::has('compro'))
            <a href="{{ route('compro.superadmin.akun.index') }}" class="btn btn-secondary">Back</a>
          @endif
          @if(Session::has('eproc'))
            <a href="{{ route('eproc.superadmin.akun.index') }}" class="btn btn-secondary">Back</a>
          @endif
        </form>
      </div>
    </div>
  </div>
</div>
@endsection