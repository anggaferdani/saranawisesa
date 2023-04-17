@extends('templates.pages')
@section('title')
@section('header')
<h1>Berita</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Berita</a></div>
</div>
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
            <a href="{{ route('eproc.superadmin.berita.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('eproc.admin.berita.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                <td>No</td>
                <td>Judul Berita</td>
                <td>Tanggal Publikasi</td>
                <td>Thumbnail</td>
                <td>Action</td>
              </tr>
              <?php $id = 0; ?>
              @foreach ($berita as $beritas)
                @if($beritas->status_aktif == 'aktif')
                  <?php $id++; ?>
                  <tr>
                    <td>{{ $id }}</td>
                    <td>{{ $beritas->judul_berita }}</td>
                    <td>{{ $beritas->tanggal_publikasi }}</td>
                    <td><img src="/berita/{{ $beritas->thumbnail }}" alt="" width="200px"></td>
                    <td>
                      @if(auth()->user()->level == 'superadmin')
                        <form action="{{ route('eproc.superadmin.berita.destroy', $beritas->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('eproc.superadmin.berita.show', $beritas->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <a href="{{ route('eproc.superadmin.berita.edit', $beritas->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                          <button type="submit" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                      @endif
                      @if(auth()->user()->level == 'admin')
                        <form action="{{ route('eproc.admin.berita.destroy', $beritas->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('eproc.admin.berita.show', $beritas->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <a href="{{ route('eproc.admin.berita.edit', $beritas->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                          <button type="submit" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                      @endif
                    </td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection