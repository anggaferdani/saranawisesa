@extends('templates.pages')
@section('title', 'Penunjukan Langsung')
@section('header')
<h1>Penunjukan Langsung</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Create</h4>
      </div>
      <div class="card-body">
        @if(auth()->user()->level == 'superadmin')
          <form method="POST" action="{{ route('eproc.superadmin.penunjukan-langsung.store') }}" class="needs-validation" novalidate="">
        @endif
        @if(auth()->user()->level == 'admin')
          <form method="POST" action="{{ route('eproc.admin.penunjukan-langsung.store') }}" class="needs-validation" novalidate="">
        @endif
          @csrf
          <div class="form-group">
            <label>Jenis Pengadaan</label>
            <select class="form-control select2" name="jenis_pengadaan_id">
              <option selected disabled>Pilih</option>
              @foreach ($jenis_pengadaans as $jenis_pengadaans)
                <option value="{{ $jenis_pengadaans->id }}">{{ $jenis_pengadaans->jenis_pengadaan }}</option>
              @endforeach
            </select>
            @error('jenis_pengadaan_id')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Perusahaan</label>
            <select class="form-control select2" name="user_id">
              <option selected disabled>Pilih</option>
              @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->nama_panjang }}</option>
              @endforeach
              @error('user_id')<div class="text-danger">{{ $message }}</div>@enderror
            </select>
          </div>
          <div class="form-group">
            <label for="nama_lelang">Nama Lelang</label>
            <input id="nama_lelang" type="text" class="form-control" name="nama_lelang">
            @error('nama_lelang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="uraian_singkat_pekerjaan">Uraian Singkat Pekerjaan</label>
            <input id="uraian_singkat_pekerjaan" type="text" class="form-control" name="uraian_singkat_pekerjaan">
            @error('uraian_singkat_pekerjaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="tanggal_mulai_lelang">Tanggal Mulai Lelang</label>
              <input id="tanggal_mulai_lelang" type="date" class="form-control" name="tanggal_mulai_lelang">
              @error('tanggal_mulai_lelang')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="form-group col-md-6">
              <label for="tanggal_akhir_lelang">Tanggal Akhir Lelang</label>
              <input id="tanggal_akhir_lelang" type="date" class="form-control" name="tanggal_akhir_lelang">
              @error('tanggal_akhir_lelang')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
          </div>
          <div class="form-group">
            <label for="jenis_kontrak">Jenis Kontrak</label>
            <input id="jenis_kontrak" type="text" class="form-control" name="jenis_kontrak">
            @error('jenis_kontrak')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="lokasi_pekerjaan">Lokasi Pekerjaan</label>
            <input id="lokasi_pekerjaan" type="text" class="form-control" name="lokasi_pekerjaan">
            @error('lokasi_pekerjaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="hps">HPS</label>
            <input id="hps" type="text" class="form-control" name="hps" onkeyup="formatNumber(this)">
            @error('hps')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label for="syarat_kualifikasi">Syarat Kualifikasi</label>
            <textarea id="syarat_kualifikasi" class="form-control ckeditor" name="syarat_kualifikasi"></textarea>
            @error('syarat_kualifikasi')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Lampiran Pengadaan</label>
            <select class="form-control select2" name="lampiran_pengadaan">
              <option selected disabled>Pilih</option>
              <option value="penawaran">Penawaran</option>
              <option value="konsep">Konsep</option>
              <option value="penawaran dan konsep">Penawaran Dan Konsep</option>
            </select>
            @error('lampiran_pengadaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('eproc.superadmin.penunjukan-langsung.index') }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('eproc.admin.penunjukan-langsung.index') }}" class="btn btn-secondary">Back</a>
          @endif
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection