@extends('templates.pages')
@section('title', 'Gambar Perusahaan')
@section('header')
<h1>Gambar Perusahaan</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">

    @if(Session::get('success2'))
      <div class="alert alert-primary">{{ Session::get('success2') }}</div>
    @endif

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
                <th>Image</th>
                <th>Keterangan</th>
                <th>Tanggal Publikasi</th>
                <th>Catatan</th>
              </tr>
              @foreach($gambar_perusahaans as $gambar_perusahaan)
                <tr>
                  <td class="text-center" style="white-space: nowrap">
                    @if(auth()->user()->level == 'superadmin' or auth()->user()->level == 'admin')
                      <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#gambar-perusahaan3{{ $gambar_perusahaan->id }}"><i class="fa fa-eye"></i></button>
                    @elseif(auth()->user()->level == 'perusahaan')
                      <form method="POST" action="{{ route('eproc.perusahaan.delete-gambar-perusahaan', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($gambar_perusahaan->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
                        @csrf
                        @method('DELETE')
                          <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#gambar-perusahaan2{{ $gambar_perusahaan->id }}"><i class="fa fa-pen"></i></button>
                          <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#gambar-perusahaan3{{ $gambar_perusahaan->id }}"><i class="fa fa-eye"></i></button>
                          <button type="button" class="btn btn-primary btn-icon text-white delete"><i class="fa fa-trash"></i></button>
                      </form>
                    @endif
                  </td>
                  <td><div style="width: 200px; height: 150px;"><img src="{{ asset('eproc/gambar-perusahaan/image/'.$gambar_perusahaan["image"]) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;"></div></td>
                  <td>{{ $gambar_perusahaan->keterangan }}</td>
                  <td>{{ $gambar_perusahaan->tanggal_publikasi }}</td>
                  <td>{{ $gambar_perusahaan->catatan }}</td>
                </tr>
              @endforeach
              <tr>
                @if(auth()->user()->level == 'superadmin' or auth()->user()->level == 'admin')
                @elseif(auth()->user()->level == 'perusahaan')
                  <td class="text-center" style="white-space: nowrap">
                    <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#gambar-perusahaan"><i class="fa fa-plus"></i></button>
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

{{-- ########################################## Gambar Perusahaan ########################################## --}}
<div class="modal fade" id="gambar-perusahaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Gambar Perusahaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('eproc.perusahaan.post-gambar-perusahaan', ['user_id' => Crypt::encrypt($user->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Image <span class="text-danger">*</span></label>
            <input type="file" class="form-control" name="image">
          </div>
          <div class="form-group">
            <label>Keterangan <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="keterangan">
          </div>
          <div class="form-group">
            <label>Tanggal Publikasi <span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="tanggal_publikasi">
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

@foreach($gambar_perusahaans as $gambar_perusahaan2)
<div class="modal fade" id="gambar-perusahaan2{{ $gambar_perusahaan2->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Gambar Perusahaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('eproc.perusahaan.put-gambar-perusahaan', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($gambar_perusahaan2->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="form-group">
            <label>Image <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="image" value="{{ $gambar_perusahaan2->image }}" onchange="file(event)">
            <div><img src="{{ asset('eproc/gambar-perusahaan/image/'.$gambar_perusahaan2["image"]) }}" class="image" alt="" width="200px"></div>
          </div>
          <div class="form-group">
            <label>Keterangan <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="keterangan" value="{{ $gambar_perusahaan2->keterangan }}">
          </div>
          <div class="form-group">
            <label>Tanggal Publikasi <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="tanggal_publikasi" value="{{ $gambar_perusahaan2->tanggal_publikasi }}">
          </div>
          <div class="form-group">
            <label>Catatan</label>
            <textarea class="form-control" name="catatan">{{ $gambar_perusahaan2->catatan }}</textarea>
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

@foreach($gambar_perusahaans as $gambar_perusahaan2)
<div class="modal fade" id="gambar-perusahaan3{{ $gambar_perusahaan2->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Gambar Perusahaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="">
        <div class="modal-body">
          <div class="form-group">
            <label>Image <span class="text-danger">*</span></label>
            <input disabled type="text" class="form-control" name="image" value="{{ $gambar_perusahaan2->image }}" onchange="file(event)">
            <div><img src="{{ asset('eproc/gambar-perusahaan/image/'.$gambar_perusahaan2["image"]) }}" class="image" alt="" width="200px"></div>
          </div>
          <div class="form-group">
            <label>Keterangan <span class="text-danger">*</span></label>
            <input disabled type="text" class="form-control" name="keterangan" value="{{ $gambar_perusahaan2->keterangan }}">
          </div>
          <div class="form-group">
            <label>Tanggal Publikasi <span class="text-danger">*</span></label>
            <input disabled type="text" class="form-control" name="tanggal_publikasi" value="{{ $gambar_perusahaan2->tanggal_publikasi }}">
          </div>
          <div class="form-group">
            <label>Catatan</label>
            <textarea disabled class="form-control" name="catatan">{{ $gambar_perusahaan2->catatan }}</textarea>
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