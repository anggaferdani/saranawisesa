@extends('templates.eproc.pages')
@section('title', 'SARANAWISESA PROPERINDO')
@section('content')
<section style="height: 50vh; background: url({{ asset('eproc/img/pengadaan.png') }}); background-size: cover; background-repeat: no-repeat; background-position: center;">
  <div class="container h-100">
    <div class="row py-4 h-100 align-items-center justify-content-center">
      <div class="col-12 col-lg-8 col-md-4 text-white">
        <h1 class="fw-light title text-center m-0">PENGADAAN</h1>
        <h1 class="fw-bold title text-center m-0">TERBARU</h1>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container py-5">
    <div class="row">
      <h5 class="fw-light">TENDER</h5>
      <table class="table table-responsive">
        @if(count($jenis_pengadaans_group_by_lelang))
          @foreach($jenis_pengadaans_group_by_lelang as $jenis_pengadaan)
            <thead>
              <tr>
                <td class="text-center text-white fw-bold" style="background-color: #0458B8;" colspan="4">{{ $jenis_pengadaan->jenis_pengadaan }}</td>
              </tr>
              <tr>
                <td class="text-center text-white fw-bold" style="background-color: #0458B8; width: 25%;">Kode</td>
                <td class="text-center text-white fw-bold" style="background-color: #0458B8; width: 25%;">Tanggal</td>
                <td class="text-center text-white fw-bold" style="background-color: #0458B8; width: 25%;">Nama Paket</td>
                <td class="text-center text-white fw-bold" style="background-color: #0458B8; width: 25%;">Status</td>
              </tr>
            </thead>
            <tbody>
              @forelse($jenis_pengadaan->lelangs as $lelang)
                <tr>
                  <td class="text-center">{{ $lelang->kode_lelang }}</td>
                  <td class="text-center">{{ $lelang->tanggal_akhir_lelang }}</td>
                  <td class="text-center"><a href="{{ route('eproc.pengadaan2', Crypt::encrypt($lelang->id)) }}">{{ $lelang->nama_lelang }}</a></td>
                  <td class="text-center">Approved</td>
                </tr>
              @empty
                <tr>
                  <td class="text-center" colspan="4">Kosong</td>
                </tr>
              @endforelse
            </tbody>
          @endforeach
        @else
          <thead>
            <tr>
              <td class="text-center" style="border: none;" colspan="4">Kosong</td>
            </tr>
          </thead>
        @endif
      </table>
      <h5 class="fw-light">NON TENDER</h5>
      <table class="table table-responsive">
        @if(count($jenis_pengadaans_group_by_penunjukan_langsung))
          @foreach($jenis_pengadaans_group_by_penunjukan_langsung as $jenis_pengadaan)
            <thead>
              <tr>
                <td class="text-center text-white fw-bold" style="background-color: #920000;" colspan="4">{{ $jenis_pengadaan->jenis_pengadaan }}</td>
              </tr>
              <tr>
                <td class="text-center text-white fw-bold" style="background-color: #920000; width: 25%;">Kode</td>
                <td class="text-center text-white fw-bold" style="background-color: #920000; width: 25%;">Tanggal</td>
                <td class="text-center text-white fw-bold" style="background-color: #920000; width: 25%;">Nama Paket</td>
                <td class="text-center text-white fw-bold" style="background-color: #920000; width: 25%;">Status</td>
              </tr>
            </thead>
            <tbody>
              @forelse($jenis_pengadaan->lelangs as $lelang)
                <tr>
                  <td class="text-center">{{ $lelang->kode_lelang }}</td>
                  <td class="text-center">{{ $lelang->tanggal_akhir_lelang }}</td>
                  <td class="text-center"><a href="{{ route('eproc.pengadaan2', Crypt::encrypt($lelang->id)) }}">{{ $lelang->nama_lelang }}</a></td>
                  <td class="text-center">Approved</td>
                </tr>
              @empty
                <tr>
                  <td class="text-center" colspan="4">Kosong</td>
                </tr>
              @endforelse
            </tbody>
          @endforeach
        @else
          <thead>
            <tr>
              <td class="text-center" style="border: none;" colspan="4">Kosong</td>
            </tr>
          </thead>
        @endif
      </table>
    </div>
  </div>
</section>
@endsection