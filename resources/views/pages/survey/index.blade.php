@extends('templates.pages')
@section('title')
@section('header')
<h1>Survey</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active"><a href="#">Survey</a></div>
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
                <td>Nama Panjang</td>
                <td>Email</td>
                <td>Created At</td>
                <td>Action</td>
              </tr>
              <?php $id = 0; ?>
              @foreach ($survey as $surveys)
                @if($surveys->status_aktif == 'aktif')
                  <?php $id++; ?>
                  <tr>
                    <td>{{ $id }}</td>
                    <td>{{ $surveys->nama_panjang }}</td>
                    <td>{{ $surveys->email }}</td>
                    <td>{{ $surveys->created_at }}</td>
                    <td>
                      @if(auth()->user()->level == 'superadmin')
                        <a href="{{ route('compro.superadmin.survey.show', $surveys->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                      @endif
                      @if(auth()->user()->level == 'admin')
                        <a href="{{ route('compro.admin.survey.show', $surveys->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                      @endif
                      @if(auth()->user()->level == 'helpdesk')
                        <a href="{{ route('compro.helpdesk.survey.show', $surveys->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
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