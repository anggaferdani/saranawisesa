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
    <br><br><br><br><br>
    
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div>
              <p class="qui">{{ $artikel->judul_artikel }}</p>
              <p class="dater">{{ \Carbon\Carbon::parse($artikel->tanggal_publikasi)->format('l, d M Y') }}</p>
              <div class="mb-4" id="inner-grid10">
                <div>
                  <img src="{{ asset('artikel/'.$artikel['thumbnail']) }}" width="100%" alt="">
                </div>
              </div>
              <p class="porro">{{ $artikel->isi_artikel }}</p>
              <p class="dater">Ditulis oleh {{ $artikel->created_by }}</p>
            </div>
          </div>
          <div class="col-md-4" style="margin-top: 85px;">
            @foreach ($artikel2->take(5) as $artikels)
            <div class="border-bottom mb-2" style="margin-right: calc(var(--bs-gutter-x) * -.0);" >
              <div class="row" style="padding-right: calc(var(--bs-gutter-x) * 0.5);">
                <div class="col-6">
                  <img src="{{ asset('artikel/'.$artikel['thumbnail']) }}" class="card-img-top" style="width: 110%; height: 100px; object-fit: cover;" alt="">
                </div>
                <div  class="col-6" >
                  <h5 class="est">{{ Str::limit($artikels->judul_artikel, 15) }}</h5>
                  <p class="date">{{ \Carbon\Carbon::parse($artikels->tanggal_publikasi)->format('l, d M Y') }}</p>
                  <p class="read"><a href="{{ route('artikel', $artikels->id) }}" class="card-link">Read more <img src="{{ asset('compro/img/black.png') }}" alt=""></a></p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>

    @include('templates.compro.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>