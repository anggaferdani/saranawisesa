@extends('templates.pages')
@section('title')
@section('header')
<h1>Management Pengadaan</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Management Pengadaan</a></div>
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
            <a href="{{ route('eproc.superadmin.management-pengadaan.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('eproc.admin.management-pengadaan.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                <td>Kode Pengadaan</td>
                <td>Nama Pengadaan</td>
                <td>HPS</td>
                <td>Tgl Akhir Pengadaan</td>
                <td>Action</td>
              </tr>
              <?php $id = 0; ?>
              @foreach ($pengadaan as $pengadaans)
                @if($pengadaans->status_aktif == 'aktif')
                  <?php $id++; ?>
                  <tr>
                    <td>{{ $id }}</td>
                    <td>{{ $pengadaans->kode_pengadaan }}</td>
                    <td>{{ $pengadaans->nama_pengadaan }}</td>
                    <td>{{ 'Rp. '.strrev(implode('.', str_split(strrev(strval($pengadaans->hps)), 3))) }}</td>
                    <td>
                      @if(now()->toDateTimeString() > $pengadaans->tanggal_akhir_pengadaan)
                        <div class="badge badge-danger">{{ $pengadaans->tanggal_akhir_pengadaan }}</div>
                      @else
                        {{ $pengadaans->tanggal_akhir_pengadaan }}
                      @endif
                    </td>
                    <td>
                      @if(auth()->user()->level == 'superadmin')
                        <form action="{{ route('eproc.superadmin.management-pengadaan.destroy', $pengadaans->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('eproc.superadmin.management-pengadaan.show', $pengadaans->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <a href="{{ route('eproc.superadmin.management-pengadaan.edit', $pengadaans->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                          <button type="submit" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                      @endif
                      @if(auth()->user()->level == 'admin')
                        <form action="{{ route('eproc.admin.management-pengadaan.destroy', $pengadaans->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('eproc.admin.management-pengadaan.show', $pengadaans->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <a href="{{ route('eproc.admin.management-pengadaan.edit', $pengadaans->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                          <button type="submit" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button>
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