@extends('templates.pages')
@section('title')
@section('header')
<h1>Peserta Lelang : {{ $lelang->kode_lelang }}</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Peserta Lelang : {{ $lelang->kode_lelang }}</a></div>
</div>
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
      <div class="card-body">
        <div class="float-left">
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('eproc.superadmin.lelang.index') }}" class="btn btn-primary"><i class="fas fa-times"></i></a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('eproc.admin.lelang.index') }}" class="btn btn-primary"><i class="fas fa-times"></i></a>
          @endif
        </div>
        <div class="float-right">
          <form>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search">
              <div class="input-group-append">                                            
                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
  
        <div class="clearfix mb-3"></div>
  
        <div class="table-responsive">
          <table class="table table-striped table-bordered">
            <tbody>
              <tr>
                <td>No</td>
                <td>Nama Lelang</td>
                <td>Email</td>
                <td>Action</td>
              </tr>
              <?php $id = 0; ?>
              @foreach ($perusahaan as $perusahaans)
                @if($perusahaans->status_aktif == 'aktif')
                @if($perusahaans->lelang_id == $lelang->id)
                  <?php $id++; ?>
                  <tr>
                    <td>{{ $id }}</td>
                    <td>{{ $perusahaans->nama_perusahaan }}</td>
                    <td>{{ $perusahaans->email_perusahaan }}</td>
                    <td>
                      @if(auth()->user()->level == 'superadmin')
                      <a href="{{ route('eproc.superadmin.peserta.show', ['id' => $perusahaans->id, 'lelang_id' => $lelang->id]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                      @endif
                      @if(auth()->user()->level == 'admin')
                      <a href="{{ route('eproc.admin.peserta.show', ['id' => $perusahaans->id, 'lelang_id' => $lelang->id]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                      @endif
                    </td>
                  </tr>
                @endif
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection