@extends('templates.pages')
@section('title', 'Akta Pendirian')
@section('header')
<h1>Akta Pendirian</h1>
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
                <th>No.</th>
                <th>Aksi</th>
                <th>Tipe Dokumen</th>
                <th>Berkas Dokumen</th>
                <th style="white-space: nowrap">Kode Dokumen</th>
                <th>Tanggal Terbit</th>
                <th>Tanggal Kadaluarsa</th>
              </tr>
              <tr>
                <td>1</td>
                @if(auth()->user()->level == 'superadmin' or auth()->user()->level == 'admin')
                  <td class="text-center" style="white-space: nowrap">
                    @if(!empty($akta_pendirian))
                      <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#akta-pendirian3"><i class="fa fa-eye"></i></button>
                    @else
                      <button disabled type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target=""><i class="fa fa-eye"></i></button>
                    @endif
                  </td>
                @elseif(auth()->user()->level == 'perusahaan')
                  <td class="text-center" style="white-space: nowrap">
                    @if(!empty($akta_pendirian))
                    <form method="POST" action="{{ route('eproc.perusahaan.delete-akta-pendirian', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($akta_pendirian->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
                      @csrf
                      @method('DELETE')
                        <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#akta-pendirian2"><i class="fa fa-pen"></i></button>
                        <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#akta-pendirian3"><i class="fa fa-eye"></i></button>
                        <button type="button" class="btn btn-primary btn-icon text-white delete"><i class="fa fa-trash"></i></button>
                      </form>
                    @else
                      <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#akta-pendirian"><i class="fa fa-plus"></i></button>
                    @endif
                  </td>
                @endif
                @if(!empty($akta_pendirian))
                  <td>Akta Pendirian <span class="text-danger">*wajib</span></td>
                  <td><a href="{{ asset('eproc/akta-pendirian/akta/'.$akta_pendirian["akta"]) }}" target="_blank">{{ Str::limit($akta_pendirian->akta, 20) }}</a></td>
                  <td>{{ $akta_pendirian->kode_dokumen }}</td>
                  <td></td>
                  <td></td>
                @else
                  <td>Akta Pendirian <span class="text-danger">*wajib</span></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                @endif
              </tr>
              <tr>
                <td>2</td>
                @if(auth()->user()->level == 'superadmin' or auth()->user()->level == 'admin')
                  <td class="text-center" style="white-space: nowrap">
                    @if(!empty($surat_keterangan_domisili_perusahaan))
                      <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#surat-keterangan-domisili-perusahaan3"><i class="fa fa-eye"></i></button>
                    @else
                      <button disabled type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target=""><i class="fa fa-eye"></i></button>
                    @endif
                  </td>
                @elseif(auth()->user()->level == 'perusahaan')
                  <td class="text-center" style="white-space: nowrap">
                    @if(!empty($surat_keterangan_domisili_perusahaan))
                    <form method="POST" action="{{ route('eproc.perusahaan.delete-surat-keterangan-domisili-perusahaan', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($surat_keterangan_domisili_perusahaan->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
                      @csrf
                      @method('DELETE')
                        <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#surat-keterangan-domisili-perusahaan2"><i class="fa fa-pen"></i></button>
                        <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#surat-keterangan-domisili-perusahaan3"><i class="fa fa-eye"></i></button>
                        <button type="button" class="btn btn-primary btn-icon text-white delete"><i class="fa fa-trash"></i></button>
                      </form>
                    @else
                      <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#surat-keterangan-domisili-perusahaan"><i class="fa fa-plus"></i></button>
                    @endif
                  </td>
                @endif
                @if(!empty($surat_keterangan_domisili_perusahaan))
                  <td>Surat Keterangan Domisili Perusahaan (SKDP) <span class="text-danger">*wajib</span></td>
                  <td><a href="{{ asset('eproc/surat-keterangan-domisili-perusahaan/'.$surat_keterangan_domisili_perusahaan["skdp"]) }}" target="_blank">{{ Str::limit($surat_keterangan_domisili_perusahaan->skdp, 20) }}</a></td>
                  <td>{{ $surat_keterangan_domisili_perusahaan->kode_dokumen }}</td>
                  <td>{{ $surat_keterangan_domisili_perusahaan->tanggal_terbit }}</td>
                  <td>{{ $surat_keterangan_domisili_perusahaan->tanggal_jatuh_tempo }}</td>
                @else
                  <td>Surat Keterangan Domisili Perusahaan (SKDP) <span class="text-danger">*wajib</span></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                @endif
              </tr>
              <tr>
                <td>3</td>
                @if(auth()->user()->level == 'superadmin' or auth()->user()->level == 'admin')
                  <td class="text-center" style="white-space: nowrap">
                    @if(!empty($surat_izin_usaha_perdagangan))
                      <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#surat-izin-usaha-perdagangan3"><i class="fa fa-eye"></i></button>
                    @else
                      <button disabled type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target=""><i class="fa fa-eye"></i></button>
                    @endif
                  </td>
                @elseif(auth()->user()->level == 'perusahaan')
                  <td class="text-center" style="white-space: nowrap">
                    @if(!empty($surat_izin_usaha_perdagangan))
                    <form method="POST" action="{{ route('eproc.perusahaan.delete-surat-izin-usaha-perdagangan', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($surat_izin_usaha_perdagangan->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
                      @csrf
                      @method('DELETE')
                        <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#surat-izin-usaha-perdagangan2"><i class="fa fa-pen"></i></button>
                        <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#surat-izin-usaha-perdagangan3"><i class="fa fa-eye"></i></button>
                        <button type="button" class="btn btn-primary btn-icon text-white delete"><i class="fa fa-trash"></i></button>
                      </form>
                    @else
                      <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#surat-izin-usaha-perdagangan"><i class="fa fa-plus"></i></button>
                    @endif
                  </td>
                @endif
                @if(!empty($surat_izin_usaha_perdagangan))
                  <td>Surat Izin Usaha Perdagangan (SIUP) <span class="text-danger">*wajib</span></td>
                  <td><a href="{{ asset('eproc/surat-izin-usaha-perdagangan/'.$surat_izin_usaha_perdagangan["siup"]) }}" target="_blank">{{ Str::limit($surat_izin_usaha_perdagangan->siup, 20) }}</a></td>
                  <td>{{ $surat_izin_usaha_perdagangan->kode_dokumen }}</td>
                  <td>{{ $surat_izin_usaha_perdagangan->tanggal_terbit }}</td>
                  <td>{{ $surat_izin_usaha_perdagangan->tanggal_jatuh_tempo }}</td>
                @else
                  <td>Surat Izin Usaha Perdagangan (SIUP) <span class="text-danger">*wajib</span></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                @endif
              </tr>
              <tr>
                <td>4</td>
                @if(auth()->user()->level == 'superadmin' or auth()->user()->level == 'admin')
                  <td class="text-center" style="white-space: nowrap">
                    @if(!empty($nomor_induk_berusaha))
                      <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#nomor-induk-berusaha3"><i class="fa fa-eye"></i></button>
                    @else
                      <button disabled type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target=""><i class="fa fa-eye"></i></button>
                    @endif
                  </td>
                @elseif(auth()->user()->level == 'perusahaan')
                  <td class="text-center" style="white-space: nowrap">
                    @if(!empty($nomor_induk_berusaha))
                    <form method="POST" action="{{ route('eproc.perusahaan.delete-nomor-induk-berusaha', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($nomor_induk_berusaha->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
                      @csrf
                      @method('DELETE')
                        <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#nomor-induk-berusaha2"><i class="fa fa-pen"></i></button>
                        <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#nomor-induk-berusaha3"><i class="fa fa-eye"></i></button>
                        <button type="button" class="btn btn-primary btn-icon text-white delete"><i class="fa fa-trash"></i></button>
                      </form>
                    @else
                      <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#nomor-induk-berusaha"><i class="fa fa-plus"></i></button>
                    @endif
                  </td>
                @endif
                @if(!empty($nomor_induk_berusaha))
                  <td>Nomor Induk Berusaha (NIB) <span class="text-danger">*wajib</span></td>
                  <td><a href="{{ asset('eproc/nomor-induk-berusaha/'.$nomor_induk_berusaha["nib"]) }}" target="_blank">{{ Str::limit($nomor_induk_berusaha->nib, 20) }}</a></td>
                  <td>{{ $nomor_induk_berusaha->kode_dokumen }}</td>
                  <td>{{ $nomor_induk_berusaha->tanggal_terbit }}</td>
                  <td></td>
                @else
                  <td>Nomor Induk Berusaha (NIB) <span class="text-danger">*wajib</span></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                @endif
              </tr>
              <tr>
                <td>5</td>
                @if(auth()->user()->level == 'superadmin' or auth()->user()->level == 'admin')
                  <td class="text-center" style="white-space: nowrap">
                    @if(!empty($nomor_pokok_wajib_pajak))
                      <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#nomor-pokok-wajib-pajak3"><i class="fa fa-eye"></i></button>
                    @else
                      <button disabled type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target=""><i class="fa fa-eye"></i></button>
                    @endif
                  </td>
                @elseif(auth()->user()->level == 'perusahaan')
                  <td class="text-center" style="white-space: nowrap">
                    @if(!empty($nomor_pokok_wajib_pajak))
                    <form method="POST" action="{{ route('eproc.perusahaan.delete-nomor-pokok-wajib-pajak', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($nomor_pokok_wajib_pajak->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
                      @csrf
                      @method('DELETE')
                        <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#nomor-pokok-wajib-pajak2"><i class="fa fa-pen"></i></button>
                        <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#nomor-pokok-wajib-pajak3"><i class="fa fa-eye"></i></button>
                        <button type="button" class="btn btn-primary btn-icon text-white delete"><i class="fa fa-trash"></i></button>
                      </form>
                    @else
                      <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#nomor-pokok-wajib-pajak"><i class="fa fa-plus"></i></button>
                    @endif
                  </td>
                @endif
                @if(!empty($nomor_pokok_wajib_pajak))
                  <td>Nomor Pokok Wajib Pajak (NPWP) <span class="text-danger">*wajib</span></td>
                  <td><a href="{{ asset('eproc/nomor-pokok-wajib-pajak/'.$nomor_pokok_wajib_pajak["npwp"]) }}" target="_blank">{{ Str::limit($nomor_pokok_wajib_pajak->npwp, 20) }}</a></td>
                  <td>{{ $nomor_pokok_wajib_pajak->kode_dokumen }}</td>
                  <td></td>
                  <td></td>
                @else
                  <td>Nomor Pokok Wajib Pajak (NPWP) <span class="text-danger">*wajib</span></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                @endif
              </tr>
              <tr>
                <td>6</td>
                @if(auth()->user()->level == 'superadmin' or auth()->user()->level == 'admin')
                  <td class="text-center" style="white-space: nowrap">
                    @if(!empty($surat_pengukuhan_perusahaan_kena_pajak))
                      <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#surat-pengukuhan-perusahaan-kena-pajak3"><i class="fa fa-eye"></i></button>
                    @else
                      <button disabled type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target=""><i class="fa fa-eye"></i></button>
                    @endif
                  </td>
                @elseif(auth()->user()->level == 'perusahaan')
                  <td class="text-center" style="white-space: nowrap">
                    @if(!empty($surat_pengukuhan_perusahaan_kena_pajak))
                    <form method="POST" action="{{ route('eproc.perusahaan.delete-surat-pengukuhan-perusahaan-kena-pajak', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($surat_pengukuhan_perusahaan_kena_pajak->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
                      @csrf
                      @method('DELETE')
                        <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#surat-pengukuhan-perusahaan-kena-pajak2"><i class="fa fa-pen"></i></button>
                        <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#surat-pengukuhan-perusahaan-kena-pajak3"><i class="fa fa-eye"></i></button>
                        <button type="button" class="btn btn-primary btn-icon text-white delete"><i class="fa fa-trash"></i></button>
                      </form>
                    @else
                      <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#surat-pengukuhan-perusahaan-kena-pajak"><i class="fa fa-plus"></i></button>
                    @endif
                  </td>
                @endif
                @if(!empty($surat_pengukuhan_perusahaan_kena_pajak))
                  <td>Surat Pengukuhan Perusahaan Kena Pajak (SPPKP)</td>
                  <td><a href="{{ asset('eproc/surat-pengukuhan-perusahaan-kena-pajak/'.$surat_pengukuhan_perusahaan_kena_pajak["sppkp"]) }}" target="_blank">{{ Str::limit($surat_pengukuhan_perusahaan_kena_pajak->sppkp, 20) }}</a></td>
                  <td>{{ $surat_pengukuhan_perusahaan_kena_pajak->kode_dokumen }}</td>
                  <td>{{ $surat_pengukuhan_perusahaan_kena_pajak->tanggal_terbit }}</td>
                  <td></td>
                @else
                  <td>Surat Pengukuhan Perusahaan Kena Pajak (SPPKP)</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                @endif
              </tr>
              <tr>
                <td>7</td>
                @if(auth()->user()->level == 'superadmin' or auth()->user()->level == 'admin')
                  <td class="text-center" style="white-space: nowrap">
                    @if(!empty($surat_izin_operasional))
                      <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#surat-izin-operasional3"><i class="fa fa-eye"></i></button>
                    @else
                      <button disabled type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target=""><i class="fa fa-eye"></i></button>
                    @endif
                  </td>
                @elseif(auth()->user()->level == 'perusahaan')
                  <td class="text-center" style="white-space: nowrap">
                    @if(!empty($surat_izin_operasional))
                    <form method="POST" action="{{ route('eproc.perusahaan.delete-surat-izin-operasional', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($surat_izin_operasional->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
                      @csrf
                      @method('DELETE')
                        <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#surat-izin-operasional2"><i class="fa fa-pen"></i></button>
                        <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#surat-izin-operasional3"><i class="fa fa-eye"></i></button>
                        <button type="button" class="btn btn-primary btn-icon text-white delete"><i class="fa fa-trash"></i></button>
                      </form>
                    @else
                      <button type="button" class="btn btn-primary btn-icon text-white" data-toggle="modal" data-target="#surat-izin-operasional"><i class="fa fa-plus"></i></button>
                    @endif
                  </td>
                @endif
                @if(!empty($surat_izin_operasional))
                  <td>Surat Izin Operasional (SIO)</td>
                  <td><a href="{{ asset('eproc/surat-izin-operasional/'.$surat_izin_operasional["sio"]) }}" target="_blank">{{ Str::limit($surat_izin_operasional->sio, 20) }}</a></td>
                  <td>{{ $surat_izin_operasional->kode_dokumen }}</td>
                  <td>{{ $surat_izin_operasional->tanggal_terbit }}</td>
                  <td>{{ $surat_izin_operasional->tanggal_jatuh_tempo }}</td>
                @else
                  <td>Surat Izin Operasional (SIO)</td>
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

