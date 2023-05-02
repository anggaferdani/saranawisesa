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
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
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
                  <a class="nav-link" aria-current="page" href="{{ route('index') }}">HOME</a>
                </li>
                <li class="nav-item mx-1">
                  <a class="nav-link" href="#profile-perusahaan">ABOUT US</a>
                </li>
                <li class="nav-item mx-1">
                  <a class="nav-link" href="#visi">VISI & MISI</a>
                </li>
                <li class="nav-item mx-1">
                  <a class="nav-link" href="#jajaran">JAJARAN DIREKTUR</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>

    <!-- hero section -->
    <br>
    <section class="pl" id="profile-perusahaan">
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
          </div>
        </div>
      </div>
    </section>

    <section id="visi">
      <div class="container py-5">
        <div class="row">
          <div class="col-md-6 boxi">
            <div class="col-12 py-3">
              <span class="terx"><img class="mx-1" src="{{ asset('compro/img/mata.png') }}" alt=""> VISI</span>
              <hr>
              <ul>
                @foreach(explode('###', $profile_perusahaan->visi) as $visi)
                  <li class="tect py-2">{{ $visi }}</li>
                @endforeach
              </ul>
            </div>
            <div class="col-12 py-3">
              <span class="terx"><img class="mx-1" src="{{ asset('compro/img/panah.png') }}" alt=""> MISI</span>
              <hr>
              <ul>
                @foreach(explode('###', $profile_perusahaan->misi) as $misi)
                  <li class="tect py-2">{{ $misi }}</li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-12 py-3 ">
                <p class="nilai py-4">NILAI-NILAI SARANAWISESA</p>
              </div>
            </div>
            <div class="row">
              <div class="col-6 position-relative">
                <div class="divi text-center">
                  <Span class="huruf">M</Span>
                </div>
                <div class="rop">
                  <span>MAJU</span>
                  <p class="maju py-2">Proaktif dalam terus mengembangkan keterampilan diri sehingga mampu melaksanakan pekerjaan dengan baik</p>
                </div>
              </div>
              <div class="col-6 position-relative">
                <div class="divi text-center" style="background-color: #558225;">
                  <Span class="huruf">A</Span>
                </div>
                <div class="rop">
                  <span>AKUNTABEL</span>
                  <p class="maju py-2">Pertanggung jawaban transparan dan terukur<br><br></p>
                </div>
              </div>
            </div>
            <div class="row py-5">
              <div class="col-6 position-relative">
                <div class="divi text-center" style="background-color: #004EB4;;">
                  <Span class="huruf">J</Span>
                </div>
                <div class="rop">
                  <span>JUJUR</span>
                  <p class="maju py-2">Bertindak dengan intergritas, estetika, kejujuran, keadilan secara konsisten</p>
                </div>
              </div>
              <div class="col-6 position-relative">
                <div class="divi text-center" style="background-color: #8502AD;">
                  <Span class="huruf">U</Span>
                </div>
                <div class="rop">
                  <span>UNGGUL</span>
                  <p class="maju py-2">Terus-menerus mengejar standart kinerja yang tinggi</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <br><br><br>

    <section id="jajaran">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <span class="jajaran">JAJARAN DIREKTUR</span>
          </div>
        </div>
        <br><br><br>
        <img src="{{ asset('compro/img/kepala.png') }}" width="100%" alt="">
        <br><br>
        <div class="row">
          @foreach ($direksi as $direksis)
            <div class="col-4 text-center">
              <span class="umum ">{{ $direksis->nama_direksi }}</span>
              <br><br>
              <p class="umum1">“{{ $direksis->pendapat_direksi }}”</p>
              <span class="umum2">{{ $direksis->jabatan_direksi }}</span>
            </div>
          @endforeach
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
            <div class="mt-4">
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
            <div class="mt-4 ">
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