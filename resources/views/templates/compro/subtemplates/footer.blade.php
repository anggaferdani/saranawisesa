<section style="background-color: #323232;">
  <div class="container pt-3 pt-md-5 pb-2 pb-md-4">
    <div class="row justify-content-center">
      <div class="col-md-2 mx-auto px-md-2">
        <ul class="list-unstyled">
          <h5 class="fw-bold text-white fs-6 mb-4">PROFILE</h5>
          <li><a href="{{ route('profile-perusahaan') }}" class="d-block text-white text-decoration-none small">About Us</a></li>
          <li><a href="{{ route('profile-perusahaan') }}/#visi-dan-misi" class="d-block text-white text-decoration-none small">Visi & Misi</a></li>
          <li><a href="{{ route('profile-perusahaan') }}/#board-of-directors" class="d-block text-white text-decoration-none small">Board of Directors</a></li>
          <li><a href="{{ route('profile-perusahaan') }}/#board-of-commissioners" class="d-block text-white text-decoration-none small">Board of Commissioners</a></li>
        </ul>
      </div>
      <div class="col-md-3 mx-auto px-md-2">
        <ul class="list-unstyled">
          <h5 class="fw-bold text-white fs-6 mb-4">PRODUCT & SERVICES</h5>
          <div style="display:grid; grid-template-rows: repeat(6, 1fr); grid-auto-flow: column">
            @foreach($produk_dan_layanans as $produk_dan_layanan)
              <li><a href="{{ route('produk-dan-layanan', Crypt::encrypt($produk_dan_layanan->id)) }}" class="d-block text-white text-decoration-none small product-and-service">{{ $produk_dan_layanan->judul }}</a></li>
            @endforeach
          </div>
        </ul>
      </div>
      <div class="col-md-3 mx-auto px-md-2">
        <ul class="list-unstyled">
          <h5 class="fw-bold text-white fs-6 mb-4">CONTACT INFO</h5>
          <li class="d-flex"><i class="fa-solid fa-location-dot text-white me-3 small"></i><a href="{{ $setting[2]->link }}" class="d-block text-white text-decoration-none small">{!! $setting[2]->isi !!}</a></li>
          <li class="d-flex"><i class="fa-solid fa-phone text-white me-3 small"></i><a href="{{ $setting[0]->link }}" class="d-block text-white text-decoration-none small">{!! $setting[0]->isi !!}</a></li>
          <li class="d-flex"><i class="fa-solid fa-envelope text-white me-3 small"></i><a href="{{ $setting[1]->link }}" class="d-block text-white text-decoration-none small">{{ $setting[1]->isi }}</a></li>
        </ul>
      </div>
      <div class="col-md-3 mx-auto px-md-2 text-center">
        <img src="{{ asset('compro/img/ISO2.png') }}" class="img-fluid" alt="">
        <img src="{{ asset('compro/img/KAN.png') }}" width="100px" class="img-fluid mt-3" alt="">
      </div>
    </div>
    <div class="row mt-5 justify-content-center text-center">
      <div class="col">
        <a href="{{ $setting[4]->link }}" class="text-white mx-2 fs-5"><i class="fa-brands fa-facebook"></i></a>
        <a href="{{ $setting[3]->link }}" class="text-white mx-2 fs-5"><i class="fa-brands fa-instagram"></i></a>
        <a href="{{ $setting[5]->link }}" class="text-white mx-2 fs-5"><i class="fa-brands fa-twitter"></i></a>
        <a href="{{ $setting[6]->link }}" class="text-white mx-2 fs-5"><i class="fa-brands fa-youtube"></i></a>
      </div>
    </div>
  </div>
</section>

<section class="py-3" style="background-color: #1A1A1A;">
  <div class="container">
    <div class="row justify-content-center text-white">©2023 Saranawisesa. Website by Spero.id</div>
  </div>
</section>