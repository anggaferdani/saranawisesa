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
                @foreach(explode('#', $profile_perusahaan->visi) as $visi)
                  <li class="tect py-2">{{ $visi }}</li>
                @endforeach
              </ul>
            </div>
            <div class="col-12 py-3">
              <span class="terx"><img class="mx-1" src="{{ asset('compro/img/panah.png') }}" alt=""> MISI</span>
              <hr>
              <ul>
                @foreach(explode('#', $profile_perusahaan->misi) as $misi)
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

    @include('templates.compro.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>