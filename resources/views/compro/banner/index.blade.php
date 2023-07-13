@extends('templates.pages')
@section('title', 'Banner')
@section('header')
<h1>Banner</h1>
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
                <th>Thumbnail</th>
                <th>Katarangan</th>
                <th>Action</th>
              </tr>
              <?php $id = 0; ?>
              @foreach ($banners as $banner)
              <?php $id++; ?>
              <tr>
                <td>{{ $id }}</td>
                <td>{{ $banner->keterangan }}</td>
                <td><img src="{{ asset('compro/banner/'.$banner["thumbnail"]) }}" width="200px" alt=""></td>
                <td style="white-space: nowrap">
                  @if(auth()->user()->level == 'superadmin')
                  <form action="{{ route('compro.superadmin.banner.destroy', Crypt::encrypt($banner->id)) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('compro.superadmin.banner.show', Crypt::encrypt($banner->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                    <a href="{{ route('compro.superadmin.banner.edit', Crypt::encrypt($banner->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                    <button type="button" class="btn btn-icon btn-primary delete"><i class="fa fa-trash"></i></button>
                  </form>
                  @endif
                  @if(auth()->user()->level == 'admin')
                  <form action="{{ route('compro.superadmin.subproduk-dan-layanan.destroy', Crypt::encrypt($banner->id)) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('compro.admin.banner.show', Crypt::encrypt($banner->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                    <a href="{{ route('compro.admin.banner.edit', Crypt::encrypt($banner->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                    <button type="button" class="btn btn-icon btn-primary delete"><i class="fa fa-trash"></i></button>
                  </form>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection