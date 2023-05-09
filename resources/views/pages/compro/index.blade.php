<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('compro/img/logo-saranawisesa.png') }}" />
    <link rel="stylesheet" href="{{ asset('compro/style.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Kaushan+Script&family=Libre+Franklin&family=Roboto&family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Saranawisesa</title>
  </head>
  <body>
    @include('templates.compro.header')

    <!-- hero section -->
    <section id="home">
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-md-6 float-left">
            <h1 class="down">ONE</h1>
            <h1>STOP SOLUTION</h1>
            <h1>FOR EVERY BUSINESS</h1>
            <p class="solution">Whatever the Business Saranawisesa is the Solution</p>
            <div class="inner-form">
              <div class="input-field">
                <a href="#provil"><img src="{{ asset('compro/img/read-more.png') }}" alt=""></a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <img style="filter: brightness(70%);" src="{{ asset('compro/img/gambar0001.png') }}" class="position-absolute top-0 end-0 desk" width="" alt="">
          </div>
        </div>
      </div>
    </section>

    <br><br><br><br><br><br><br><br><br>

    <section class="kl" id="profile-perusahaan">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="row py-3">
              <div class="col">
                <img src="{{ asset('compro/img/profile0001.png') }}" width="100%" height="100%" alt="">
              </div>
              <div class="col">
                <img src="{{ asset('compro/img/profile0002.png') }}" width="100%" height="100%" alt="">
              </div>
            </div>
            <div class="row">
              <div class="col">
                <img src="{{ asset('compro/img/profile0003.png') }}" width="100%" height="100%" alt="">
              </div>
            </div>
          </div>
          <div class="col-md-6 py-5">
            <h6>{{ $profile_perusahaan->sejarah_perusahaan }}</h6>
            <div class="inner-form py-4">
              <div class="input-field">
                <a href="{{ route('profile-perusahaan') }}"><img src="{{ asset('compro/img/read-more.png') }}" alt=""></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- PRODUK & LAYANAN -->
    <section id="produk">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="py-5">PRODUK & LAYANAN</h2>
          </div>
        </div>
      </div>
      <div class="container">
       <div id="outer-grid">
        <div>
          <a href="#" style="text-decoration: none;">
            <img class="py-5" src="{{ asset('compro/img/logo1.png') }}" height="65%" alt="">
            <h3>WISE</h3>
            <p class="prod">Pengelolaan gedung dan Outsourcing
            </p>
          </a>
        </div>
        <div>
          <a href="#" style="text-decoration: none;">
          <img class="py-5" src="{{ asset('compro/img/logo2.png') }}" height="65%" alt="">
          <h3>WIRA</h3>
          <p class="prod">Pengadaan sistem
            keamanan
          </p>
          </a>
        </div>
        <div>
          <a href="product.html" style="text-decoration: none;">
          <img class="py-5" src="{{ asset('compro/img/logo3.png') }}" height="65%" alt="">
          <h3>SP PARKING</h3>
          <p class="prod"> Jasa Pengelolaan <br>Parkir
          </p>
          </a>
        </div>
        <div>
          <a href="#" style="text-decoration: none;">
          <img class="py-5" src="{{ asset('compro/img/logo4.png') }}" height="65%" alt="">
          <h3>ICT</h3>
          <p class="prod">Bisnis dalam  <br> bidang IT
          </p>
          </a>
        </div>
        <div>
          <a href="#" style="text-decoration: none;">
          <img class="py-5" src="{{ asset('compro/img/logo5.png') }}" height="65%" alt="">
          <h3>DIKLAT</h3>
          <p class="prod">Bisnis dalam bidang 
            pelatihan dan ISO
          </p>
          </a>
        </div>
      </div>
      </div>
    </section>

    <!-- Our Portofolio -->
    <section id="portofolio">
      <div class="container position-relative">
        <div class="row">
          <div class="col-12">
            <h2 class="py-5" >Our Portofolio</h2>
          </div>
        </div>
        <div id="outer-grid3">
          @foreach ($portofolio->take(6) as $portofolios)
          <div style="background-image: linear-gradient(180deg, rgba(217, 217, 217, 0) 4.69%, #000000 100%), url('{{ asset('portofolio/'.$portofolios['portofolio']) }}'); width: 100%; background-repeat: no-repeat; background-size: cover;">
            <h4>{{ Str::limit($portofolios->judul_portofolio, 25) }}</h4>
            <p class="jl">{{ Str::limit($portofolios->alamat_portofolio, 70) }}</p>
            <p class="more"><a href="{{ route('portofolio', $portofolios->id) }}">View more <img src="{{ asset('compro/img/arrow_right_alt.png') }}" alt=""></a></p>
          </div>
          @endforeach
        </div>
        <button class="button-arrow-left position-absolute start-0 top-50 translate-middle-y">
          <img class="hy" src="{{ asset('compro/img/back.png') }}" alt="">
        </button>
        <button class="button-arrow-right  position-absolute end-0 top-50 translate-middle-y">
          <img class="hy" src="{{ asset('compro/img/next.png') }}" alt="">
        </button>
      </div>
    </section>

    <!-- Article -->
    <section id="artikel">
      <div class="container">
        <div class="row">
          <div class="col-6">
            <h2 class="py-5">Article</h2>
          </div>
          <div class="col-6">
           <a href="{{ route('artikel2') }}"><p class="py-5 float-end" >Lihat selengkapnya <img src="{{ asset('compro/img/black.png') }}" alt=""></p></a>
          </div>
        </div>
        <div id="outer-grid4">
          @foreach ($artikel->take(5) as $artikels)
            <div class="mb-3">
              <div class="card-body">
                <img src="{{ asset('artikel/'.$artikels['thumbnail']) }}" class="card-img-top" style="width: 100%; height: 200px; object-fit: cover;" alt="">
                <h5 class="card-title mb-0">{{ Str::limit($artikels->judul_artikel, 15) }}</h5>
                <p class="card-text mb-0">{{ \Carbon\Carbon::parse($artikels->tanggal_publikasi)->format('l, d M Y') }}</p>
                <p class="card-text text-start mb-0">{!! Str::limit($artikels->isi_artikel, 80) !!}</p>
                <a href="{{ route('artikel', $artikels->id) }}" class="card-link">Read more <img src="{{ asset('compro/img/black.png') }}" alt=""></a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    @include('templates.compro.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>