@extends('templates.eproc.pages')
@section('title', 'Berita')
@section('content')
<section class="py-5">
  <div class="container py-5">
    <div class="row py-5">
      <div class="col-md-8">
        <h2 class="fw-semibold lh-sm">{{ $berita->judul_berita }}</h2>
        <p class="mt-2">{{ \Carbon\Carbon::parse($berita->tanggal_publikasi)->format('l, d M Y') }}</p>
        <div class="mt-2 rounded-4" style="height: 360px; background: url({{ asset('eproc/berita/'.$berita["thumbnail"]) }}); background-size: cover; background-repeat: no-repeat; background-position: center;"></div>
        <p class="mt-4">{!! $berita->isi_berita !!}</p>
      </div>
      <div class="col-md-4 mt-5">
        <div class="row row-cols-1 row-cols-lg-1 mt-0 row-cols-1 gy-2">
          @foreach ($beritas as $berita)
          <div class="col">
            <div class="card" style="border: none;">
              <div class="row">
                <div class="col-md-6 col-6 pe-0">
                  <div class="rounded-3" style="height: 110px; background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url({{ asset('eproc/berita/'.$berita["thumbnail"]) }}); background-size: cover; background-repeat: no-repeat; background-position: center;"></div>
                </div>
                <div class="col-md-6 col-6 py-2" style="display: flex; justify-content: space-between; flex-direction: column;">
                  <div>
                    <div class="lh-sm fw-semibold">{{ Str::limit($berita->judul_berita, 25) }}</div>
                    <div class="small text-secondary">{{ \Carbon\Carbon::parse($berita->tanggal_publikasi)->format('l, d M Y') }}</div>
                  </div>
                  <div class="mt-1"><a href="{{ route('eproc.berita-tentang-pengadaan2', Crypt::encrypt($berita->id)) }}" class="small text-decoration-none text-dark stretched-link">Read More</a></div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
@endsection