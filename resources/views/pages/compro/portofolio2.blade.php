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
    
    <!-- Our Portofolio -->
    <section id="portofolio">
      <div class="container position-relative">
        <div class="row">
          <div class="col-12">
            <h2 class="py-5" >Our Portofolio</h2>
          </div>
        </div>
        <div id="outer-grid3">
          @foreach ($portofolio as $portofolios)
          <div style="background-image: linear-gradient(180deg, rgba(217, 217, 217, 0) 4.69%, #000000 100%), url('{{ asset('portofolio/'.$portofolios['portofolio']) }}'); width: 100%; background-repeat: no-repeat; background-size: cover;">
            <h4>{{ Str::limit($portofolios->judul_portofolio, 25) }}</h4>
            <p class="jl">{{ Str::limit($portofolios->alamat_portofolio, 70) }}</p>
            <p class="more"><a href="{{ route('portofolio', $portofolios->id) }}">View more <img src="{{ asset('compro/img/arrow_right_alt.png') }}" alt=""></a></p>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    @include('templates.compro.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>