{{-- ########################################## AKTA PENDIRIAN ########################################## --}}
<div class="modal fade" id="akta-pendirian" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Akta Pendirian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('eproc.perusahaan.post-akta-pendirian') }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>No. Akta</label>
            <input type="text" class="form-control" name="no_akta">
          </div>
          <div class="form-group">
            <label>Tanggal Akta</label>
            <input type="date" class="form-control" name="tanggal_akta">
          </div>
          <div class="form-group">
            <label>Nama Notaris</label>
            <input type="text" class="form-control" name="nama_notaris">
          </div>
          <div class="form-group">
            <label>No. SK</label>
            <input type="text" class="form-control" name="no_sk">
          </div>
          <div class="form-group">
            <label>Tanggal SK</label>
            <input type="date" class="form-control" name="tanggal_sk">
          </div>
          <div class="form-group">
            <label>Upload Akta</label>
            <input type="file" class="form-control" name="akta">
          </div>
          <div class="form-group">
            <label>Upload SK</label>
            <input type="file" class="form-control" name="sk">
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

<div class="modal fade" id="akta-pendirian2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Akta Pendirian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if(!empty($akta_pendirian))
        <form method="POST" action="{{ route('eproc.perusahaan.put-akta-pendirian', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($akta_pendirian->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="form-group">
              <label>No. Akta</label>
              <input type="text" class="form-control" name="no_akta" value="{{ $akta_pendirian->no_akta }}">
            </div>
            <div class="form-group">
              <label>Tanggal Akta</label>
              <input type="date" class="form-control" name="tanggal_akta" value="{{ $akta_pendirian->tanggal_akta }}">
            </div>
            <div class="form-group">
              <label>Nama Notaris</label>
              <input type="text" class="form-control" name="nama_notaris" value="{{ $akta_pendirian->nama_notaris }}">
            </div>
            <div class="form-group">
              <label>No. SK</label>
              <input type="text" class="form-control" name="no_sk" value="{{ $akta_pendirian->no_sk }}">
            </div>
            <div class="form-group">
              <label>Tanggal SK</label>
              <input type="date" class="form-control" name="tanggal_sk" value="{{ $akta_pendirian->tanggal_sk }}">
            </div>
            <div class="form-group">
              <label>Upload Akta</label>
              <input type="file" class="form-control" name="akta" value="{{ $akta_pendirian->akta }}">
              <div><a href="{{ asset('eproc/akta-pendirian/akta/'.$akta_pendirian["akta"]) }}" target="_blank">{{ $akta_pendirian->akta }}</a></div>
            </div>
            <div class="form-group">
              <label>Upload SK</label>
              <input type="file" class="form-control" name="sk" value="{{ $akta_pendirian->sk }}">
              <div><a href="{{ asset('eproc/akta-pendirian/sk/'.$akta_pendirian["sk"]) }}" target="_blank">{{ $akta_pendirian->sk }}</a></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      @endif
    </div>
  </div>
</div>

<div class="modal fade" id="akta-pendirian3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Akta Pendirian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if(!empty($akta_pendirian))
        <form action="">
          <div class="modal-body">
            <div class="form-group">
              <label>No. Akta</label>
              <input disabled type="text" class="form-control" name="no_akta" value="{{ $akta_pendirian->no_akta }}">
            </div>
            <div class="form-group">
              <label>Tanggal Akta</label>
              <input disabled type="date" class="form-control" name="tanggal_akta" value="{{ $akta_pendirian->tanggal_akta }}">
            </div>
            <div class="form-group">
              <label>Nama Notaris</label>
              <input disabled type="text" class="form-control" name="nama_notaris" value="{{ $akta_pendirian->nama_notaris }}">
            </div>
            <div class="form-group">
              <label>No. SK</label>
              <input disabled type="text" class="form-control" name="no_sk" value="{{ $akta_pendirian->no_sk }}">
            </div>
            <div class="form-group">
              <label>Tanggal SK</label>
              <input disabled type="date" class="form-control" name="tanggal_sk" value="{{ $akta_pendirian->tanggal_sk }}">
            </div>
            <div class="form-group">
              <label>Upload Akta</label>
              <input disabled type="file" class="form-control" name="akta" value="{{ $akta_pendirian->akta }}">
              <div><a href="{{ asset('eproc/akta-pendirian/akta/'.$akta_pendirian["akta"]) }}" target="_blank">{{ $akta_pendirian->akta }}</a></div>
            </div>
            <div class="form-group">
              <label>Upload SK</label>
              <input disabled type="file" class="form-control" name="sk" value="{{ $akta_pendirian->sk }}">
              <div><a href="{{ asset('eproc/akta-pendirian/sk/'.$akta_pendirian["sk"]) }}" target="_blank">{{ $akta_pendirian->sk }}</a></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </form>
      @endif
    </div>
  </div>
</div>

{{-- ########################################## Surat Keterangan Domisili Perusahaan (SKDP) ########################################## --}}
<div class="modal fade" id="surat-keterangan-domisili-perusahaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Surat Keterangan Domisili Perusahaan (SKDP)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('eproc.perusahaan.post-surat-keterangan-domisili-perusahaan') }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>No. SKDP</label>
            <input type="text" class="form-control" name="no_skdp" value="">
          </div>
          <div class="form-group">
            <label>Tanggal Terbit</label>
            <input type="date" class="form-control" name="tanggal_terbit" value="">
          </div>
          <div class="form-group">
            <label>Tanggal Jatuh Tempo</label>
            <input type="date" class="form-control" name="tanggal_jatuh_tempo" value="">
          </div>
          <div class="form-group">
            <label>Upload SKDP</label>
            <input type="file" class="form-control" name="skdp" value="">
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

<div class="modal fade" id="surat-keterangan-domisili-perusahaan2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Surat Keterangan Domisili Perusahaan (SKDP)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if(!empty($surat_keterangan_domisili_perusahaan))
        <form method="POST" action="{{ route('eproc.perusahaan.put-surat-keterangan-domisili-perusahaan', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($surat_keterangan_domisili_perusahaan->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="form-group">
              <label>No. SKDP</label>
              <input type="text" class="form-control" name="no_skdp" value="{{ $surat_keterangan_domisili_perusahaan->no_skdp }}">
            </div>
            <div class="form-group">
              <label>Tanggal Terbit</label>
              <input type="date" class="form-control" name="tanggal_terbit" value="{{ $surat_keterangan_domisili_perusahaan->tanggal_terbit }}">
            </div>
            <div class="form-group">
              <label>Tanggal Jatuh Tempo</label>
              <input type="date" class="form-control" name="tanggal_jatuh_tempo" value="{{ $surat_keterangan_domisili_perusahaan->tanggal_jatuh_tempo }}">
            </div>
            <div class="form-group">
              <label>Upload SKDP</label>
              <input type="file" class="form-control" name="skdp" value="{{ $surat_keterangan_domisili_perusahaan->skdp }}">
              <div><a href="{{ asset('eproc/surat-keterangan-domisili-perusahaan/'.$surat_keterangan_domisili_perusahaan["skdp"]) }}" target="_blank">{{ $surat_keterangan_domisili_perusahaan->skdp }}</a></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      @endif
    </div>
  </div>
</div>

<div class="modal fade" id="surat-keterangan-domisili-perusahaan3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Surat Keterangan Domisili Perusahaan (SKDP)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if(!empty($surat_keterangan_domisili_perusahaan))
        <form action="">
          <div class="modal-body">
            <div class="form-group">
              <label>No. SKDP</label>
              <input disabled type="text" class="form-control" name="no_skdp" value="{{ $surat_keterangan_domisili_perusahaan->no_skdp }}">
            </div>
            <div class="form-group">
              <label>Tanggal Terbit</label>
              <input disabled type="date" class="form-control" name="tanggal_terbit" value="{{ $surat_keterangan_domisili_perusahaan->tanggal_terbit }}">
            </div>
            <div class="form-group">
              <label>Tanggal Jatuh Tempo</label>
              <input disabled type="date" class="form-control" name="tanggal_jatuh_tempo" value="{{ $surat_keterangan_domisili_perusahaan->tanggal_jatuh_tempo }}">
            </div>
            <div class="form-group">
              <label>Upload SKDP</label>
              <input disabled type="file" class="form-control" name="skdp" value="{{ $surat_keterangan_domisili_perusahaan->skdp }}">
              <div><a href="{{ asset('eproc/surat-keterangan-domisili-perusahaan/'.$surat_keterangan_domisili_perusahaan["skdp"]) }}" target="_blank">{{ $surat_keterangan_domisili_perusahaan->skdp }}</a></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </form>
      @endif
    </div>
  </div>
</div>

{{-- ########################################## Surat Izin Usaha Perdagangan (SIUP) ########################################## --}}
<div class="modal fade" id="surat-izin-usaha-perdagangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Surat Izin Usaha Perdagangan (SIUP)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('eproc.perusahaan.post-surat-izin-usaha-perdagangan') }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>No. SIUP</label>
            <input type="text" class="form-control" name="no_siup" value="">
          </div>
          <div class="form-group">
            <label>Tanggal Terbit</label>
            <input type="date" class="form-control" name="tanggal_terbit" value="">
          </div>
          <div class="form-group">
            <label>Tanggal Jatuh Tempo</label>
            <input type="date" class="form-control" name="tanggal_jatuh_tempo" value="">
          </div>
          <div class="form-group">
            <label>Upload SIUP</label>
            <input type="file" class="form-control" name="siup" value="">
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

<div class="modal fade" id="surat-izin-usaha-perdagangan2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Surat Izin Usaha Perdagangan (SIUP)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if(!empty($surat_izin_usaha_perdagangan))
        <form method="POST" action="{{ route('eproc.perusahaan.put-surat-izin-usaha-perdagangan', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($surat_izin_usaha_perdagangan->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="form-group">
              <label>No. SIUP</label>
              <input type="text" class="form-control" name="no_siup" value="{{ $surat_izin_usaha_perdagangan->no_siup }}">
            </div>
            <div class="form-group">
              <label>Tanggal Terbit</label>
              <input type="date" class="form-control" name="tanggal_terbit" value="{{ $surat_izin_usaha_perdagangan->tanggal_terbit }}">
            </div>
            <div class="form-group">
              <label>Tanggal Jatuh Tempo</label>
              <input type="date" class="form-control" name="tanggal_jatuh_tempo" value="{{ $surat_izin_usaha_perdagangan->tanggal_jatuh_tempo }}">
            </div>
            <div class="form-group">
              <label>Upload SIUP</label>
              <input type="file" class="form-control" name="siup" value="{{ $surat_izin_usaha_perdagangan->siup }}">
              <div><a href="{{ asset('eproc/surat-izin-usaha-perdagangan/'.$surat_izin_usaha_perdagangan["siup"]) }}" target="_blank">{{ $surat_izin_usaha_perdagangan->siup }}</a></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      @endif
    </div>
  </div>
</div>

<div class="modal fade" id="surat-izin-usaha-perdagangan3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Surat Izin Usaha Perdagangan (SIUP)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if(!empty($surat_izin_usaha_perdagangan))
        <form action="">
          <div class="modal-body">
            <div class="form-group">
              <label>No. SIUP</label>
              <input disabled type="text" class="form-control" name="no_siup" value="{{ $surat_izin_usaha_perdagangan->no_siup }}">
            </div>
            <div class="form-group">
              <label>Tanggal Terbit</label>
              <input disabled type="date" class="form-control" name="tanggal_terbit" value="{{ $surat_izin_usaha_perdagangan->tanggal_terbit }}">
            </div>
            <div class="form-group">
              <label>Tanggal Jatuh Tempo</label>
              <input disabled type="date" class="form-control" name="tanggal_jatuh_tempo" value="{{ $surat_izin_usaha_perdagangan->tanggal_jatuh_tempo }}">
            </div>
            <div class="form-group">
              <label>Upload SIUP</label>
              <input disabled type="file" class="form-control" name="siup" value="{{ $surat_izin_usaha_perdagangan->siup }}">
              <div><a href="{{ asset('eproc/surat-izin-usaha-perdagangan/'.$surat_izin_usaha_perdagangan["siup"]) }}" target="_blank">{{ $surat_izin_usaha_perdagangan->siup }}</a></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </form>
      @endif
    </div>
  </div>
</div>

{{-- ########################################## Nomor Induk Berusaha (NIB) ########################################## --}}
<div class="modal fade" id="nomor-induk-berusaha" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nomor Induk Berusaha (NIB)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('eproc.perusahaan.post-nomor-induk-berusaha') }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Tanggal Terbit</label>
            <input type="date" class="form-control" name="tanggal_terbit" value="">
          </div>
          <div class="form-group">
            <label>Upload NIB</label>
            <input type="file" class="form-control" name="nib" value="">
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

<div class="modal fade" id="nomor-induk-berusaha2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nomor Induk Berusaha (NIB)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if(!empty($nomor_induk_berusaha))
        <form method="POST" action="{{ route('eproc.perusahaan.put-nomor-induk-berusaha', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($nomor_induk_berusaha->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="form-group">
              <label>Tanggal Terbit</label>
              <input type="date" class="form-control" name="tanggal_terbit" value="{{ $nomor_induk_berusaha->tanggal_terbit }}">
            </div>
            <div class="form-group">
              <label>Upload NIB</label>
              <input type="file" class="form-control" name="nib" value="{{ $nomor_induk_berusaha->nib }}">
              <div><a href="{{ asset('eproc/nomor-induk-berusaha/'.$nomor_induk_berusaha["nib"]) }}" target="_blank">{{ $nomor_induk_berusaha->nib }}</a></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      @endif
    </div>
  </div>
</div>

<div class="modal fade" id="nomor-induk-berusaha3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nomor Induk Berusaha (NIB)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if(!empty($nomor_induk_berusaha))
        <form action="">
          <div class="modal-body">
            <div class="form-group">
              <label>Tanggal Terbit</label>
              <input disabled type="date" class="form-control" name="tanggal_terbit" value="{{ $nomor_induk_berusaha->tanggal_terbit }}">
            </div>
            <div class="form-group">
              <label>Upload NIB</label>
              <input disabled type="file" class="form-control" name="nib" value="{{ $nomor_induk_berusaha->nib }}">
              <div><a href="{{ asset('eproc/nomor-induk-berusaha/'.$nomor_induk_berusaha["nib"]) }}" target="_blank">{{ $nomor_induk_berusaha->nib }}</a></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </form>
      @endif
    </div>
  </div>
</div>

{{-- ########################################## Nomor Pokok Wajib Pajak (NPWP) ########################################## --}}
<div class="modal fade" id="nomor-pokok-wajib-pajak" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nomor Pokok Wajib Pajak (NPWP)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('eproc.perusahaan.post-nomor-pokok-wajib-pajak') }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Upload NPWP</label>
            <input type="file" class="form-control" name="npwp" value="">
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

<div class="modal fade" id="nomor-pokok-wajib-pajak2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nomor Pokok Wajib Pajak (NPWP)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if(!empty($nomor_pokok_wajib_pajak))
        <form method="POST" action="{{ route('eproc.perusahaan.put-nomor-pokok-wajib-pajak', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($nomor_pokok_wajib_pajak->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="form-group">
              <label>Upload NPWP</label>
              <input type="file" class="form-control" name="npwp" value="{{ $nomor_pokok_wajib_pajak->npwp }}">
              <div><a href="{{ asset('eproc/nomor-pokok-wajib-pajak/'.$nomor_pokok_wajib_pajak["npwp"]) }}" target="_blank">{{ $nomor_pokok_wajib_pajak->npwp }}</a></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      @endif
    </div>
  </div>
</div>

<div class="modal fade" id="nomor-pokok-wajib-pajak3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nomor Pokok Wajib Pajak (NPWP)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if(!empty($nomor_pokok_wajib_pajak))
        <form action="">
          <div class="modal-body">
            <div class="form-group">
              <label>Upload NPWP</label>
              <input disabled type="file" class="form-control" name="npwp" value="{{ $nomor_pokok_wajib_pajak->npwp }}">
              <div><a href="{{ asset('eproc/nomor-pokok-wajib-pajak/'.$nomor_pokok_wajib_pajak["npwp"]) }}" target="_blank">{{ $nomor_pokok_wajib_pajak->npwp }}</a></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </form>
      @endif
    </div>
  </div>
</div>

{{-- ########################################## Surat Pengukuhan Perusahaan Kena Pajak (SPPKP) ########################################## --}}
<div class="modal fade" id="surat-pengukuhan-perusahaan-kena-pajak" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Surat Pengukuhan Perusahaan Kena Pajak (SPPKP)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('eproc.perusahaan.post-surat-pengukuhan-perusahaan-kena-pajak') }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>No. SPPKP</label>
            <input type="text" class="form-control" name="no_sppkp" value="">
          </div>
          <div class="form-group">
            <label>Tanggal Terbit</label>
            <input type="date" class="form-control" name="tanggal_terbit" value="">
          </div>
          <div class="form-group">
            <label>Upload SPPKP</label>
            <input type="file" class="form-control" name="sppkp" value="">
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

<div class="modal fade" id="surat-pengukuhan-perusahaan-kena-pajak2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Surat Pengukuhan Perusahaan Kena Pajak (SPPKP)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if(!empty($surat_pengukuhan_perusahaan_kena_pajak))
        <form method="POST" action="{{ route('eproc.perusahaan.put-surat-pengukuhan-perusahaan-kena-pajak', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($surat_pengukuhan_perusahaan_kena_pajak->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="form-group">
              <label>No. SPPKP</label>
              <input type="text" class="form-control" name="no_sppkp" value="{{ $surat_pengukuhan_perusahaan_kena_pajak->no_sppkp }}">
            </div>
            <div class="form-group">
              <label>Tanggal Terbit</label>
              <input type="date" class="form-control" name="tanggal_terbit" value="{{ $surat_pengukuhan_perusahaan_kena_pajak->tanggal_terbit }}">
            </div>
            <div class="form-group">
              <label>Upload SPPKP</label>
              <input type="file" class="form-control" name="sppkp" value="{{ $surat_pengukuhan_perusahaan_kena_pajak->sppkp }}">
              <div><a href="{{ asset('eproc/surat-pengukuhan-perusahaan-kena-pajak/'.$surat_pengukuhan_perusahaan_kena_pajak["sppkp"]) }}" target="_blank">{{ $surat_pengukuhan_perusahaan_kena_pajak->sppkp }}</a></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      @endif
    </div>
  </div>
</div>

<div class="modal fade" id="surat-pengukuhan-perusahaan-kena-pajak3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Surat Pengukuhan Perusahaan Kena Pajak (SPPKP)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if(!empty($surat_pengukuhan_perusahaan_kena_pajak))
        <form action="">
          <div class="modal-body">
            <div class="form-group">
              <label>No. SPPKP</label>
              <input disabled type="text" class="form-control" name="no_sppkp" value="{{ $surat_pengukuhan_perusahaan_kena_pajak->no_sppkp }}">
            </div>
            <div class="form-group">
              <label>Tanggal Terbit</label>
              <input disabled type="date" class="form-control" name="tanggal_terbit" value="{{ $surat_pengukuhan_perusahaan_kena_pajak->tanggal_terbit }}">
            </div>
            <div class="form-group">
              <label>Upload SPPKP</label>
              <input disabled type="file" class="form-control" name="sppkp" value="{{ $surat_pengukuhan_perusahaan_kena_pajak->sppkp }}">
              <div><a href="{{ asset('eproc/surat-pengukuhan-perusahaan-kena-pajak/'.$surat_pengukuhan_perusahaan_kena_pajak["sppkp"]) }}" target="_blank">{{ $surat_pengukuhan_perusahaan_kena_pajak->sppkp }}</a></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </form>
      @endif
    </div>
  </div>
</div>

{{-- ########################################## Surat Izin Operasional (SIO) ########################################## --}}
<div class="modal fade" id="surat-izin-operasional" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Surat Izin Operasional (SIO)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('eproc.perusahaan.post-surat-izin-operasional') }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Nama SIO</label>
            <input type="text" class="form-control" name="nama_sio" value="">
          </div>
          <div class="form-group">
            <label>No. SIO</label>
            <input type="text" class="form-control" name="no_sio" value="">
          </div>
          <div class="form-group">
            <label>Tanggal Terbit</label>
            <input type="date" class="form-control" name="tanggal_terbit" value="">
          </div>
          <div class="form-group">
            <label>Tanggal Jatuh Tempo</label>
            <input type="date" class="form-control" name="tanggal_jatuh_tempo" value="">
          </div>
          <div class="form-group">
            <label>Penerbit SIO</label>
            <input type="text" class="form-control" name="penerbit_sio" value="">
          </div>
          <div class="form-group">
            <label>Upload SIO</label>
            <input type="file" class="form-control" name="sio" value="">
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

<div class="modal fade" id="surat-izin-operasional2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Surat Izin Operasional (SIO)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if(!empty($surat_izin_operasional))
        <form method="POST" action="{{ route('eproc.perusahaan.put-surat-izin-operasional', ['user_id' => Crypt::encrypt($user->id), 'id' => Crypt::encrypt($surat_izin_operasional->id)]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="form-group">
              <label>Nama SIO</label>
              <input type="text" class="form-control" name="nama_sio" value="{{ $surat_izin_operasional->nama_sio }}">
            </div>
            <div class="form-group">
              <label>No. SIO</label>
              <input type="text" class="form-control" name="no_sio" value="{{ $surat_izin_operasional->no_sio }}">
            </div>
            <div class="form-group">
              <label>Tanggal Terbit</label>
              <input type="date" class="form-control" name="tanggal_terbit" value="{{ $surat_izin_operasional->tanggal_terbit }}">
            </div>
            <div class="form-group">
              <label>Tanggal Jatuh Tempo</label>
              <input type="date" class="form-control" name="tanggal_jatuh_tempo" value="{{ $surat_izin_operasional->tanggal_jatuh_tempo }}">
            </div>
            <div class="form-group">
              <label>Penerbit SIO</label>
              <input type="text" class="form-control" name="penerbit_sio" value="{{ $surat_izin_operasional->penerbit_sio }}">
            </div>
            <div class="form-group">
              <label>Upload SIO</label>
              <input type="file" class="form-control" name="sio" value="{{ $surat_izin_operasional->sio }}">
              <div><a href="{{ asset('eproc/surat-izin-operasional/'.$surat_izin_operasional["sio"]) }}" target="_blank">{{ $surat_izin_operasional->sio }}</a></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      @endif
    </div>
  </div>
</div>

<div class="modal fade" id="surat-izin-operasional3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Surat Izin Operasional (SIO)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if(!empty($surat_izin_operasional))
        <form action="">
          <div class="modal-body">
            <div class="form-group">
              <label>Nama SIO</label>
              <input disabled type="text" class="form-control" name="nama_sio" value="{{ $surat_izin_operasional->nama_sio }}">
            </div>
            <div class="form-group">
              <label>No. SIO</label>
              <input disabled type="text" class="form-control" name="no_sio" value="{{ $surat_izin_operasional->no_sio }}">
            </div>
            <div class="form-group">
              <label>Tanggal Terbit</label>
              <input disabled type="date" class="form-control" name="tanggal_terbit" value="{{ $surat_izin_operasional->tanggal_terbit }}">
            </div>
            <div class="form-group">
              <label>Tanggal Jatuh Tempo</label>
              <input disabled type="date" class="form-control" name="tanggal_jatuh_tempo" value="{{ $surat_izin_operasional->tanggal_jatuh_tempo }}">
            </div>
            <div class="form-group">
              <label>Penerbit SIO</label>
              <input disabled type="text" class="form-control" name="penerbit_sio" value="{{ $surat_izin_operasional->penerbit_sio }}">
            </div>
            <div class="form-group">
              <label>Upload SIO</label>
              <input disabled type="file" class="form-control" name="sio" value="{{ $surat_izin_operasional->sio }}">
              <div><a href="{{ asset('eproc/surat-izin-operasional/'.$surat_izin_operasional["sio"]) }}" target="_blank">{{ $surat_izin_operasional->sio }}</a></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </form>
      @endif
    </div>
  </div>
</div>
@endsection