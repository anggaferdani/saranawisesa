<section class="text-white pt-3 pt-md-5 pt-lg-5 pb-4" style="background-color: #212529;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-2 mx-auto px-md-2 px-lg-2 mt-3">
        <img src="{{ asset('eproc/img/saranawisesa2.png') }}" class="img-fluid" alt="">
      </div>
      <div class="col-md-3 mx-auto px-md-2 px-4 px-lg-2 mt-3">
        <ul class="list-unstyled">
          <h5 class="fw-semibold text-white">PROFILE</h5>
          <li><p class="d-block text-white text-decoration-none m-0">{!! Str::limit($profile_perusahaan->sejarah_perusahaan, 160) !!}</p></li>
        </ul>
      </div>
      <div class="col-md-1 mx-auto px-md-2 px-4 px-lg-2 mt-3">
        <ul class="list-unstyled">
          <h5 class="fw-semibold text-white">MENU</h5>
          <li><a href="{{ route('eproc.index') }}" class="d-block text-white text-decoration-none">Beranda</a></li>
          <li><a href="{{ route('eproc.pengadaan') }}" class="d-block text-white text-decoration-none">Pengadaan</a></li>
          <li><a href="{{ route('eproc.berita-tentang-pengadaan') }}" class="d-block text-white text-decoration-none">Berita</a></li>
          <li><a href="{{ route('eproc.kontak') }}" class="d-block text-white text-decoration-none">Kontak</a></li>
        </ul>
      </div>
      <div class="col-md-3 mx-auto px-md-2 px-4 px-lg-2 mt-3">
        <ul class="list-unstyled">
          <h5 class="fw-semibold text-white">ALAMAT</h5>
          <li><p class="d-block text-white text-decoration-none m-0">{{ $setting[2]->isi }}</p></li>
        </ul>
      </div>
    </div>
    <hr>
    <div class="d-flex justify-content-between mt-4">
      <p class="">©2020 Saranawisesa, All Rights Reserved.</p>
      <a href="" class="text-white text-decoration-none">Terms & Condition - Privacy - Cookies</a>
    </div>
  </div>
</section>