@extends('templates.pages')
@section('title', 'Pelayanan')
@section('header')
<h1>Pelayanan</h1>
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
            <label>Pelayanan</label>
            <input disabled type="text" class="form-control" name="pelayanan" value="{{ $pelayanan->pelayanan }}">
            @error('pelayanan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Created At</label>
              <input disabled type="text" class="form-control" name="created_at" value="{{ $pelayanan->created_at }}">
              @error('created_at')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="form-group col-md-6">
              <label>Updated At</label>
              <input disabled type="text" class="form-control" name="updated_at" value="{{ $pelayanan->updated_at }}">
              @error('updated_at')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
          </div>
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('eproc.superadmin.pelayanan.index') }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('eproc.admin.pelayanan.index') }}" class="btn btn-secondary">Back</a>
          @endif
        </form>
      </div>
    </div>
  </div>
</div>
@endsection