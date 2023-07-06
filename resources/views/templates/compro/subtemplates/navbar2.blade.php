<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container kontener px-2">
    <a href="{{ route('index') }}"><img id="sw" src="{{ asset('compro/img/logo.png') }}" class="navbar-brand ms-2 me-0 ms-md-0 me-md-2" alt=""></a>
    <img src="{{ asset('compro/img/ISO.png') }}" class="navbar-brand2" style="display: none;" width="150px" alt="">
    <button class="navbar-toggler mx-2 my-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navbar-collapse2" id="navbarNav">
      <ul class="navbar-nav text-uppercase ms-auto">
        <li class="nav-item">
          <a class="nav-link a {{ str_contains(Route::currentRouteName(), 'index') ? 'text-white' : '' }}" href="{{ route('index') }}">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link a {{ str_contains(Route::currentRouteName(), 'profile-perusahaan') ? 'active' : '' }}" href="{{ route('profile-perusahaan') }}">PROFILE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link a {{ str_contains(Route::currentRouteName(), 'produk-dan-layanans') ? 'active' : '' }}" href="{{ route('produk-dan-layanans') }}">PRODUCT & SERVICES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link a {{ str_contains(Route::currentRouteName(), 'portofolios') ? 'active' : '' }}" href="{{ route('portofolios') }}">PORTOFOLIO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link a {{ str_contains(Route::currentRouteName(), 'artikels') ? 'active' : '' }}" href="{{ route('artikels') }}">ARTICLE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link a {{ str_contains(Route::currentRouteName(), 'compro.superadmin.produk-dan-layanan.index') ? 'active' : '' }}" href="{{ route('eproc.index') }}">PROCUREMENT</a>
        </li>
      </ul>
    </div>
  </div>
</nav>