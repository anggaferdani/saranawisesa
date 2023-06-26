@extends('templates.pages')
@section('title', 'Portofolio')
@section('header')
<h1>Portofolio</h1>
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
            <a href="{{ route('compro.superadmin.portofolio.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('compro.admin.portofolio.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                <th>Judul Portofolio</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
              <?php $id = 0; ?>
              @foreach ($portofolios as $portofolio)
                <?php $id++; ?>
                <tr>
                  <td>{{ $id }}</td>
                  <td>{{ $portofolio->judul }}</td>
                  <td>
                    @foreach ($portofolio->portofolio_images->take(1) as $portofolio_image)
                      <img src="{{ asset('compro/portofolio/image/'.$portofolio_image["image"]) }}" alt="" width="200px">
                    @endforeach
                  </td>
                  <td style="white-space: nowrap">
                    @if(auth()->user()->level == 'superadmin')
                      <form action="{{ route('compro.superadmin.portofolio.destroy', Crypt::encrypt($portofolio->id)) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('compro.superadmin.portofolio.show', Crypt::encrypt($portofolio->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                        <a href="{{ route('compro.superadmin.portofolio.edit', Crypt::encrypt($portofolio->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                        <button type="button" class="btn btn-icon btn-danger delete"><i class="fa fa-trash"></i></button>
                      </form>
                    @endif
                    @if(auth()->user()->level == 'admin')
                      <form action="{{ route('compro.admin.portofolio.destroy', Crypt::encrypt($portofolio->id)) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('compro.admin.portofolio.show', Crypt::encrypt($portofolio->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                        <a href="{{ route('compro.admin.portofolio.edit', Crypt::encrypt($portofolio->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
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
          {{ $portofolios->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection