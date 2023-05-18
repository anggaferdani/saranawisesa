{{-- <nav class="navbar bg-light position-relative top-0">
  <div class="container">
      <div class="container-fluid d-flex" id="menu__nav">
          <a href="home.html" class="navbar-brand"><img src="img/saranawisesa-logo.png" width="75%" alt=""></a>
          <form class="d-flex sub__menu" role="search">
            <a class="nav-link active" aria-current="page" href="home.html">Beranda</a>
            <a class="nav-link" href="pengadaan.html">Pengadaan</a>
            <a class="nav-link" href="berita.html">Berita</a>
            <a class="nav-link" href="kontak.html">Kontak Kami</a>
            <a><img src="img/ptofile.png" alt=""></a>
          </form>
      </div>
  </div>
</nav> --}}
{{-- <nav class="navbar bg-light position-fixed w-100 top-0">
  <div class="container">
      <div class="container-fluid d-flex" id="menu__nav">
          <a href="{{ route('index') }}" class="navbar-brand"><img src="{{ asset('eproc/img/saranawisesa-logo.png') }}" width="75%" alt=""></a>
          <form class="d-flex sub__menu" role="search">
            <a class="nav-link active" aria-current="page" href="{{ route('eproc.beranda') }}">Beranda</a>
            <a class="nav-link" href="{{ route('eproc.pengadaan') }}">Pengadaan</a>
            <a class="nav-link" href="{{ route('eproc.berita') }}">Berita</a>
            <a class="nav-link" href="{{ route('eproc.kontak-kami') }}">Kontak Kami</a>
            @if(Session::has('eproc'))
              @if(auth()->user()->level == 'perusahaan')
                <a class="nav-link" href="{{ route('eproc.logout') }}">Logout</a>
              @endif
            @else
            <a class="nav-link" href="{{ route('eproc.login') }}">Login</a>
            <a class="nav-link" href="{{ route('eproc.register') }}">Register</a>
            @endif
          </form>
      </div>
  </div>
</nav> --}}
<nav class="navbar navbar-expand-lg bg-white fixed-top border-bottom">
  <div class="container">
    <a href="{{ route('index') }}" class="navbar-brand"><img src="{{ asset('eproc/img/saranawisesa-logo.png') }}" width="75%" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav gap-0 gap-md-2 gap-lg-2">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('eproc.beranda') }}">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('eproc.pengadaan') }}">Pengadaan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('eproc.berita') }}">Berita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('eproc.kontak') }}">Kontak Kami</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('eproc/img/ptofile.png') }}" alt="">
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('eproc.logout') }}">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>