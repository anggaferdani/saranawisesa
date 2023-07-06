@extends('templates.pages')
@section('title', 'Lampiran Kualifikasi')
@section('header')
<h1>Lampiran Kualifikasi</h1>
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
      @include('eproc.menu')
    </div>
    
    <div class="card">
      <div class="card-header">
        <h4>Edit</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('eproc.perusahaan.lampiran-kualifikasi.update', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Bukti Kepemilikan Tempat Usaha/Kantor</label>
            <input type="file" class="form-control" name="bukti_kepemilikan_tempat_usaha" value="{{ $lampiran_kualifikasi->bukti_kepemilikan_tempat_usaha }}" @if(auth()->user()->level == 'superadmin' || auth()->user()->level == 'admin')@disabled(true)@endif>
            <p><a href="{{ asset('eproc/lampiran-kualifikasi/bukti-kepemilikan-tempat-usaha/'.$lampiran_kualifikasi["bukti_kepemilikan_tempat_usaha"]) }}" target="_blank">{{ $lampiran_kualifikasi->bukti_kepemilikan_tempat_usaha }}</a></p>
          </div>
          <div class="form-group">
            <label>Surat Izin Usaha</label>
            <input type="file" class="form-control" name="surat_izin_usaha" value="{{ $lampiran_kualifikasi->surat_izin_usaha }}" @if(auth()->user()->level == 'superadmin' || auth()->user()->level == 'admin')@disabled(true)@endif>
            <p><a href="{{ asset('eproc/lampiran-kualifikasi/surat-izin-usaha/'.$lampiran_kualifikasi["surat_izin_usaha"]) }}" target="_blank">{{ $lampiran_kualifikasi->surat_izin_usaha }}</a></p>
          </div>
          <div class="form-group">
            <label>Surat Izin Lainnya</label>
            <input type="file" class="form-control" name="surat_izin_lainnya" value="{{ $lampiran_kualifikasi->surat_izin_lainnya }}" @if(auth()->user()->level == 'superadmin' || auth()->user()->level == 'admin')@disabled(true)@endif>
            <p><a href="{{ asset('eproc/lampiran-kualifikasi/surat-izin-lainnya/'.$lampiran_kualifikasi["surat_izin_lainnya"]) }}" target="_blank">{{ $lampiran_kualifikasi->surat_izin_lainnya }}</a></p>
          </div>
          <div class="form-group">
            <label>Bukti laporan Pajak Tahun terakhir (SPT tahunan)</label>
            <input type="file" class="form-control" name="bukti_laporan_pajak_tahun_terakhir" value="{{ $lampiran_kualifikasi->bukti_laporan_pajak_tahun_terakhir }}" @if(auth()->user()->level == 'superadmin' || auth()->user()->level == 'admin')@disabled(true)@endif>
            <p><a href="{{ asset('eproc/lampiran-kualifikasi/bukti-laporan-pajak-tahun-terakhir/'.$lampiran_kualifikasi["bukti_laporan_pajak_tahun_terakhir"]) }}" target="_blank">{{ $lampiran_kualifikasi->bukti_laporan_pajak_tahun_terakhir }}</a></p>
          </div>
          <div class="form-group">
            <label>Bukti Status Kepemilikan Fasilitas</label>
            <input type="file" class="form-control" name="bukti_status_kepemilikan_fasilitas" value="{{ $lampiran_kualifikasi->bukti_status_kepemilikan_fasilitas }}" @if(auth()->user()->level == 'superadmin' || auth()->user()->level == 'admin')@disabled(true)@endif>
            <p><a href="{{ asset('eproc/lampiran-kualifikasi/bukti-status-kepemilikan-fasilitas/'.$lampiran_kualifikasi["bukti_status_kepemilikan_fasilitas"]) }}" target="_blank">{{ $lampiran_kualifikasi->bukti_status_kepemilikan_fasilitas }}</a></p>
          </div>
          @if(auth()->user()->level == 'perusahaan')
            <button type="submit" class="btn btn-primary">Submit</button>
          @endif
        </form>
      </div>
    </div>
  </div>
</div>
@endsection