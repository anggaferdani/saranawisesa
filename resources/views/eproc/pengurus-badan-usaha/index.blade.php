@extends('templates.pages')
@section('title', 'Pengurus Badan Usaha')
@section('header')
<h1>Pengurus Badan Usaha</h1>
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
          <a href="{{ route('eproc.perusahaan.pengurus-badan-usaha.create', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                <th>Nama Pengurus Badan Usaha</th>
                <th>No. KTP/ Paspor/ Keterangan Domisili Tinggal</th>
                <th>Jabatan</th>
                <th>Action</th>
              </tr>
              <?php $id = 0; ?>
              @foreach ($pengurus_badan_usahas as $pengurus_badan_usaha)
                <?php $id++; ?>
                <tr>
                  <td>{{ $id }}</td>
                  <td>{{ $pengurus_badan_usaha->nama_pengurus_badan_usaha }}</td>
                  <td>{{ $pengurus_badan_usaha->no_ktp_paspor_keterangan_domisili_tinggal }}</td>
                  <td>
                    @if($pengurus_badan_usaha->jabatan == 'komisaris')
                      <div class="badge badge-danger">Komisaris</div>
                    @endif
                    @if($pengurus_badan_usaha->jabatan == 'direksi')
                      <div class="badge badge-primary">Direksi</div>
                    @endif
                  </td>
                  <td style="white-space: nowrap">
                    <form action="{{ route('eproc.perusahaan.pengurus-badan-usaha.destroy', ['user_id' => Crypt::encrypt(Auth::id()), 'id' => Crypt::encrypt($pengurus_badan_usaha->id)]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <a href="{{ route('eproc.perusahaan.pengurus-badan-usaha.show', ['user_id' => Crypt::encrypt(Auth::id()), 'id' => Crypt::encrypt($pengurus_badan_usaha->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                      <a href="{{ route('eproc.perusahaan.pengurus-badan-usaha.edit', ['user_id' => Crypt::encrypt(Auth::id()), 'id' => Crypt::encrypt($pengurus_badan_usaha->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                      <button type="button" class="btn btn-icon btn-danger delete"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="float-right">
          {{ $pengurus_badan_usahas->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection