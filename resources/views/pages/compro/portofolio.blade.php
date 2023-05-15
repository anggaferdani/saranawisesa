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
    <br><br><br><br>

    <section class="qe">
      <main>
        <img src="{{ asset('portofolio/'.$portofolio['portofolio']) }}" style="width: 100%; height: 65vh; object-fit: cover" alt="">
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

    @include('templates.compro.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>