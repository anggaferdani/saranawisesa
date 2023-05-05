@extends('templates.pages')
@section('title')
@section('header')
<h1>Lelang</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Lelang</a></div>
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
            <a href="{{ route('eproc.superadmin.lelang.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('eproc.admin.lelang.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                <td>Kode Lelang</td>
                <td>Nama Lelang</td>
                <td>HPS</td>
                <td>Tgl Akhir Lelang</td>
                <td>Action</td>
              </tr>
              <?php $id = 0; ?>
              @foreach ($lelang as $lelangs)
                @if($lelangs->status_aktif == 'aktif' and $lelangs->status_pengadaan == 'lelang')
                  <?php $id++; ?>
                  <tr>
                    <td>{{ $id }}</td>
                    <td>{{ $lelangs->kode_lelang }}</td>
                    <td>{{ $lelangs->nama_lelang }}</td>
                    <td>{{ 'Rp. '.strrev(implode('.', str_split(strrev(strval($lelangs->hps)), 3))) }}</td>
                    <td>
                      @if(now()->toDateTimeString() > $lelangs->tanggal_akhir_lelang)
                        <div class="badge badge-danger">{{ $lelangs->tanggal_akhir_lelang }}</div>
                      @else
                        {{ $lelangs->tanggal_akhir_lelang }}
                      @endif
                    </td>
                    <td>
                      @if(auth()->user()->level == 'superadmin')
                        <form action="{{ route('eproc.superadmin.lelang.destroy', $lelangs->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('eproc.superadmin.lelang.show', $lelangs->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <a href="{{ route('eproc.superadmin.lelang.edit', $lelangs->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                          <a href="{{ route('eproc.superadmin.jadwal-lelang.index', $lelangs->id) }}" class="btn btn-icon btn-primary"><i class="fa fa-calendar"></i></a>
                          <button type="button" class="btn btn-icon btn-danger delete" data-id="{{ $lelangs->id }}"><i class="fa fa-trash"></i></button>
                        </form>
                      @endif
                      @if(auth()->user()->level == 'admin')
                        <form action="{{ route('eproc.admin.lelang.destroy', $lelangs->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('eproc.admin.lelang.show', $lelangs->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <a href="{{ route('eproc.admin.lelang.edit', $lelangs->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                          <a href="{{ route('eproc.admin.jadwal-lelang.index', $lelangs->id) }}" class="btn btn-icon btn-primary"><i class="fa fa-calendar"></i></a>
                          <button type="button" class="btn btn-icon btn-danger delete" data-id="{{ $lelangs->id }}"><i class="fa fa-trash"></i></button>
                        </form>
                      @endif
                    </td>
                  </tr>
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