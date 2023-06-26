@extends('templates.pages')
@section('title', 'Sisa Kemampuan Nyata')
@section('header')
<h1>Sisa Kemampuan Nyata</h1>
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
        <form method="POST" action="{{ route('eproc.perusahaan.sisa-kemampuan-nyata.update', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="needs-validation" novalidate="">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Kekayaan Bersih (KB)</label>
            <input type="text" class="form-control" name="kekayaan_bersih" value="{{ $sisa_kemampuan_nyata->kekayaan_bersih }}" onkeyup="formatNumber(this)">
          </div>
          <div class="form-group">
            <label>Modal Kerja (MK)</label>
            <input type="text" class="form-control" name="modal_kerja" value="{{ $sisa_kemampuan_nyata->modal_kerja }}" onkeyup="formatNumber(this)">
            <p>fl . KB</p>
          </div>
          <div class="form-group">
            <label>Kemampuan Nyata (KN)</label>
            <input type="text" class="form-control" name="kemampuan_nyata" value="{{ $sisa_kemampuan_nyata->kemampuan_nyata }}" onkeyup="formatNumber(this)">
            <p>fl . MK</p>
          </div>
          <div class="form-group">
            <label>Sisa Kemampuan Nyata (SKN)</label>
            <input type="text" class="form-control" name="sisa_kemampuan_nyata" value="{{ $sisa_kemampuan_nyata->sisa_kemampuan_nyata }}" onkeyup="formatNumber(this)">
            <p>KN - Σ nilai paket pekerjaan yang sedang dilaksanakan</p>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection