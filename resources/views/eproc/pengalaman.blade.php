@extends('templates.pages')
@section('title', 'Pengalaman')
@section('header')
<h1>Pengalaman</h1>
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
                <th>Nama Pekerjaan</th>
                <th>Pemberi Pekerjaan</th>
                <th>Ruang Lingkup Pekerjaan</th>
                <th>Nilai Kontrak</th>
                <th>Dokumen Kontrak</th>
              </tr>
              @foreach($pengalamans as $pengalaman)
                <tr>
                  <td class="text-center" style="white-space: nowrap">
                    @if(auth()->user()->level == 'superadmin' or auth()->user()->level == 'admin')
                      <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#pengalaman3{{ $pengalaman->id }}"><i class="fa fa-eye"></i></button>
                    @elseif(auth()->user()->level == 'perusahaan')
                      <form method="POST" action="{{ route('eproc.perusahaan.delete-pengalaman', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($pengalaman->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
                        @csrf
                        @method('DELETE')
                          <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#pengalaman2{{ $pengalaman->id }}"><i class="fa fa-pen"></i></button>
                          <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#pengalaman3{{ $pengalaman->id }}"><i class="fa fa-eye"></i></button>
                          <button type="button" class="btn btn-primary btn-icon text-white delete"><i class="fa fa-trash"></i></button>
                      </form>
                    @endif
                  </td>
                  <td>{{ $pengalaman->nama_pekerjaan }}</td>
                  <td>{{ $pengalaman->pemberi_pekerjaan }}</td>
                  <td>{{ $pengalaman->ringkas_lingkup_pekerjaan }}</td>
                  <td style="white-space: nowrap">{{ 'Rp. '.strrev(implode('.', str_split(strrev(strval($pengalaman->nilai_kontrak)), 3))) }}</td>
                  <td><a href="{{ asset('eproc/pengalaman/kontrak/'.$pengalaman["kontrak"]) }}" target="_blank">{{ Str::limit($pengalaman->kontrak, 20) }}</a></td>
                </tr>
              @endforeach
              <tr>
                @if(auth()->user()->level == 'superadmin' or auth()->user()->level == 'admin')
                @elseif(auth()->user()->level == 'perusahaan')
                  <td class="text-center" style="white-space: nowrap">
                    <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#pengalaman"><i class="fa fa-plus"></i></button>
                  </td>
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

{{-- ########################################## PENGALAMAN ########################################## --}}
<div class="modal fade" id="pengalaman" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Pengalaman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('eproc.perusahaan.post-pengalaman', ['user_id' => Crypt::encrypt($user->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Pekerjaan</label>
            <input type="text" class="form-control" name="nama_pekerjaan">
          </div>
          <div class="form-group">
            <label>Pemberi Pekerjaan</label>
            <input type="text" class="form-control" name="pemberi_pekerjaan">
          </div>
          <div class="form-group">
            <label>Ringkas Lingkup Pekerjaan</label>
            <input type="text" class="form-control" name="ringkas_lingkup_pekerjaan">
          </div>
          <div class="form-group">
            <label>Lokasi</label>
            <input type="text" class="form-control" name="lokasi">
          </div>
          <div class="form-group">
            <label>Tanggal Kontrak</label>
            <input type="date" class="form-control" name="tanggal_kontrak">
          </div>
          <div class="form-group">
            <label>Nilai Kontrak</label>
            <input type="text" class="form-control" name="nilai_kontrak" onkeyup="formatNumber(this)">
          </div>
          <div class="form-group">
            <label>Upload Kontrak</label>
            <input type="file" class="form-control" name="kontrak">
          </div>
          <div class="form-group">
            <label>Tanggal Selesai Berdasarkan Kontrak</label>
            <input type="date" class="form-control" name="tanggal_selesai_berdasarkan_kontrak">
          </div>
          <div class="form-group">
            <label>Tanggal Selesai Berdasarkan BA Serah Terima</label>
            <input type="date" class="form-control" name="tanggal_selesai_berdasarkan_ba_serah_terima">
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

@foreach($pengalamans as $pengalaman2)
<div class="modal fade" id="pengalaman2{{ $pengalaman2->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Pengalaman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('eproc.perusahaan.put-pengalaman', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($pengalaman2->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Pekerjaan</label>
            <input type="text" class="form-control" name="nama_pekerjaan" value="{{ $pengalaman2->nama_pekerjaan }}">
          </div>
          <div class="form-group">
            <label>Pemberi Pekerjaan</label>
            <input type="text" class="form-control" name="pemberi_pekerjaan" value="{{ $pengalaman2->pemberi_pekerjaan }}">
          </div>
          <div class="form-group">
            <label>Ringkas Lingkup Pekerjaan</label>
            <input type="text" class="form-control" name="ringkas_lingkup_pekerjaan" value="{{ $pengalaman2->ringkas_lingkup_pekerjaan }}">
          </div>
          <div class="form-group">
            <label>Lokasi</label>
            <input type="text" class="form-control" name="lokasi" value="{{ $pengalaman2->lokasi }}">
          </div>
          <div class="form-group">
            <label>Tanggal Kontrak</label>
            <input type="date" class="form-control" name="tanggal_kontrak" value="{{ $pengalaman2->tanggal_kontrak }}">
          </div>
          <div class="form-group">
            <label>Nilai Kontrak</label>
            <input type="text" class="form-control" name="nilai_kontrak" value="{{ $pengalaman2->nilai_kontrak }}" onkeyup="formatNumber(this)">
          </div>
          <div class="form-group">
            <label>Upload Kontrak</label>
            <input type="file" class="form-control" name="kontrak" value="{{ $pengalaman2->kontrak }}">
            <div><a href="{{ asset('eproc/pengalaman/kontrak/'.$pengalaman2["kontrak"]) }}" target="_blank">{{ $pengalaman2->kontrak }}</a></div>
          </div>
          <div class="form-group">
            <label>Tanggal Selesai Berdasarkan Kontrak</label>
            <input type="date" class="form-control" name="tanggal_selesai_berdasarkan_kontrak" value="{{ $pengalaman2->tanggal_selesai_berdasarkan_kontrak }}">
          </div>
          <div class="form-group">
            <label>Tanggal Selesai Berdasarkan BA Serah Terima</label>
            <input type="date" class="form-control" name="tanggal_selesai_berdasarkan_ba_serah_terima" value="{{ $pengalaman2->tanggal_selesai_berdasarkan_ba_serah_terima }}">
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

@foreach($pengalamans as $pengalaman2)
<div class="modal fade" id="pengalaman3{{ $pengalaman2->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Pengalaman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Pekerjaan</label>
            <input disabled type="text" class="form-control" name="nama_pekerjaan" value="{{ $pengalaman2->nama_pekerjaan }}">
          </div>
          <div class="form-group">
            <label>Pemberi Pekerjaan</label>
            <input disabled type="text" class="form-control" name="pemberi_pekerjaan" value="{{ $pengalaman2->pemberi_pekerjaan }}">
          </div>
          <div class="form-group">
            <label>Ringkas Lingkup Pekerjaan</label>
            <input disabled type="text" class="form-control" name="ringkas_lingkup_pekerjaan" value="{{ $pengalaman2->ringkas_lingkup_pekerjaan }}">
          </div>
          <div class="form-group">
            <label>Lokasi</label>
            <input disabled type="text" class="form-control" name="lokasi" value="{{ $pengalaman2->lokasi }}">
          </div>
          <div class="form-group">
            <label>Tanggal Kontrak</label>
            <input disabled type="date" class="form-control" name="tanggal_kontrak" value="{{ $pengalaman2->tanggal_kontrak }}">
          </div>
          <div class="form-group">
            <label>Nilai Kontrak</label>
            <input disabled type="text" class="form-control" name="nilai_kontrak" value="{{ $pengalaman2->nilai_kontrak }}" onkeyup="formatNumber(this)">
          </div>
          <div class="form-group">
            <label>Upload Kontrak</label>
            <input disabled type="file" class="form-control" name="kontrak" value="{{ $pengalaman2->kontrak }}">
            <div><a href="{{ asset('eproc/pengalaman/kontrak/'.$pengalaman2["kontrak"]) }}" target="_blank">{{ $pengalaman2->kontrak }}</a></div>
          </div>
          <div class="form-group">
            <label>Tanggal Selesai Berdasarkan Kontrak</label>
            <input disabled type="date" class="form-control" name="tanggal_selesai_berdasarkan_kontrak" value="{{ $pengalaman2->tanggal_selesai_berdasarkan_kontrak }}">
          </div>
          <div class="form-group">
            <label>Tanggal Selesai Berdasarkan BA Serah Terima</label>
            <input disabled type="date" class="form-control" name="tanggal_selesai_berdasarkan_ba_serah_terima" value="{{ $pengalaman2->tanggal_selesai_berdasarkan_ba_serah_terima }}">
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