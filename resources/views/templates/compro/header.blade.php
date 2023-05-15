<header>
  <div class="">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top ">
      <div class="container">
        <a href="{{ route('index') }}">
          <img src="{{ asset('compro/img/logo-saranawisesa.png') }}" alt="" width="56" class="d-inline-block align-text-top">
        </a>
        <button class=" mx-4 navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto py-4">
            <li class="nav-item mx-1">
              <a class="nav-link " aria-current="page" href="{{ route('index') }}">HOME</a>
            </li>
            <li class="nav-item mx-1">
              <a class="nav-link" href="{{ route('profile-perusahaan') }}">PROFILE</a>
            </li>
            <li class="nav-item mx-1">
              <a class="nav-link" href="{{ route('portofolio2') }}">PORTOFOLIO</a>
            </li>
            <li class="nav-item mx-1">
              <a class="nav-link" href="{{ route('artikel2') }}">ARTIKEL</a>
            </li>
            <li class="nav-item mx-1">
              <a class="nav-link" href="{{ route('eproc.beranda') }}">PROCUREMENT</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>