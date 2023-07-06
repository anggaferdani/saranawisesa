@extends('templates.pages')
@section('title', 'Pengalaman Perusahaan')
@section('header')
<h1>Pengalaman Perusahaan</h1>
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
      @include('eproc.menu')
    </div>

    <div class="card">
      <div class="card-body">
        <div class="float-left">
          @if(auth()->user()->level == 'perusahaan')
            <a href="{{ route('eproc.perusahaan.pengalaman-perusahaan.create', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                <th>Nama Paket Pekerjaan</th>
                <th>Kelompok</th>
                <th>Ringkas Lingkup Pekerjaan</th>
                <th>Action</th>
              </tr>
              <?php $id = 0; ?>
              @foreach ($pengalaman_perusahaans as $pengalaman_perusahaan)
                <?php $id++; ?>
                <tr>
                  <td>{{ $id }}</td>
                  <td>{{ $pengalaman_perusahaan->nama_paket_pekerjaan }}</td>
                  <td>{{ $pengalaman_perusahaan->kelompok }}</td>
                  <td>{{ $pengalaman_perusahaan->ringkas_lingkup_paket_pekerjaan }}</td>
                  <td style="white-space: nowrap">
                    @if(auth()->user()->level == 'superadmin')
                      <a href="{{ route('eproc.superadmin.pengalaman-perusahaan.show', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($pengalaman_perusahaan->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                    @endif
                    @if(auth()->user()->level == 'admin')
                      <a href="{{ route('eproc.admin.pengalaman-perusahaan.show', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($pengalaman_perusahaan->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                    @endif
                    @if(auth()->user()->level == 'perusahaan')
                      <form action="{{ route('eproc.perusahaan.pengalaman-perusahaan.destroy', ['user_id' => Crypt::encrypt(Auth::id()), 'id' => Crypt::encrypt($pengalaman_perusahaan->id)]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('eproc.perusahaan.pengalaman-perusahaan.show', ['user_id' => Crypt::encrypt(Auth::id()), 'id' => Crypt::encrypt($pengalaman_perusahaan->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                        <a href="{{ route('eproc.perusahaan.pengalaman-perusahaan.edit', ['user_id' => Crypt::encrypt(Auth::id()), 'id' => Crypt::encrypt($pengalaman_perusahaan->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
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
          {{ $pengalaman_perusahaans->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection