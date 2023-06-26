@extends('templates.pages')
@section('title', 'Akun')
@section('header')
<h1>Akun</h1>
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
          @if(Session::has('compro'))
            <a href="{{ route('compro.superadmin.akun.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
          @endif
          @if(Session::has('eproc'))
            <a href="{{ route('eproc.superadmin.akun.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                <th>Nama Panjang</th>
                <th>Email</th>
                <th>Level</th>
                <th>Action</th>
              </tr>
              <?php $id = 0; ?>
              @foreach ($akuns as $akun)
                @if(Session::has('compro'))
                  @if($akun->level == 'admin' or $akun->level == 'creator' or $akun->level == 'helpdesk')
                    <?php $id++; ?>
                    <tr>
                      <td>{{ $id }}</td>
                      <td>{{ $akun->nama_panjang }}</td>
                      <td>{{ $akun->email }}</td>
                      <td>
                        @if($akun->level == 'admin')
                          <div class="badge badge-danger">Admin</div>
                        @endif
                        @if($akun->level == 'creator')
                          <div class="badge badge-primary">Creator</div>
                        @endif
                        @if($akun->level == 'helpdesk')
                          <div class="badge badge-warning">Helpdesk</div>
                        @endif
                      </td>
                      <td style="white-space: nowrap">
                        <form action="{{ route('compro.superadmin.akun.destroy', Crypt::encrypt($akun->id)) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('compro.superadmin.akun.show', Crypt::encrypt($akun->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <a href="{{ route('compro.superadmin.akun.edit', Crypt::encrypt($akun->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                          <button type="button" class="btn btn-icon btn-danger delete"><i class="fa fa-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                  @endif
                @endif
                @if(Session::has('eproc'))
                  @if($akun->level == 'admin')
                    <?php $id++; ?>
                    <tr>
                      <td>{{ $id }}</td>
                      <td>{{ $akun->nama_panjang }}</td>
                      <td>{{ $akun->email }}</td>
                      <td>
                        @if($akun->level == 'admin')
                          <div class="badge badge-danger">Admin</div>
                        @endif
                      </td>
                      <td class="text-center text-nowarp">
                        <form action="{{ route('eproc.superadmin.akun.destroy', Crypt::encrypt($akun->id)) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('eproc.superadmin.akun.show', Crypt::encrypt($akun->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                          <a href="{{ route('eproc.superadmin.akun.edit', Crypt::encrypt($akun->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                          <button type="button" class="btn btn-icon btn-danger delete"><i class="fa fa-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                  @endif
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="float-right">
          {{ $akuns->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection