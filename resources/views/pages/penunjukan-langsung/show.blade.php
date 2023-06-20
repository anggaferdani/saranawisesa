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
        <h4>Show</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="" class="needs-validation" novalidate="">
          @csrf
          <div class="form-group">
            <label>Kode Lelang</label>
            <input disabled type="text" class="form-control" name="kode_lelang" value="{{ $penunjukan_langsung->kode_lelang }}">
            @error('kode_lelang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Jenis Pengadaan</label>
            <select disabled class="form-control select2" name="jenis_pengadaan_id">
              @foreach ($jenis_pengadaans as $jenis_pengadaan)
                <option value="{{ $jenis_pengadaan->jenis_pengadaan }}" @if($penunjukan_langsung->jenis_pengadaan_id == $jenis_pengadaan->id)@selected(true)@endif>{{ $jenis_pengadaan->jenis_pengadaan }}</option>
              @endforeach
              @error('jenis_pengadaan_id')<div class="text-danger">{{ $message }}</div>@enderror
            </select>
          </div>
          <div class="form-group">
            <label>Perusahaan</label>
            <select disabled class="form-control select2" name="user_id">
              <option selected disabled>Pilih</option>
              @foreach ($penunjukan_langsung->users as $user)
                <option value="{{ $user->id }}" @selected(true)>{{ $user->nama_panjang }}</option>
              @endforeach
              @error('user_id')<div class="text-danger">{{ $message }}</div>@enderror
            </select>
          </div>
          <div class="form-group">
            <label>Nama Lelang</label>
            <input disabled type="text" class="form-control" name="nama_lelang" value="{{ $penunjukan_langsung->nama_lelang }}">
            @error('nama_lelang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Uraian Singkat Pekerjaan</label>
            <input disabled type="text" class="form-control" name="uraian_singkat_pekerjaan" value="{{ $penunjukan_langsung->uraian_singkat_pekerjaan }}">
            @error('uraian_singkat_pekerjaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Tanggal Mulai Lelang</label>
            <input disabled type="date" class="form-control" name="tanggal_mulai_lelang" value="{{ $penunjukan_langsung->tanggal_mulai_lelang }}">
            @error('tanggal_mulai_lelang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Tanggal Akhir Lelang</label>
            <input disabled type="date" class="form-control" name="tanggal_akhir_lelang" value="{{ $penunjukan_langsung->tanggal_akhir_lelang }}">
            @error('tanggal_akhir_lelang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Jenis Kontrak</label>
            <input disabled type="text" class="form-control" name="jenis_kontrak" value="{{ $penunjukan_langsung->jenis_kontrak }}">
            @error('jenis_kontrak')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Lokasi Pekerjaan</label>
            <input disabled type="text" class="form-control" name="lokasi_pekerjaan" value="{{ $penunjukan_langsung->lokasi_pekerjaan }}">
            @error('lokasi_pekerjaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>HPS</label>
            <input disabled type="number" class="form-control" name="hps" value="{{ $penunjukan_langsung->hps }}" onkeyup="formatNumber(this)">
            @error('hps')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Syarat Kualifikasi</label>
            <textarea disabled class="form-control ckeditor" name="syarat_kualifikasi">{{ $penunjukan_langsung->syarat_kualifikasi }}</textarea>
            @error('syarat_kualifikasi')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Lampiran Pengadaan</label>
            <select disabled class="form-control select2" name="lampiran_pengadaan">
              <option selected disabled>Pilih</option>
              <option value="penawaran" @if($penunjukan_langsung->lampiran_pengadaan == 'penawaran')@selected(true)@endif>Penawaran</option>
              <option value="konsep" @if($penunjukan_langsung->lampiran_pengadaan == 'konsep')@selected(true)@endif>Konsep</option>
              <option value="penawaran dan konsep" @if($penunjukan_langsung->lampiran_pengadaan == 'penawaran dan konsep')@selected(true)@endif>Penawaran Dan Konsep</option>
            </select>
            @error('lampiran_pengadaan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Created At</label>
              <input disabled type="text" class="form-control" name="created_at" value="{{ $penunjukan_langsung->created_at }}">
              @error('created_at')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="form-group col-md-6">
              <label>Updated At</label>
              <input disabled type="text" class="form-control" name="updated_at" value="{{ $penunjukan_langsung->updated_at }}">
              @error('updated_at')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
          </div>
          @if(auth()->user()->level == 'superadmin')
            <a href="{{ route('eproc.superadmin.penunjukan-langsung.index') }}" class="btn btn-secondary">Back</a>
          @endif
          @if(auth()->user()->level == 'admin')
            <a href="{{ route('eproc.admin.penunjukan-langsung.index') }}" class="btn btn-secondary">Back</a>
          @endif
        </form>
      </div>
    </div>
  </div>
</div>
@endsection