<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saranawisesa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('eproc/kontak.css') }}">
  </head>
  <body>

    @include('templates.eproc.header')

    <br><br><br>

    <div class="container" id="top">
      <div class="header">
          <h1 style=" color: #0458B8;" class="fs-3">HUBUNGI KAMI</h1>
          <img class="mt-3" src="{{ asset('eproc/img/call.png') }}" alt="">
      </div>
    </div>

  <div class="container" id="middle">
      <div class="row">
          <div class="col-md-12">
              <h1 style=" color: #0458B8;" class="fs-3">Saranawisesa Call Center</h1>
          </div>
          <div class="col-md-6">
              <p>Jika terdapat pertanyaan, kami siap membantu. Hubungi layanan pelanggan
                  SARANAWISESA atau temukan jawabannya di bawah ini.</p>
          </div>
      </div>
      <div class="row mt-3 mb-3">
          <div class="col-md-6">
              <h3 style=" color: #0458B8;" class="fs-4">Layanan Pelanggan SARANAWISESA</h3>
              <h3 style=" color: #0458B8;" class="fs-4">Telepon {{ $setting->no_telepon_perusahaan }}</h3>
              <h3 style=" color: #0458B8;" class="fs-4">Whatsapp {{ $setting->no_telepon_perusahaan }}</h3>
              <p class="mt-5" style=" color: #0458B8; width: 45%;">
                  Anda dapat menghubungi kami
                  Senin - Minggu: 10:00 – 21:00</p>
          </div>
          <div class="col-md-1"><div class="vr" style="height: 10rem;"></div></div>
          <div class="col-md-5">
              <h3 style=" color: #0458B8;" class="fs-4">Email</h3>
              <p>E-mail kami kapan pun dan kami akan membalasnya dalam
                  24 jam.
              </p>
              <p>Kirim Email ke <span class="fw-bold">{{ $setting->email_perusahaan }}</span></p>
          </div>
      </div>
  </div>

    @include('templates.eproc.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>