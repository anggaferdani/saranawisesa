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
    <br><br>
    
    <!-- Article -->
    <section id="artikel">
      <div class="container">
        <div class="row">
          <div class="col-6">
            <h2 class="py-5">Article</h2>
          </div>
          <div class="col-6">
          </div>
        </div>
        <div id="outer-grid4">
          @foreach ($artikel as $artikels)
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