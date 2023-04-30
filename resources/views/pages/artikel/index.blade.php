@extends('templates.pages')
@section('title')
@section('header')
<h1>Artikel</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Artikel</a></div>
</div>
@endsection
@section('content')
<style>
  .modal-backdrop{
    display: none;
  }
</style>
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
            <a href="{{ route('compro.superadmin.artikel.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
            <a href="{{ route('compro.superadmin.export') }}" class="btn btn-success"><i class="fas fa-file-download"></i></a>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-file-upload"></i></button>
            <a href="{{ route('compro.superadmin.pdf') }}" class="btn btn-danger"><i class="fas fa-file-alt"></i></a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('compro.admin.artikel.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
            <a href="{{ route('compro.admin.export') }}" class="btn btn-success"><i class="fas fa-file-download"></i></a>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-file-upload"></i></button>
            <a href="{{ route('compro.admin.pdf') }}" class="btn btn-danger"><i class="fas fa-file-alt"></i></a>
          @endif
          @if(auth()->user()->level == 'creator')
            <a href="{{ route('compro.creator.artikel.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
            <a href="{{ route('compro.creator.export') }}" class="btn btn-success"><i class="fas fa-file-download"></i></a>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-file-upload"></i></button>
            <a href="{{ route('compro.creator.pdf') }}" class="btn btn-danger"><i class="fas fa-file-alt"></i></a>
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
                <td>Judul Artikel</td>
                <td>Tanggal Publikasi</td>
                <td>Thumbnail</td>
                <td>Action</td>
              </tr>
              <?php $id = 0; ?>
              @foreach ($artikel as $artikels)
              <?php $id = 0; ?>
                @if($artikels->status_aktif == 'aktif')
                  <?php $id++; ?>
                  <tr>
                    <td>{{ $id }}</td>
                    <td>{{ $artikels->judul_artikel }}</td>
                    <td>{{ $artikels->tanggal_publikasi }}</td>
                    <td><img src="/artikel/{{ $artikels->thumbnail }}" alt="" width="200px"></td>
                    <td>
                      @if(auth()->user()->level == 'superadmin')
                        <form action="{{ route('compro.superadmin.artikel.destroy', $artikels->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('compro.superadmin.artikel.show', $artikels->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <a href="{{ route('compro.superadmin.artikel.edit', $artikels->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                          <button type="button" class="btn btn-icon btn-danger delete" data-id="{{ $artikes->id }}"><i class="fa fa-trash"></i></button>
                        </form>
                      @endif
                      @if(auth()->user()->level == 'admin')
                        <form action="{{ route('compro.admin.artikel.destroy', $artikels->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('compro.admin.artikel.show', $artikels->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <a href="{{ route('compro.admin.artikel.edit', $artikels->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                          <button type="button" class="btn btn-icon btn-danger delete" data-id="{{ $artikes->id }}"><i class="fa fa-trash"></i></button>
                        </form>
                      @endif
                      @if(auth()->user()->level == 'creator')
                        <form action="{{ route('compro.creator.artikel.destroy', $artikels->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('compro.creator.artikel.show', $artikels->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <a href="{{ route('compro.creator.artikel.edit', $artikels->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                          <button type="button" class="btn btn-icon btn-danger delete" data-id="{{ $artikes->id }}"><i class="fa fa-trash"></i></button>
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

<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Import</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if(auth()->user()->level == 'superadmin')
          <form method="POST" action="{{ route('compro.superadmin.import') }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @endif
        @if(auth()->user()->level == 'admin')
          <form method="POST" action="{{ route('compro.admin.import') }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @endif
        @if(auth()->user()->level == 'creator')
          <form method="POST" action="{{ route('compro.creator.import') }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @endif
          @csrf
          <div class="form-group">
            <label for="file">File</label>
            <input id="file" type="file" class="form-control" name="file">
            @error('file')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection