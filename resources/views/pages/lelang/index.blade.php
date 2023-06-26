@extends('templates.pages')
@section('title', 'Lelang')
@section('header')
<h1>Lelang</h1>
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
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th>No.</th>
                <th>Kode Lelang</th>
                <th>Nama Lelang</th>
                <th>Status Pengadaan</th>
                <th>Created At</th>
                <th class="text-center text-nowrap">Action</th>
              </tr>
              <?php $id = 0; ?>
              @foreach ($lelangs as $lelang)
              <?php $id++; ?>
              <tr>
                <td>{{ $id }}</td>
                <td>{{ $lelang->kode_lelang }}</td>
                <td>{{ $lelang->nama_lelang }}</td>
                <td>
                  @if($lelang->status_pengadaan2 == 'buka')
                    <div class="badge badge-primary">Buka</div>
                  @endif
                  @if($lelang->status_pengadaan2 == 'tutup')
                    <div class="badge badge-warning">Tutup</div>
                  @endif
                  @if($lelang->status_pengadaan2 == 'selesai')
                    <div class="badge badge-danger">Selesai</div>
                  @endif
                </td>
                <td>{{ $lelang->created_at }}</td>
                <td style="white-space: nowrap">
                  @if(auth()->user()->level == 'superadmin')
                    <form action="{{ route('eproc.superadmin.lelang.destroy', Crypt::encrypt($lelang->id)) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <a href="{{ route('eproc.superadmin.lelang.show', Crypt::encrypt($lelang->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                      <a href="{{ route('eproc.superadmin.lelang.edit', Crypt::encrypt($lelang->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                      <a href="{{ route('eproc.superadmin.jadwal-lelang.index', Crypt::encrypt($lelang->id)) }}" class="btn btn-icon btn-primary"><i class="fa fa-calendar"></i></a>
                      <a href="{{ route('eproc.superadmin.peserta.index', Crypt::encrypt($lelang->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-user"></i></a>
                      <button type="button" class="btn btn-icon btn-danger delete"><i class="fa fa-trash"></i></button>
                    </form>
                  @endif
                  @if(auth()->user()->level == 'admin')
                    <form action="{{ route('eproc.admin.lelang.destroy', Crypt::encrypt($lelang->id)) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <a href="{{ route('eproc.admin.lelang.show', Crypt::encrypt($lelang->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                      <a href="{{ route('eproc.admin.lelang.edit', Crypt::encrypt($lelang->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                      <a href="{{ route('eproc.admin.jadwal-lelang.index', Crypt::encrypt($lelang->id)) }}" class="btn btn-icon btn-primary"><i class="fa fa-calendar"></i></a>
                      <a href="{{ route('eproc.admin.peserta.index', Crypt::encrypt($lelang->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-user"></i></a>
                      <button type="button" class="btn btn-icon btn-danger delete"><i class="fa fa-trash"></i></button>
                    </form>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="float-right">
          {{ $lelangs->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection