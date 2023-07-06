@extends('templates.pages')
@section('title', 'Susunan Kepemilikan Saham')
@section('header')
<h1>Susunan Kepemilikan Saham</h1>
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
            <a href="{{ route('eproc.perusahaan.susunan-kepemilikan-saham.create', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                <th>Nama Pemilik Saham</th>
                <th>No. KTP/ Paspor/ Keterangan Domisili Tinggal</th>
                <th>Persentase</th>
                <th>Action</th>
              </tr>
              <?php $id = 0; ?>
              @foreach ($susunan_kepemilikan_sahams as $susunan_kepemilikan_saham)
                <?php $id++; ?>
                <tr>
                  <td>{{ $id }}</td>
                  <td>{{ $susunan_kepemilikan_saham->nama_pemilik_saham }}</td>
                  <td>{{ $susunan_kepemilikan_saham->no_ktp_paspor_keterangan_domisili_tinggal_pemilik_saham }}</td>
                  <td>{{ $susunan_kepemilikan_saham->persentase_kepemilikan_saham }}</td>
                  <td style="white-space: nowrap">
                    @if(auth()->user()->level == 'superadmin')
                      <a href="{{ route('eproc.superadmin.susunan-kepemilikan-saham.show', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($susunan_kepemilikan_saham->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                    @endif
                    @if(auth()->user()->level == 'admin')
                      <a href="{{ route('eproc.admin.susunan-kepemilikan-saham.show', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($susunan_kepemilikan_saham->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                    @endif
                    @if(auth()->user()->level == 'perusahaan')
                      <form action="{{ route('eproc.perusahaan.susunan-kepemilikan-saham.destroy', ['user_id' => Crypt::encrypt(Auth::id()), 'id' => Crypt::encrypt($susunan_kepemilikan_saham->id)]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('eproc.perusahaan.susunan-kepemilikan-saham.show', ['user_id' => Crypt::encrypt(Auth::id()), 'id' => Crypt::encrypt($susunan_kepemilikan_saham->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                        <a href="{{ route('eproc.perusahaan.susunan-kepemilikan-saham.edit', ['user_id' => Crypt::encrypt(Auth::id()), 'id' => Crypt::encrypt($susunan_kepemilikan_saham->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
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
          {{ $susunan_kepemilikan_sahams->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection