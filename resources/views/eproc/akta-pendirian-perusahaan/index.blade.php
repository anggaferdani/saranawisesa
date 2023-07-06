@extends('templates.pages')
@section('title', 'Akta Pendirian Perusahaan')
@section('header')
<h1>Akta Pendirian Perusahaan</h1>
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
            <a href="{{ route('eproc.perusahaan.akta-pendirian-perusahaan.create', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                <th>No. Pengesahan</th>
                <th>Tanggal Pengesahan</th>
                <th>Nama Notaris</th>
                <th>Action</th>
              </tr>
              <?php $id = 0; ?>
              @foreach ($akta_pendirian_perusahaans as $akta_pendirian_perusahaan)
                <?php $id++; ?>
                <tr>
                  <td>{{ $id }}</td>
                  <td>{{ $akta_pendirian_perusahaan->no_pengesahan }}</td>
                  <td>{{ $akta_pendirian_perusahaan->tanggal_pengesahan }}</td>
                  <td>{{ $akta_pendirian_perusahaan->nama_notaris }}</td>
                  <td style="white-space: nowrap">
                    @if(auth()->user()->level == 'superadmin')
                      <a href="{{ route('eproc.superadmin.akta-pendirian-perusahaan.show', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($akta_pendirian_perusahaan->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                    @endif
                    @if(auth()->user()->level == 'admin')
                      <a href="{{ route('eproc.admin.akta-pendirian-perusahaan.show', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($akta_pendirian_perusahaan->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                    @endif
                    @if(auth()->user()->level == 'perusahaan')
                      <form action="{{ route('eproc.perusahaan.akta-pendirian-perusahaan.destroy', ['user_id' => Crypt::encrypt(Auth::id()), 'id' => Crypt::encrypt($akta_pendirian_perusahaan->id)]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('eproc.perusahaan.akta-pendirian-perusahaan.show', ['user_id' => Crypt::encrypt(Auth::id()), 'id' => Crypt::encrypt($akta_pendirian_perusahaan->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                        <a href="{{ route('eproc.perusahaan.akta-pendirian-perusahaan.edit', ['user_id' => Crypt::encrypt(Auth::id()), 'id' => Crypt::encrypt($akta_pendirian_perusahaan->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
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
          {{ $akta_pendirian_perusahaans->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection