@extends('templates.pages')
@section('title', 'Struktur Oranisasi')
@section('header')
<h1>Struktur Oranisasi</h1>
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
                <th>Posisi</th>
                <th>Nama</th>
                <th>No. KTP</th>
                <th>Lampiran KTP</th>
                <th>No. NPWP</th>
                <th>Lampiran NPWP</th>
              </tr>
              @foreach($struktur_organisasis as $struktur_organisasi)
                <tr>
                  <td class="text-center" style="white-space: nowrap">
                    @if(auth()->user()->level == 'superadmin' or auth()->user()->level == 'admin')
                      <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#struktur-organisasi3{{ $struktur_organisasi->id }}"><i class="fa fa-eye"></i></button>
                    @elseif(auth()->user()->level == 'perusahaan')
                      <form method="POST" action="{{ route('eproc.perusahaan.delete-struktur-organisasi', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($struktur_organisasi->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
                        @csrf
                        @method('DELETE')
                          <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#struktur-organisasi2{{ $struktur_organisasi->id }}"><i class="fa fa-pen"></i></button>
                          <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#struktur-organisasi3{{ $struktur_organisasi->id }}"><i class="fa fa-eye"></i></button>
                          <button type="button" class="btn btn-primary btn-icon text-white delete"><i class="fa fa-trash"></i></button>
                      </form>
                    @endif
                  </td>
                  <td>{{ $struktur_organisasi->posisi }}</td>
                  <td>{{ $struktur_organisasi->nama }}</td>
                  <td>{{ $struktur_organisasi->no_ktp }}</td>
                  <td><a href="{{ asset('eproc/struktur-organisasi/ktp/'.$struktur_organisasi["ktp"]) }}" target="_blank">{{ Str::limit($struktur_organisasi->ktp, 20) }}</a></td>
                  <td>{{ $struktur_organisasi->no_npwp }}</td>
                  <td><a href="{{ asset('eproc/struktur-organisasi/npwp/'.$struktur_organisasi["npwp"]) }}" target="_blank">{{ Str::limit($struktur_organisasi->npwp, 20) }}</a></td>
                </tr>
              @endforeach
              <tr>
                @if(auth()->user()->level == 'superadmin' or auth()->user()->level == 'admin')
                @elseif(auth()->user()->level == 'perusahaan')
                  <td class="text-center" style="white-space: nowrap">
                    <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#struktur-organisasi"><i class="fa fa-plus"></i></button>
                  </td>
                  <td></td>
                  <td></td>
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

{{-- ########################################## Struktur Organisasi ########################################## --}}
<div class="modal fade" id="struktur-organisasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Struktur Organisasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('eproc.perusahaan.post-struktur-organisasi', ['user_id' => Crypt::encrypt($user->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Posisi <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="posisi">
          </div>
          <div class="form-group">
            <label>Nama <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama">
          </div>
          <div class="form-group">
            <label>No. KTP <span class="text-danger">*</span></label>
            <input type="number" class="form-control" name="no_ktp">
          </div>
          <div class="form-group">
            <label>Lampiran KTP <span class="text-danger">*</span></label>
            <input type="file" class="form-control" name="ktp">
          </div>
          <div class="form-group">
            <label>No. NPWP <span class="text-danger">*</span></label>
            <input type="number" class="form-control" name="no_npwp">
          </div>
          <div class="form-group">
            <label>Lampiran NPWP <span class="text-danger">*</span></label>
            <input type="file" class="form-control" name="npwp">
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

@foreach($struktur_organisasis as $struktur_organisasi2)
<div class="modal fade" id="struktur-organisasi2{{ $struktur_organisasi2->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Struktur Organisasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('eproc.perusahaan.put-struktur-organisasi', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($struktur_organisasi2->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="form-group">
            <label>Posisi <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="posisi" value="{{ $struktur_organisasi2->posisi }}">
          </div>
          <div class="form-group">
            <label>Nama <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama" value="{{ $struktur_organisasi2->nama }}">
          </div>
          <div class="form-group">
            <label>No. KTP <span class="text-danger">*</span></label>
            <input type="number" class="form-control" name="no_ktp" value="{{ $struktur_organisasi2->no_ktp }}">
          </div>
          <div class="form-group">
            <label>Lampiran KTP <span class="text-danger">*</span></label>
            <input type="file" class="form-control" name="ktp" value="{{ $struktur_organisasi2->ktp }}">
            <div><a href="{{ asset('eproc/struktur-organisasi/ktp/'.$struktur_organisasi2["ktp"]) }}" target="_blank">{{ $struktur_organisasi2->ktp }}</a></div>
          </div>
          <div class="form-group">
            <label>No. NPWP <span class="text-danger">*</span></label>
            <input type="number" class="form-control" name="no_npwp" value="{{ $struktur_organisasi2->no_npwp }}">
          </div>
          <div class="form-group">
            <label>Lampiran NPWP <span class="text-danger">*</span></label>
            <input type="file" class="form-control" name="npwp" value="{{ $struktur_organisasi2->npwp }}">
            <div><a href="{{ asset('eproc/struktur-organisasi/npwp/'.$struktur_organisasi2["npwp"]) }}" target="_blank">{{ $struktur_organisasi2->npwp }}</a></div>
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

@foreach($struktur_organisasis as $struktur_organisasi2)
<div class="modal fade" id="struktur-organisasi3{{ $struktur_organisasi2->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Struktur Organisasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="">
        <div class="modal-body">
          <div class="form-group">
            <label>Posisi <span class="text-danger">*</span></label>
            <input disabled type="text" class="form-control" name="posisi" value="{{ $struktur_organisasi2->posisi }}">
          </div>
          <div class="form-group">
            <label>Nama <span class="text-danger">*</span></label>
            <input disabled type="text" class="form-control" name="nama" value="{{ $struktur_organisasi2->nama }}">
          </div>
          <div class="form-group">
            <label>No. KTP <span class="text-danger">*</span></label>
            <input disabled type="number" class="form-control" name="no_ktp" value="{{ $struktur_organisasi2->no_ktp }}">
          </div>
          <div class="form-group">
            <label>Lampiran KTP <span class="text-danger">*</span></label>
            <input disabled type="file" class="form-control" name="ktp" value="{{ $struktur_organisasi2->ktp }}">
            <div><a href="{{ asset('eproc/struktur-organisasi/ktp/'.$struktur_organisasi2["ktp"]) }}" target="_blank">{{ $struktur_organisasi2->ktp }}</a></div>
          </div>
          <div class="form-group">
            <label>No. NPWP <span class="text-danger">*</span></label>
            <input disabled type="number" class="form-control" name="no_npwp" value="{{ $struktur_organisasi2->no_npwp }}">
          </div>
          <div class="form-group">
            <label>Lampiran NPWP <span class="text-danger">*</span></label>
            <input disabled type="file" class="form-control" name="npwp" value="{{ $struktur_organisasi2->npwp }}">
            <div><a href="{{ asset('eproc/struktur-organisasi/npwp/'.$struktur_organisasi2["npwp"]) }}" target="_blank">{{ $struktur_organisasi2->npwp }}</a></div>
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