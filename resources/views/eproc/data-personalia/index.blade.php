@extends('templates.pages')
@section('title', 'Data Personalia')
@section('header')
<h1>Data Personalia</h1>
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
          <a href="{{ route('eproc.perusahaan.data-personalia.create', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Jabatan</th>
                <th>Action</th>
              </tr>
              <?php $id = 0; ?>
              @foreach ($data_personalias as $data_personalia)
                <?php $id++; ?>
                <tr>
                  <td>{{ $id }}</td>
                  <td>{{ $data_personalia->nama }}</td>
                  <td>{{ $data_personalia->tanggal_lahir }}</td>
                  <td>{{ $data_personalia->jabatan }}</td>
                  <td style="white-space: nowrap">
                    <form action="{{ route('eproc.perusahaan.data-personalia.destroy', ['user_id' => Crypt::encrypt(Auth::id()), 'id' => Crypt::encrypt($data_personalia->id)]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <a href="{{ route('eproc.perusahaan.data-personalia.show', ['user_id' => Crypt::encrypt(Auth::id()), 'id' => Crypt::encrypt($data_personalia->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                      <a href="{{ route('eproc.perusahaan.data-personalia.edit', ['user_id' => Crypt::encrypt(Auth::id()), 'id' => Crypt::encrypt($data_personalia->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                      <button type="button" class="btn btn-icon btn-danger delete"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="float-right">
          {{ $data_personalias->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection