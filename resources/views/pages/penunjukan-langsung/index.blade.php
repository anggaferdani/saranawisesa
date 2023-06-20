@extends('templates.pages')
@section('title', 'Penunjukan Langsung')
@section('header')
<h1>Penunjukan Langsung</h1>
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
            <a href="{{ route('eproc.superadmin.penunjukan-langsung.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('eproc.admin.penunjukan-langsung.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                <td>No.</td>
                <td>Kode Lelang</td>
                <td>Nama Perusahaan</td>
                <td>Nama Lelang</td>
                <td>Status Pengadaan</td>
                <td>Created At</td>
                <td>Action</td>
              </tr>
              <?php $id = 0; ?>
              @foreach ($penunjukan_langsungs as $penunjukan_langsung)
                <?php $id++; ?>
                <tr>
                  <td>{{ $id }}</td>
                  <td>{{ $penunjukan_langsung->kode_lelang }}</td>
                  @foreach($penunjukan_langsung->users as $users)
                    <td>{{ $users->nama_panjang }}</td>
                  @endforeach
                  <td>{{ $penunjukan_langsung->nama_lelang }}</td>
                  <td>
                    @if($penunjukan_langsung->status_pengadaan2 == 'buka')
                      <div class="badge badge-primary">Buka</div>
                    @endif
                    @if($penunjukan_langsung->status_pengadaan2 == 'tutup')
                      <div class="badge badge-warning">Tutup</div>
                    @endif
                    @if($penunjukan_langsung->status_pengadaan2 == 'selesai')
                      <div class="badge badge-danger">Selesai</div>
                    @endif
                  </td>
                  <td>{{ $penunjukan_langsung->created_at }}</td>
                  <td style="white-space: nowrap">
                    @if(auth()->user()->level == 'superadmin')
                      <form action="{{ route('eproc.superadmin.penunjukan-langsung.destroy', Crypt::encrypt($penunjukan_langsung->id)) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('eproc.superadmin.penunjukan-langsung.show', Crypt::encrypt($penunjukan_langsung->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                        <a href="{{ route('eproc.superadmin.penunjukan-langsung.edit', Crypt::encrypt($penunjukan_langsung->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                        <a href="{{ route('eproc.superadmin.jadwal-lelang.index', Crypt::encrypt($penunjukan_langsung->id)) }}" class="btn btn-icon btn-primary"><i class="fa fa-calendar"></i></a>
                        <a href="{{ route('eproc.superadmin.peserta.index', ['id' => Crypt::encrypt($penunjukan_langsung->id), 'lelang_id' => Crypt::encrypt($penunjukan_langsung->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-user"></i></a>
                        <button type="button" class="btn btn-icon btn-danger delete"><i class="fa fa-trash"></i></button>
                      </form>
                    @endif
                    @if(auth()->user()->level == 'admin')
                      <form action="{{ route('eproc.admin.penunjukan-langsung.destroy', Crypt::encrypt($penunjukan_langsung->id)) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('eproc.admin.penunjukan-langsung.show', Crypt::encrypt($penunjukan_langsung->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                        <a href="{{ route('eproc.admin.penunjukan-langsung.edit', Crypt::encrypt($penunjukan_langsung->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                        <a href="{{ route('eproc.admin.jadwal-lelang.index', Crypt::encrypt($penunjukan_langsung->id)) }}" class="btn btn-icon btn-primary"><i class="fa fa-calendar"></i></a>
                        <a href="{{ route('eproc.admin.peserta.index', ['id' => Crypt::encrypt($penunjukan_langsung->id), 'lelang_id' => Crypt::encrypt($penunjukan_langsung->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-user"></i></a>
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
          {{ $penunjukan_langsungs->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection