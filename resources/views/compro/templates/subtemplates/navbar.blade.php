<nav class="navbar navbar-expand-lg bg-light-subtle fixed-top border-bottom">
  <div class="container">
    <a href="{{ route('index') }}"><img src="{{ asset('img/saranawisesa.png') }}" class="navbar-brand" alt=""></a>
    <img src="{{ asset('img/ISO.png') }}" class="navbar-brand" width="170" alt="">
    <button class="navbar-toggler mx-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav text-uppercase ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('index') }}">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('profile-perusahaan') }}">PROFILE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('produk-dan-layanan') }}">PRODUCT & SERVICES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('portofolios') }}">PORTOFOLIO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('artikels') }}">ARTICLE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('eproc.beranda') }}">PROCUREMENT</a>
        </li>
      </ul>
    </div>
  </div>
</nav>