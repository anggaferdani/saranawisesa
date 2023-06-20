@extends('templates.pages')
@section('title', 'Setting')
@section('header')
<h1>Setting</h1>
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
                <th>Isi</th>
                <th>Link</th>
                <th>Action</th>
              </tr>
              <?php $id = 0; ?>
              @foreach ($settings as $setting)
              <?php $id++; ?>
              <tr>
                <td>{{ $id }}</td>
                <td>{{ $setting->isi }}</td>
                <td><a href="{{ $setting->link }}">{{ $setting->link }}</a></td>
                <td style="white-space: nowrap">
                  @if(auth()->user()->level == 'superadmin')
                    <a href="{{ route('compro.superadmin.setting.show', Crypt::encrypt($setting->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                    <a href="{{ route('compro.superadmin.setting.edit', Crypt::encrypt($setting->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                  @endif
                  @if(auth()->user()->level == 'admin')
                    <a href="{{ route('compro.admin.setting.show', Crypt::encrypt($setting->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                    <a href="{{ route('compro.admin.setting.edit', Crypt::encrypt($setting->id)) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
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