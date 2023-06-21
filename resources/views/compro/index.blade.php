@extends('templates.compro.pages')
@section('title', 'Index')
@section('content')
<section style="height: 90vh;">
  <div class="container h-100 py-5">
    <div class="row h-100 align-items-center">
      <div class="col-md-6 order-2 order-md-1">
        <h1 class="fw-bold text-uppercase mb-2" style="font-size: 45px">PASSION <br>PERFORM <br>PRIDE</h1>
        <p class="fs-5 fw-semibold text-secondary lh-sm mb-2 mb-md-3">Whatever the Business <br>Saranawisesa is the <br>Solution</p>
        <a href=""><img src="{{ asset('img/read-more.png') }}" alt=""></a>
      </div>
      <div class="col-md-6 order-1 order-md-2">
        <img src="{{ asset('img/banner.png') }}" class="position-absolute top-0 end-0 z-n1 banner" style="filter: brightness(80%);" alt="">
      </div>
    </div>
  </div>
</section>

<section class="pb-md-5">
  <div class="container py-5">
    <div class="row g-2 g-md-4">
      <div class="col-md-6">
        <div class="row gx-2 gx-md-3">
          <div class="col">
            <div class="profile p-4" style="background-color: #920000;">
              <h2 class="text-white">Tentang <br>Kami</h2>
            </div>
          </div>
          <div class="col">
            <div class="profile2" style="background-image: url({{ asset('img/profile2.png') }}); background-position: center; background-repeat: no-repeat; background-size: cover"></div>
          </div>
        </div>
        <div class="row mt-2 mt-md-3 mt-lg-3">
          <div class="col">
            <div class="profile3" style="background-image: url({{ asset('img/profile3.png') }}); background-position: center; background-repeat: no-repeat; background-size: cover"></div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <p class="lh-sm m-0 p-0 mb-2 mb-md-4">{{ $profile_perusahaan->sejarah_perusahaan }}</p>
        <a href="{{ route('profile-perusahaan') }}"><img src="{{ asset('img/read-more.png') }}" alt=""></a>
      </div>
    </div>
  </div>
</section>

<section class="pb-md-5">
  <div class="container py-5">
    <div class="row">
      <h1>PRODUK & LAYANAN</h1>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-2 g-md-3 mt-2">
      @foreach($produk_dan_layanans as $produk_dan_layanan)
        <div class="col">
          <a href="{{ route('produk-dan-layanan', Crypt::encrypt($produk_dan_layanan->id)) }}" class="text-decoration-none">
            <div class="card h-100 rounded-4 border-light-subtle">
              <div class="row">
                <div class="col">
                  <div class="rounded-start-4" style="height: 175px; background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url({{ asset('compro/produk-dan-layanan/thumbnail/'.$produk_dan_layanan["thumbnail"]) }}); background-position: center; background-size: cover;"></div>
                </div>
                <div class="col">
                  <div class="card-body h-100 ps-0" style="height: 175px; display: flex; justify-content: space-between; flex-direction: column;">
                    <h4 class="card-title fw-bold text-uppercase" style="color: #920000;">{{ $produk_dan_layanan->judul }}</h4>
                    <p class="card-text fs-5 lh-sm">{!! Str::limit($produk_dan_layanan->deskripsi, 40) !!}</p>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>

<section class="pb-md-5">
  <div class="container py-5">
    <div class="row row-cols-1 row-cols-md-2 align-items-center">
      <div class="col">
        <h1>PORTOFOLIO</h1>
      </div>
      <div class="col text-start text-md-end">
        <a href="{{ route('portofolios') }}" class="text-decoration-none" style="color: #920000;">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3 g-2 mt-2">
      @foreach ($portofolios as $portofolio)
      <div class="col">
        <div class="card h-100 rounded-4 shadow-sm">
          <div class="rounded-top-4" style="height: 200px; background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url({{ asset('portofolio/'.$portofolio["portofolio"]) }}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
          <div class="card-body">
            <h5 class="card-title mt-2">{{ Str::limit($portofolio->judul_portofolio, 25) }}</h5>
            <p class="card-text small lh-sm">{!! Str::limit($portofolio->isi_portofolio, 80) !!}</p>
            <a href="{{ route('portofolio', Crypt::encrypt($portofolio->id)) }}" class="d-flex small align-items-center text-dark text-decoration-none">
              Read More<i class="bi bi-arrow-right stretched-link"></i>
            </a>
          </div>
        </div>
      </div>
      @endforeach      
    </div>
  </div>
</section>

<section class="pb-md-5">
  <div class="container py-5">
    <div class="row row-cols-1 row-cols-md-2 align-items-center">
      <div class="col">
        <h1>ARTICLE</h1>
      </div>
      <div class="col text-start text-md-end">
        <a href="{{ route('artikels') }}" class="text-decoration-none" style="color: #920000;">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
    <div class="row row-cols-1 row-cols-md-5 g-2 mt-2">
      <?php $id = 0; ?>
      @foreach ($artikels as $artikel)
      <?php $id++; ?>
      <div class="col">
        <div class="card h-100 rounded-4">
          <div class="rounded-top-4 d-flex justify-content-end align-items-end px-3 py-2" style="height: 200px; background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url({{ asset('artikel/'.$artikel["thumbnail"]) }}); background-position: center; background-size: cover;">
            <h2 class="text-white m-0">0{{ $id }}</h2>
          </div>
          <div class="card-body" style="display: flex; justify-content: space-between; flex-direction: column;">
            <div>
              <h5 class="card-title fw-bold" style="color: #920000;">{{ Str::limit($artikel->judul_artikel, 13) }}</h5>
              <p class="card-text fw-semibold small lh-sm">{!! Str::limit($artikel->isi_artikel, 80) !!}</p>
            </div>
            <a href="{{ route('artikel', Crypt::encrypt($artikel->id)) }}" class="d-flex justify-content-end align-items-center text-decoration-none text-dark fw-semibold small lh-sm stretched-link mt-4">Read More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection