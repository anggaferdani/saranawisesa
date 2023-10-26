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
      <div class="alert alert-primary">{{ Session::get('fail') }}</div>
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
                        <form action="{{ route('eproc.superadmin.perusahaan.destroy', Crypt::encrypt($user->id)) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('eproc.superadmin.dokumen', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <a href="{{ route('eproc.superadmin.perusahaan.batalkan-verifikasi', Crypt::encrypt($user->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-times"></i></a>
                          <button type="button" class="btn btn-icon btn-primary delete"><i class="fas fa-trash"></i></button>
                        </form>
                      @else
                        <form action="{{ route('eproc.superadmin.perusahaan.destroy', Crypt::encrypt($user->id)) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('eproc.superadmin.dokumen', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <a href="{{ route('eproc.superadmin.perusahaan.verifikasi', Crypt::encrypt($user->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-check"></i></a>
                          <button type="button" class="btn btn-icon btn-primary delete"><i class="fas fa-trash"></i></button>
                        </form>
                      @endif
                    @endif
                    @if(auth()->user()->level == 'admin')
                      @if($user->status_verifikasi2 == 'terverifikasi')
                        <form action="{{ route('eproc.admin.perusahaan.destroy', Crypt::encrypt($user->id)) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('eproc.admin.dokumen', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <a href="{{ route('eproc.admin.perusahaan.batalkan-verifikasi', Crypt::encrypt($user->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-times"></i></a>
                          <button type="button" class="btn btn-icon btn-primary delete"><i class="fas fa-trash"></i></button>
                        </form>
                      @else
                        <form action="{{ route('eproc.admin.perusahaan.destroy', Crypt::encrypt($user->id)) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('eproc.admin.dokumen', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <a href="{{ route('eproc.admin.perusahaan.verifikasi', Crypt::encrypt($user->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-check"></i></a>
                          <button type="button" class="btn btn-icon btn-primary delete"><i class="fas fa-trash"></i></button>
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