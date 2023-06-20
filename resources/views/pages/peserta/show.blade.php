@extends('templates.pages')
@section('title', 'Peserta Lelang')
@section('header')
<h1>Peserta Lelang : {{ $lelang->kode_lelang }}</h1>
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
          @if(!$lelang->user_id)
          @else
            @if($lelang->user_id == $user->id)
              <div class="alert alert-primary">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti cupiditate aspernatur repellendus eligendi labore molestias necessitatibus ipsum praesentium? Deleniti nulla delectus debitis cumque aliquid ad? Quibusdam distinctio animi alias consectetur.</div>
            @endif
          @endif
          <div class="form-group">
            <label>Nama Perusahaan</label>
            <input disabled type="text" class="form-control" name="nama_panjang" value="{{ $user->nama_panjang }}">
            @error('nama_panjang')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Email</label>
            <input disabled type="email" class="form-control" name="email" value="{{ $user->email }}">
            @error('email')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Lampiran Pengadaan</label>
            <div>
              @if(!$lampiran)
                <div>Perusahaan ini belum mengirimkan lampiran</div>
              @else
                @if($lelang->lampiran_pengadaan == 'penawaran')
                  <a href="{{ asset('eproc/lampiran/penawaran/'.$lampiran['penawaran']) }}" target="_blank">{{ $lampiran->penawaran }}</a>
                @endif
                @if($lelang->lampiran_pengadaan == 'konsep')
                  <a href="{{ asset('eproc/lampiran/konsep/'.$lampiran['konsep']) }}" target="_blank">{{ $lampiran->konsep }}</a>
                @endif
                @if($lelang->lampiran_pengadaan == 'penawaran dan konsep')
                  <a href="{{ asset('eproc/lampiran/penawaran-dan-konsep/'.$lampiran['penawaran_dan_konsep']) }}" target="_blank">{{ $lampiran->penawaran_dan_konsep }}</a>
                @endif
              @endif
            </div>
          </div>
          @if($lelang->status_pengadaan == 'penunjukan langsung')
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
          @else
            @if(!$lampiran)
              <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            @else
              @if(!$lelang->user_id)
                @if(auth()->user()->level == 'superadmin')
                  <form action="{{ route('eproc.superadmin.peserta.pemenang', ['lelang_id' => Crypt::encrypt($lelang->id), 'id' => Crypt::encrypt($user->id)]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                    <button type="button" class="btn btn-icon btn-danger tunjuk-sebagai-pemenang"><i class="fas fa-check"></i></button>
                  </form>
                @endif
                @if(auth()->user()->level == 'admin')
                  <form action="{{ route('eproc.admin.peserta.pemenang', ['lelang_id' => Crypt::encrypt($lelang->id), 'id' => Crypt::encrypt($user->id)]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                    <button type="button" class="btn btn-icon btn-danger tunjuk-sebagai-pemenang"><i class="fas fa-check"></i></button>
                  </form>
                @endif
              @else
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
              @endif
            @endif
          @endif
        </form>
      </div>
    </div>
  </div>
</div>
@endsection