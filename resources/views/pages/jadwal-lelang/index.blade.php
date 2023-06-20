@extends('templates.pages')
@section('title', 'Jadwal Kegiatan Lelang')
@section('header')
<h1>Jadwal Kegiatan Lelang : {{ $lelang->kode_lelang }}</h1>
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
            <a href="{{ route('eproc.superadmin.jadwal-lelang.create',  Crypt::encrypt($lelang->id)) }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('eproc.admin.jadwal-lelang.create',  Crypt::encrypt($lelang->id)) }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                <td>No.</td>
                <td>Nama Kegiatan Lelang</td>
                <td>Tgl Mulai Kegiatan Lelang</td>
                <td>Tgl Akhir Kegiatan Lelang</td>
                <td>Created At</td>
                <td>Action</td>
              </tr>
              <?php $id = 0; ?>
              @foreach ($jadwal_lelangs as $jadwal_lelang)
                <?php $id++; ?>
                <tr>
                  <td>{{ $id }}</td>
                  <td>{{ $jadwal_lelang->nama_kegiatan_lelang }}</td>
                  <td>{{ $jadwal_lelang->tanggal_mulai_kegiatan_lelang }}</td>
                  <td>{{ $jadwal_lelang->tanggal_akhir_kegiatan_lelang }}</td>
                  <td>{{ $jadwal_lelang->created_at }}</td>
                  <td style="white-space: nowrap">
                    @if(auth()->user()->level == 'superadmin')
                      <form action="{{ route('eproc.superadmin.jadwal-lelang.destroy', ['id' =>  Crypt::encrypt($jadwal_lelang->id), 'lelang_id' =>  Crypt::encrypt($lelang->id)]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('eproc.superadmin.jadwal-lelang.show', ['id' =>  Crypt::encrypt($jadwal_lelang->id), 'lelang_id' =>  Crypt::encrypt($lelang->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                        <a href="{{ route('eproc.superadmin.jadwal-lelang.edit', ['id' =>  Crypt::encrypt($jadwal_lelang->id), 'lelang_id' =>  Crypt::encrypt($lelang->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                        <button type="button" class="btn btn-icon btn-danger delete"><i class="fa fa-trash"></i></button>
                      </form>
                    @endif
                    @if(auth()->user()->level == 'admin')
                      <form action="{{ route('eproc.admin.jadwal-lelang.destroy', ['id' =>  Crypt::encrypt($jadwal_lelang->id), 'lelang_id' =>  Crypt::encrypt($lelang->id)]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('eproc.admin.jadwal-lelang.show', ['id' =>  Crypt::encrypt($jadwal_lelang->id), 'lelang_id' =>  Crypt::encrypt($lelang->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                        <a href="{{ route('eproc.admin.jadwal-lelang.edit', ['id' =>  Crypt::encrypt($jadwal_lelang->id), 'lelang_id' =>  Crypt::encrypt($lelang->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
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
          {{ $jadwal_lelangs->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection