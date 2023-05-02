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
    <header>
      <div class="">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top ">
          <div class="container">
            <a href="{{ route('index') }}">
              <img src="{{ asset('compro/img/logo-saranawisesa.png') }}" alt="" width="56" class="d-inline-block align-text-top">
            </a>
            <button class=" mx-4 navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto py-4">
                <li class="nav-item mx-1">
                  <a class="nav-link " aria-current="page" href="{{ route('index') }}#home">HOME</a>
                </li>
                <li class="nav-item mx-1">
                  <a class="nav-link " href="{{ route('index') }}#profile-perusahaan">PROFILE</a>
                </li>
                <li class="nav-item mx-1">
                  <a class="nav-link" href="{{ route('index') }}#produk">PRODUCT & SERVICES</a>
                </li>
                <li class="nav-item mx-1" style="font-weight: 600;">
                  <a class="nav-link active" href="#">PORTOFOLIO</a>
                </li>
                <li class="nav-item mx-1">
                  <a class="nav-link" href="{{ route('index') }}#artikel">ARTICLE</a>
                </li>
                <li class="nav-item mx-1">
                  <a class="nav-link" href="#">PROCUREMENT</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>

    <!-- hero section -->
    <br><br><br><br>

    <section class="qe">
      <main>
        <img src="/portofolio/{{ $portofolio->portofolio }}" style="width: 100%; height: 65vh; object-fit: cover" alt="">
      </main>
      <div class="container">
        <div class="row py-5">
          <div class="col-12">
            <span class="mall">{{ $portofolio->judul_portofolio }}</span>
            <p class="alamat mt-2">{{ $portofolio->alamat_portofolio }}</p>
            <p class="penje">{{ $portofolio->isi_portofolio }}</p>
            <p class="dater">Ditulis oleh {{ $portofolio->created_by }}</p>
          </div>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <section>
      <div class="foli mt-5">
        <div class="container">
          <div id="outer-grid5">
            <div class="mt-4 ">
              <h5 class="mx-4 py-2">PROFILE</h5>
              <ul class="ulli">
                <li class="item">
                  <a href="about.html">About Us</a>
                </li>
                <li class="item">
                  <a href="#">Visi & Misi</a>
                </li>
                <li class="item">
                  <a href="#">Board of Directors</a>
                </li>
                <li class="item">
                  <a href="#">Board of Commissioners</a>
                </li>
              </ul>
            </div>
            <div class="mt-4 ">
              <h5 class="mx-4 py-2">PRODUCT & SERVICES</h5>
              <ul class="ulli">
                <li class="item">
                  <a href="">Wise</a>
                </li>
                <li class="item">
                  <a href="">Wira</a>
                </li>
                <li class="item">
                  <a href="">SP Parking</a>
                </li>
                <li class="item">
                  <a href="">ICT</a>
                </li>
                <li class="item">
                  <a href="">DIKLAT</a>
                </li>
              </ul>
            </div>
            <div class="mt-4 ">
              <h5 class="mx-4 py-2">CONTACT INFO</h5>
              <ul class="ulli">
                <li class="item">
                  Address : {{ $setting->alamat_perusahaan }}
                </li>
                <li class="item">
                  Telephone : {{ $setting->no_telepon_perusahaan }}
                </li>
                <li class="item">
                  {{ $setting->email_perusahaan }}
                </li>
              </ul>
            </div>
            <div class="mt-4">
              <h5 class="mx-4 py-2">SOCIAL MEDIA</h5>
              <ul class="ulli">
                <li class="item">
                  <a class="bi bi-facebook" href="{{ $setting->facebook }}"> saranawisesa</a>
                </li>
                <li class="item">
                  <a class="bi bi-instagram" href="{{ $setting->instagram }}"> saranawisesa.ofc</a>
                </li>
                <li class="item">
                  <a class="bi bi-twitter" href="{{ $setting->twitter }}"> saranawisesa.ofc</a>
                </li>
                <li class="item">
                  <a class="bi bi-youtube" href="{{ $setting->youtube }}"> saranawisesa TV</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="end" >
        <h7>©2023 Saranawisesa. Website by Spero.id</h7>
      </div>
    </section>
    <!-- AKHIR FOOTER -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>