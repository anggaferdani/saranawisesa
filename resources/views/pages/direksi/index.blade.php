@extends('templates.pages')
@section('title')
@section('header')
<h1>Direksi</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Direksi</a></div>
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
            <a href="{{ route('compro.superadmin.direksi.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('compro.admin.direksi.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                <td class="text-center">No</td>
                <td class="text-center">Nama Direksi</td>
                <td class="text-center">Jabatan Direksi</td>
                <td class="text-center">Direksi</td>
                <td class="text-center">Action</td>
              </tr>
              <?php $id = 0; ?>
              @foreach ($direksi as $direksis)
                @if($direksis->status_aktif == 'aktif')
                  <?php $id++; ?>
                  <tr>
                    <td class="text-center">{{ $id }}</td>
                    <td class="text-center">{{ $direksis->nama_direksi }}</td>
                    <td class="text-center">{{ $direksis->jabatan_direksi }}</td>
                    <td class="text-center"><img src="/direksi/{{ $direksis->direksi }}" alt="" width="100px"></td>
                    <td class="text-center text-nowarp">
                      @if(auth()->user()->level == 'superadmin')
                        <form action="{{ route('compro.superadmin.direksi.destroy', $direksis->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('compro.superadmin.direksi.show', $direksis->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <a href="{{ route('compro.superadmin.direksi.edit', $direksis->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                          <button type="button" class="btn btn-icon btn-danger delete" data-id="{{ $direksis->id }}"><i class="fa fa-trash"></i></button>
                        </form>
                      @endif
                      @if(auth()->user()->level == 'admin')
                        <form action="{{ route('compro.admin.direksi.destroy', $direksis->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('compro.admin.direksi.show', $direksis->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <a href="{{ route('compro.admin.direksi.edit', $direksis->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                          <button type="button" class="btn btn-icon btn-danger delete" data-id="{{ $direksis->id }}"><i class="fa fa-trash"></i></button>
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