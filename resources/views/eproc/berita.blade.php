@extends('templates.eproc.pages')
@section('title', 'Berita')
@section('content')
<section>
  <div class="container h-100" style=" position: relative; overflow: hidden;">
    <div class="row mt-5">
      <h2 class="fw-bold">Berita <span class="fw-light">Seputar Pengadaan</span></h2>
    </div>
    <div class="row mx-0 mt-2 p-md-4 align-items-lg-center align-items-end" style="height: 50vh; background: #830000;">
      <div class="col-md-8 text-white">
        <h1 class="fw-bold title m-0">Lorem ipsum dolor</h1>
        <p class="fw-light lh-sm fs-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi, dolores! Ad eum laborum unde harum vitae, ducimus labore exercitationem, aut dicta ab consequuntur eveniet eligendi dolorum odio dignissimos. Sapiente, accusamus!</p>
      </div>
    </div>
    <img src="{{ asset('eproc/img/ball.png') }}" class="position-absolute ball" alt="">
  </div>
</section>

<section>
  <div class="container mt-5">
    <h2 class="fw-light">List <span class="fw-bold" style="color: #830000;">Berita</span></h2>
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3 g-2 mt-2">
      @foreach($beritas as $berita)
      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="" style="height: 200px; background: url({{ asset('eproc/berita/'.$berita["thumbnail"]) }}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
          <div class="card-body" style="display: flex; justify-content: space-between; flex-direction: column;">
            <div class="mb-2">
              <p class="small m-0">{{ \Carbon\Carbon::parse($berita->tanggal_publikasi)->format('l, d M Y') }}</p>
              <h5 class="card-title mt-1">{{ Str::limit($berita->judul_berita, 55) }}</h5>
              <p class="card-text small lh-sm">{!! Str::limit($berita->isi_berita, 120) !!}</p>
            </div>
            <a href="{{ route('eproc.berita-tentang-pengadaan2', Crypt::encrypt($berita->id)) }}" class="d-flex small align-items-center text-dark text-decoration-none stretched-link">
              Read More<i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<div class="section py-5">
  <div class="container d-flex justify-content-center">
    {{ $beritas->links('pagination::bootstrap-4') }}
  </div>
</div>
@endsection