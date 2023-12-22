@extends('templates.pages')
@section('title', 'Pengadaan')
@section('header')
<h1>Pengadaan</h1>
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
          <a href="{{ route('eproc.pengadaan') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                <td>Kode Pengadaan</td>
                <td>Nama Lelang</td>
                <td>Status Pengadaan</td>
                <td>Status</td>
                <td>Action</td>
              </tr>
              <?php $id = 0; ?>
              @foreach ($lelangs as $lelang)
              <?php $id++; ?>
              <tr>
                <td>{{ $id }}</td>
                <td>{{ $lelang->kode_lelang }}</td>
                <td>{{ $lelang->nama_lelang }}</td>
                <td>
                  @if($lelang->user_id == auth()->user()->id)
                  <span class="badge badge-danger">Pemenang</span>
                  @else
                  <span class="badge badge-primary">Peserta</span>
                  @endif
                </td>
                <td>
                  @if($lelang->status_pengadaan == 'lelang')
                    Lelang
                  @endif
                  @if($lelang->status_pengadaan == 'penunjukan langsung')
                    Penunjukan Langsung
                  @endif
                </td>
                <td style="white-space: nowrap">
                  <form action="{{ route('eproc.perusahaan.pengadaan.destroy', Crypt::encrypt($lelang->id)) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('eproc.perusahaan.pengadaan.show', Crypt::encrypt($lelang->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                    <a href="{{ route('eproc.perusahaan.pengadaan.edit', Crypt::encrypt($lelang->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                    <button type="button" class="btn btn-icon btn-danger delete"><i class="fa fa-trash"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="float-right">
          {{ $lelangs->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection