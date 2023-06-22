@extends('templates.pages')
@section('title', 'Administrasi')
@section('header')
<h1>Administrasi</h1>
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
      @include('eproc.menu')
    </div>
    
    <div class="card">
      <div class="card-header">
        <h4>Edit</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('eproc.perusahaan.administrasi.update', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="needs-validation" novalidate="">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Nama Badan Usaha</label>
            <input type="text" class="form-control" name="nama_badan_usaha" value="{{ $administrasi->nama_badan_usaha }}">
            @error('nama_badan_usaha')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Status Badan Usaha</label>
            <select class="form-control select2" name="status_badan_usaha">
              <option selected disabled>Pilih</option>
              <option value="pusat" @if($administrasi->status_badan_usaha == 'pusat')@selected(true)@endif>Pusat</option>
              <option value="cabang" @if($administrasi->status_badan_usaha == 'cabang')@selected(true)@endif>Cabang</option>
            </select>
            @error('status_badan_usaha')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Alamat Badan Usaha</label>
            <input type="text" class="form-control" name="alamat_badan_usaha" value="{{ $administrasi->alamat_badan_usaha }}">
            @error('alamat_badan_usaha')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>No. Telepon Badan Usaha</label>
            <input type="number" class="form-control" name="telepon_badan_usaha" value="{{ $administrasi->telepon_badan_usaha }}">
            @error('telepon_badan_usaha')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Email Badan Usaha</label>
            <input type="email" class="form-control" name="email_badan_usaha" value="{{ $administrasi->email_badan_usaha }}">
            @error('email_badan_usaha')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection