<section style="background-color: #323232;">
  <div class="container pt-3 pt-md-5 pb-2 pb-md-5">
    <div class="row justify-content-center">
      <div class="col-md-2 mx-auto px-md-2">
        <ul class="list-unstyled">
          <h5 class="fw-semibold text-white">PROFILE</h5>
          <li><a href="{{ route('profile-perusahaan') }}" class="d-block text-white text-decoration-none">About Us</a></li>
          <li><a href="{{ route('profile-perusahaan') }}/#visi-dan-misi" class="d-block text-white text-decoration-none">Visi & Misi</a></li>
          <li><a href="{{ route('profile-perusahaan') }}/#board-of-directors" class="d-block text-white text-decoration-none">Board of Directors</a></li>
          <li><a href="{{ route('profile-perusahaan') }}/#board-of-commissioners" class="d-block text-white text-decoration-none">Board of Commissioners</a></li>
        </ul>
      </div>
      <div class="col-md-2 mx-auto px-md-2">
        <ul class="list-unstyled">
          <h5 class="fw-semibold text-white">PRODUCT & SERVICES</h5>
          @foreach($produk_dan_layanans as $produk_dan_layanan)
            <li><a href="{{ route('produk-dan-layanan', Crypt::encrypt($produk_dan_layanan->id)) }}" class="d-block text-white text-decoration-none">{{ $produk_dan_layanan->judul }}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="col-md-2 mx-auto px-md-2">
        <ul class="list-unstyled">
          <h5 class="fw-semibold text-white">CONTACT INFO</h5>
          <li><p class="d-block text-white text-decoration-none m-0">Alamat :</p></li>
          <li><a href="{{ $setting[2]->link }}" class="d-block text-white text-decoration-none">{{ $setting[2]->isi }}</a></li>
          <li><p class="d-block text-white text-decoration-none m-0">Telepon :</p></li>
          <li><a href="{{ $setting[0]->link }}" class="d-block text-white text-decoration-none">{{ $setting[0]->isi }}</a></li>
          <li><a href="{{ $setting[1]->link }}" class="d-block text-white text-decoration-none">{{ $setting[1]->isi }}</a></li>
        </ul>
      </div>
      <div class="col-md-2 mx-auto px-md-2">
        <ul class="list-unstyled">
          <h5 class="fw-semibold text-white">SOCIAL MEDIA</h5>
          <li><a href="{{ $setting[3]->link }}" class="d-block text-white text-decoration-none"><i class="bi bi-facebook"></i> {{ $setting[3]->isi }}</a></li>
          <li><a href="{{ $setting[4]->link }}" class="d-block text-white text-decoration-none"><i class="bi bi-instagram"></i> {{ $setting[4]->isi }}</a></li>
          <li><a href="{{ $setting[5]->link }}" class="d-block text-white text-decoration-none"><i class="bi bi-twitter"></i> {{ $setting[5]->isi }}</a></li>
          <li><a href="{{ $setting[6]->link }}" class="d-block text-white text-decoration-none"><i class="bi bi-youtube"></i> {{ $setting[6]->isi }}</a></li>
        </ul>
      </div>
      <div class="col-md-3 mx-auto px-md-2">
        <img src="{{ asset('compro/img/ISO2.png') }}" class="img-fluid" alt="">
        <img src="{{ asset('compro/img/KAN.png') }}" class="img-fluid" alt="">
      </div>
    </div>
  </div>
</section>

<section class="py-3" style="background-color: #1A1A1A;">
  <div class="container">
    <div class="row justify-content-center text-white">©2023 Saranawisesa. Website by Spero.id</div>
  </div>
</section>