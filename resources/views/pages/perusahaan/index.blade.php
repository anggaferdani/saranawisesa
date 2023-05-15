@extends('templates.pages')
@section('title')
@section('header')
<h1>Perusahaan</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Perusahaan</a></div>
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
  
        <div class="table-responsive" style="overflow-x: auto;">
          <table class="table table-striped table-bordered">
            <tbody>
              <tr>
                <td class="text-nowrap">No</td>
                <td class="text-nowrap">Nama Badan Usaha</td>
                <td class="text-nowrap">Email</td>
                <td class="text-nowrap">Status Badan Usaha</td>
                <td class="text-nowrap">Status Verifikasi</td>
                <td class="text-nowrap">Action</td>
              </tr>
              <?php $id = 0; ?>
              @foreach ($kualifikasi as $kualifikasis)
                @if($kualifikasis->perusahaans->users->status_aktif == 'aktif')
                  <?php $id++; ?>
                  <tr>
                    <td>{{ $id }}</td>
                    <td>{{ $kualifikasis->administrasi_nama_badan_usaha }}</td>
                    <td>
                      @if($kualifikasis->administrasi_status_badan_usaha == 'pusat')
                        {{ $kualifikasis->administrasi_email_pusat }}
                      @endif
                      @if($kualifikasis->administrasi_status_badan_usaha == 'cabang')
                        {{ $kualifikasis->administrasi_email_cabang }}
                      @endif
                    </td>
                    <td>
                      @if($kualifikasis->administrasi_status_badan_usaha == 'pusat')
                        <div class="badge badge-danger">Pusat</div>
                      @endif
                      @if($kualifikasis->administrasi_status_badan_usaha == 'cabang')
                        <div class="badge badge-primary">Cabang</div>
                      @endif
                    </td>
                    <td>
                      @if($kualifikasis->perusahaans->users->email_has_been_verified == 'terverifikasi')
                        <div class="badge badge-primary">Terverifikasi</div>
                      @endif
                      @if($kualifikasis->perusahaans->users->email_has_been_verified == 'belum_terverifikasi')
                        <div class="badge badge-danger">Belum Terverifikasi</div>
                      @endif
                    </td>
                    <td>
                      @if(auth()->user()->level == 'superadmin')
                        @if($kualifikasis->perusahaans->users->email_has_been_verified == 'terverifikasi')
                          <a href="{{ route('eproc.superadmin.perusahaan.show', $kualifikasis->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                        @else
                          <form action="{{ route('eproc.superadmin.perusahaan.verifikasi', $kualifikasis->id) }}" method="POST">
                            @csrf
                            <a href="{{ route('eproc.superadmin.perusahaan.show', $kualifikasis->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                            <button type="button" class="btn btn-icon btn-danger verifikasi" data-id="{{ $kualifikasis->id }}"><i class="fas fa-check"></i></button>
                          </form>
                        @endif
                      @endif
                      @if(auth()->user()->level == 'admin')
                        @if($kualifikasis->perusahaans->users->email_has_been_verified == 'terverifikasi')
                        <a href="{{ route('admin.superadmin.perusahaan.show', $kualifikasis->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                        @else
                        <form action="{{ route('admin.superadmin.perusahaan.verifikasi', $kualifikasis->id) }}" method="POST">
                          @csrf
                          <a href="{{ route('admin.superadmin.perusahaan.show', $kualifikasis->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <button type="button" class="btn btn-icon btn-danger verifikasi" data-id="{{ $kualifikasis->id }}"><i class="fas fa-check"></i></button>
                        </form>
                        @endif
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