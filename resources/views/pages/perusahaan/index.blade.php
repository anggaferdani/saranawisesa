@extends('templates.pages')
@section('title', 'Perusahaan')
@section('header')
<h1>Perusahaan</h1>
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
  
        <div class="table-responsive">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th>No.</th>
                <th>Nama Perusahaan</th>
                <th>Email</th>
                <th>Status Verifikasi</th>
                <th>Created At</th>
                <th>Action</th>
              </tr>
              <?php $id = 0; ?>
              @foreach ($users as $user)
                <?php $id++; ?>
                <tr>
                  <td>{{ $id }}</td>
                  <td>{{ $user->nama_panjang }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                    @if($user->status_verifikasi2 == 'terverifikasi')
                      <div class="badge badge-primary">Terverifikasi</div>
                    @endif
                    @if($user->status_verifikasi2 == 'belum terverifikasi')
                      <div class="badge badge-danger">Belum Terverifikasi</div>
                    @endif
                  </td>
                  <td>{{ $user->created_at }}</td>
                  <td style="white-space: nowrap">
                    @if(auth()->user()->level == 'superadmin')
                      @if($user->status_verifikasi2 == 'terverifikasi')
                        <form action="{{ route('eproc.superadmin.perusahaan.batalkan-verifikasi', Crypt::encrypt($user->id)) }}" method="GET">
                          @csrf
                          @method('GET')
                          <a href="{{ route('eproc.superadmin.administrasi.edit', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <a href="{{ route('eproc.superadmin.perusahaan.pdf', ['id' => Crypt::encrypt($user->id)]) }}" class="btn btn-icon btn-danger"><i class="fas fa-share"></i></a>
                          <button type="button" class="btn btn-icon btn-danger batalkanVerifikasi"><i class="fas fa-times"></i></button>
                        </form>
                      @else
                        <form action="{{ route('eproc.superadmin.perusahaan.destroy', Crypt::encrypt($user->id)) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('eproc.superadmin.administrasi.edit', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <a href="{{ route('eproc.superadmin.perusahaan.pdf', ['id' => Crypt::encrypt($user->id)]) }}" class="btn btn-icon btn-danger"><i class="fas fa-share"></i></a>
                          <button type="button" class="btn btn-icon btn-danger verifikasi"><i class="fas fa-check"></i></button>
                        </form>
                      @endif
                    @endif
                    @if(auth()->user()->level == 'admin')
                      @if($user->status_verifikasi2 == 'terverifikasi')
                        <form action="{{ route('eproc.admin.perusahaan.batalkan-verifikasi', Crypt::encrypt($user->id)) }}" method="GET">
                          @csrf
                          @method('GET')
                          <a href="{{ route('eproc.admin.administrasi.edit', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <a href="{{ route('eproc.admin.perusahaan.pdf', ['id' => Crypt::encrypt($user->id)]) }}" class="btn btn-icon btn-danger"><i class="fas fa-share"></i></a>
                          <button type="button" class="btn btn-icon btn-danger batalkanVerifikasi"><i class="fas fa-times"></i></button>
                        </form>
                      @else
                        <form action="{{ route('eproc.admin.perusahaan.destroy', Crypt::encrypt($user->id)) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('eproc.admin.administrasi.edit', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <a href="{{ route('eproc.admin.perusahaan.pdf', ['id' => Crypt::encrypt($user->id)]) }}" class="btn btn-icon btn-danger"><i class="fas fa-share"></i></a>
                          <button type="button" class="btn btn-icon btn-danger verifikasi"><i class="fas fa-check"></i></button>
                        </form>
                      @endif
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="float-right">
          {{ $users->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection