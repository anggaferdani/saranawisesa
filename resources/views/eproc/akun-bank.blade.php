@extends('templates.pages')
@section('title', 'Akun Bank')
@section('header')
<h1>Akun Bank</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">

    <div class="card">
      @include('eproc.profile')
    </div>

    <div class="card">
      @include('eproc.menu')
    </div>

    @if(Session::get('success'))
      <div class="alert alert-primary">{{ Session::get('success') }}</div>
    @endif

    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th>Aksi</th>
                <th>Nama Pemilik</th>
                <th>Nama Bank</th>
                <th>No. Akun</th>
                <th>Catatan</th>
              </tr>
              @foreach($akun_banks as $akun_bank)
                <tr>
                  <td class="text-center" style="white-space: nowrap">
                    @if(auth()->user()->level == 'superadmin' or auth()->user()->level == 'admin')
                      <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#akun-bank3{{ $akun_bank->id }}"><i class="fa fa-eye"></i></button>
                    @elseif(auth()->user()->level == 'perusahaan')
                      <form method="POST" action="{{ route('eproc.perusahaan.delete-akun-bank', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($akun_bank->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
                        @csrf
                        @method('DELETE')
                          <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#akun-bank2{{ $akun_bank->id }}"><i class="fa fa-pen"></i></button>
                          <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#akun-bank3{{ $akun_bank->id }}"><i class="fa fa-eye"></i></button>
                          <button type="button" class="btn btn-primary btn-icon text-white delete"><i class="fa fa-trash"></i></button>
                      </form>
                    @endif
                  </td>
                  <td>{{ $akun_bank->nama_pemilik }}</td>
                  <td>{{ $akun_bank->nama_bank }}</td>
                  <td>{{ $akun_bank->no_akun }}</td>
                  <td>{{ $akun_bank->catatan }}</td>
                </tr>
              @endforeach
              <tr>
                @if(auth()->user()->level == 'superadmin' or auth()->user()->level == 'admin')
                @elseif(auth()->user()->level == 'perusahaan')
                  <td class="text-center" style="white-space: nowrap">
                    <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#akun-bank"><i class="fa fa-plus"></i></button>
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                @endif
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- ########################################## Akun Bank ########################################## --}}
<div class="modal fade" id="akun-bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Akun Bank</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('eproc.perusahaan.post-akun-bank', ['user_id' => Crypt::encrypt($user->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Pemilik <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama_pemilik">
          </div>
          <div class="form-group">
            <label>Nama Bank <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama_bank">
          </div>
          <div class="form-group">
            <label>No. Akun <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="no_akun">
          </div>
          <div class="form-group">
            <label>Catatan</label>
            <textarea class="form-control" name="catatan"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

@foreach($akun_banks as $akun_bank2)
<div class="modal fade" id="akun-bank2{{ $akun_bank2->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Akun Bank</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('eproc.perusahaan.put-akun-bank', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($akun_bank2->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Pemilik <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama_pemilik" value="{{ $akun_bank2->nama_pemilik }}">
          </div>
          <div class="form-group">
            <label>Nama Bank <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama_bank" value="{{ $akun_bank2->nama_bank }}">
          </div>
          <div class="form-group">
            <label>No. Akun <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="no_akun" value="{{ $akun_bank2->no_akun }}">
          </div>
          <div class="form-group">
            <label>Catatan</label>
            <textarea class="form-control" name="catatan">{{ $akun_bank2->catatan }}</textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach

@foreach($akun_banks as $akun_bank2)
<div class="modal fade" id="akun-bank3{{ $akun_bank2->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Akun Bank</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Pemilik <span class="text-danger">*</span></label>
            <input disabled type="text" class="form-control" name="nama_pemilik" value="{{ $akun_bank2->nama_pemilik }}">
          </div>
          <div class="form-group">
            <label>Nama Bank <span class="text-danger">*</span></label>
            <input disabled type="text" class="form-control" name="nama_bank" value="{{ $akun_bank2->nama_bank }}">
          </div>
          <div class="form-group">
            <label>No. Akun <span class="text-danger">*</span></label>
            <input disabled type="text" class="form-control" name="no_akun" value="{{ $akun_bank2->no_akun }}">
          </div>
          <div class="form-group">
            <label>Catatan</label>
            <textarea disabled class="form-control" name="catatan">{{ $akun_bank2->catatan }}</textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach
@endsection