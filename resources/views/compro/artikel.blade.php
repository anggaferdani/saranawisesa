@extends('templates.compro.pages')
@section('title', 'Index')
@section('content')
<section class="py-5">
  <div class="container py-5">
    <div class="row py-5">
      <div class="col-md-8">
        <h2 class="fw-semibold lh-sm">{{ $artikel->judul_artikel }}</h2>
        <p class="mt-2">{{ \Carbon\Carbon::parse($artikel->tanggal_publikasi)->format('l, d M Y') }}</p>
        <div class="mt-2 rounded-4" style="height: 360px; background: url({{ asset('artikel/'.$artikel["thumbnail"]) }}); background-size: cover; background-repeat: no-repeat; background-position: center;"></div>
        <p class="mt-4">{!! $artikel->isi_artikel !!}</p>
      </div>
      <div class="col-md-4 mt-5">
        <div class="row row-cols-1 row-cols-lg-1 mt-0 row-cols-1 gy-2">
          @foreach ($artikels as $artikels)
          <div class="col">
            <div class="card" style="border: none;">
              <div class="row">
                <div class="col-md-6 col-6 pe-0">
                  <div class="rounded-3" style="height: 110px; background: url({{ asset('artikel/'.$artikels["thumbnail"]) }}); background-size: cover; background-repeat: no-repeat; background-position: center;"></div>
                </div>
                <div class="col-md-6 col-6 py-2" style="display: flex; justify-content: space-between; flex-direction: column;">
                  <div>
                    <div class="lh-sm fw-semibold">{{ Str::limit($artikels->judul_artikel, 35) }}</div>
                    <div class="small text-secondary">{{ \Carbon\Carbon::parse($artikels->tanggal_publikasi)->format('l, d M Y') }}</div>
                  </div>
                  <div class="mt-2"><a href="{{ route('artikel', Crypt::encrypt($artikels->id)) }}" class="small text-decoration-none text-dark stretched-link">Read More</a></div>
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