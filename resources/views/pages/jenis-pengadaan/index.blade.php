@extends('templates.pages')
@section('title', 'Jenis Pengadaan')
@section('header')
<h1>Jenis Pengadaan</h1>
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
            <a href="{{ route('eproc.superadmin.jenis-pengadaan.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('eproc.admin.jenis-pengadaan.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                <td>No.</td>
                <td>Jenis Pengadaan</td>
                <td>Action</td>
              </tr>
              <?php $id = 0; ?>
              @foreach ($jenis_pengadaans as $jenis_pengadaan)
              <?php $id++; ?>
              <tr>
                <td>{{ $id }}</td>
                <td>{{ $jenis_pengadaan->jenis_pengadaan }}</td>
                <td style="white-space: nowrap">
                  @if(auth()->user()->level == 'superadmin')
                    <form action="{{ route('eproc.superadmin.jenis-pengadaan.destroy', Crypt::encrypt($jenis_pengadaan->id)) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <a href="{{ route('eproc.superadmin.jenis-pengadaan.show', Crypt::encrypt($jenis_pengadaan->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                      <a href="{{ route('eproc.superadmin.jenis-pengadaan.edit', Crypt::encrypt($jenis_pengadaan->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                      <button type="button" class="btn btn-icon btn-danger delete"><i class="fa fa-trash"></i></button>
                    </form>
                  @endif
                  @if(auth()->user()->level == 'admin')
                    <form action="{{ route('eproc.admin.jenis-pengadaan.destroy', Crypt::encrypt($jenis_pengadaan->id)) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <a href="{{ route('eproc.admin.jenis-pengadaan.show', Crypt::encrypt($jenis_pengadaan->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                      <a href="{{ route('eproc.admin.jenis-pengadaan.edit', Crypt::encrypt($jenis_pengadaan->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
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
          {{ $jenis_pengadaans->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection