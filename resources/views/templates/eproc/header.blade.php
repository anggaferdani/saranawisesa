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
<nav class="navbar bg-light position-fixed w-100 top-0">
  <div class="container">
      <div class="container-fluid d-flex" id="menu__nav">
          <a href="home.html" class="navbar-brand"><img src="{{ asset('eproc/img/saranawisesa-logo.png') }}" width="75%" alt=""></a>
          <form class="d-flex sub__menu" role="search">
            <a class="nav-link active" aria-current="page" href="home.html">Beranda</a>
            <a class="nav-link" href="{{ route('eproc.pengadaan') }}">Pengadaan</a>
            <a class="nav-link" href="berita.html">Berita</a>
            <a class="nav-link" href="kontak.html">Kontak Kami</a>
            @if(Session::has('eproc'))
              @if(auth()->user()->level == 'perusahaan')
                <a class="nav-link" href="{{ route('eproc.logout') }}">Logout</a>
              @endif
            @endif
          </form>
      </div>
  </div>
</nav>