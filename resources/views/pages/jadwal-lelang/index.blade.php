@extends('templates.pages')
@section('title')
@section('header')
<h1>Jadwal Lelang : {{ $lelang->kode_lelang }}</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Jadwal Lelang : {{ $lelang->kode_lelang }}</a></div>
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
            <a href="{{ route('eproc.superadmin.jadwal-lelang.create', $lelang->id) }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('eproc.admin.lelang.index') }}" class="btn btn-primary"><i class="fas fa-times"></i></a>
            <a href="{{ route('eproc.admin.jadwal-lelang.create', $lelang->id) }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                <td>Tgl Mulai Lelang</td>
                <td>Tgl Akhir Lelang</td>
                <td>Action</td>
              </tr>
              <?php $id = 0; ?>
              @foreach ($jadwal_lelang as $jadwal_lelangs)
                @if($jadwal_lelangs->status_aktif == 'aktif')
                @if($jadwal_lelangs->lelang_id == $lelang->id)
                  <?php $id++; ?>
                  <tr>
                    <td>{{ $id }}</td>
                    <td>{{ $jadwal_lelangs->nama_lelang }}</td>
                    <td>{{ $jadwal_lelangs->tanggal_mulai_lelang }}</td>
                    <td>
                      @if(now()->toDateTimeString() > $jadwal_lelangs->tanggal_akhir_lelang)
                        <div class="badge badge-danger">{{ $jadwal_lelangs->tanggal_akhir_lelang }}</div>
                      @else
                        {{ $jadwal_lelangs->tanggal_akhir_lelang }}
                      @endif
                    </td>
                    <td>
                      @if(auth()->user()->level == 'superadmin')
                        <form action="{{ route('eproc.superadmin.jadwal-lelang.destroy', ['id' => $jadwal_lelangs->id, 'lelang_id' => $lelang->id]) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('eproc.superadmin.jadwal-lelang.show', ['id' => $jadwal_lelangs->id, 'lelang_id' => $lelang->id]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <a href="{{ route('eproc.superadmin.jadwal-lelang.edit', ['id' => $jadwal_lelangs->id, 'lelang_id' => $lelang->id]) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                          <button type="submit" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                      @endif
                      @if(auth()->user()->level == 'admin')
                        <form action="{{ route('eproc.admin.jadwal-lelang.destroy', ['id' => $jadwal_lelangs->id, 'lelang_id' => $lelang->id]) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('eproc.admin.jadwal-lelang.show', ['id' => $jadwal_lelangs->id, 'lelang_id' => $lelang->id]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <a href="{{ route('eproc.admin.jadwal-lelang.edit', ['id' => $jadwal_lelangs->id, 'lelang_id' => $lelang->id]) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                          <button type="submit" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
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