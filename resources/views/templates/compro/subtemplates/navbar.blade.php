<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a href="{{ route('index') }}"><img src="{{ asset('compro/img/logo.png') }}" class="navbar-brand brand" width="60px" alt=""></a>
    <img src="{{ asset('compro/img/ISO3.png') }}" class="" width="170" alt="">
    <button class="navbar-toggler mx-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav text-uppercase ms-auto">
        <li class="nav-item">
          <a class="nav-link nav-biasa {{ str_contains(Route::currentRouteName(), 'index') ? 'active' : '' }}" href="{{ route('index') }}">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-biasa {{ str_contains(Route::currentRouteName(), 'profile-perusahaan') ? 'active' : '' }}" href="{{ route('profile-perusahaan') }}">PROFILE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-biasa {{ str_contains(Route::currentRouteName(), 'produk-dan-layanans') ? 'active' : '' }}" href="{{ route('produk-dan-layanans') }}">PRODUCT & SERVICES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-biasa {{ str_contains(Route::currentRouteName(), 'portofolios') ? 'active' : '' }}" href="{{ route('portofolios') }}">PORTFOLIOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-biasa {{ str_contains(Route::currentRouteName(), 'artikels') ? 'active' : '' }}" href="{{ route('artikels') }}">ARTICLE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-biasa {{ str_contains(Route::currentRouteName(), 'compro.superadmin.produk-dan-layanan.index') ? 'active' : '' }}" href="{{ route('eproc.index') }}">PROCUREMENT</a>
        </li>
      </ul>
    </div>
  </div>
</nav>