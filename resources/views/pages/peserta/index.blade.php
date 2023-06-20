@extends('templates.pages')
@section('title', 'Peserta Lelang')
@section('header')
<h1>Peserta Lelang : {{ $lelang->kode_lelang }}</h1>
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
            <a href="{{ route('eproc.superadmin.lelang.index') }}" class="btn btn-primary"><i class="fas fa-times"></i></a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('eproc.admin.lelang.index') }}" class="btn btn-primary"><i class="fas fa-times"></i></a>
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
                <td>Nama Lelang</td>
                <td>Email</td>
                <td>Status Peserta</td>
                <td>Created At</td>
                <td>Action</td>
              </tr>
              <?php $id = 0; ?>
              @foreach ($user_lelangs as $user)
              <?php $id++; ?>
                <tr>
                  <td>{{ $id }}</td>
                  <td>{{ $user->nama_panjang }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                    @if($lelang->user_id == $user->id)
                      <div class="badge badge-danger">Pemenang</div>
                    @else
                      <div class="badge badge-primary">Peserta</div>
                    @endif
                  </td>
                  <td>{{ $user->created_at }}</td>
                  <td style="white-space: nowrap">
                    @if(auth()->user()->level == 'superadmin')
                      <a href="{{ route('eproc.superadmin.peserta.show', ['id' => Crypt::encrypt($user->id), 'lelang_id' => Crypt::encrypt($lelang->id)]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                    @endif
                    @if(auth()->user()->level == 'admin')
                      <a href="{{ route('eproc.admin.peserta.show', ['id' => Crypt::encrypt($user->id), 'lelang_id' => $lelang->id]) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="float-right">
          {{ $user_lelangs->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection