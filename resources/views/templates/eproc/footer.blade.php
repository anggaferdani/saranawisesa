<footer>
  <div class="container">
      <div class="row" id="footer__main">
          <div class="col-md-3">
              <img src="{{ asset('eproc/img/logo-saranawisesaputih.png') }}" alt="">
          </div>
          <div class="col-md-4">
              <h3>SARANAWISESA</h3>
              <p class="tj fw-light">{{ $profile_perusahaan->sejarah_perusahaan }}</p>
          </div>
          <div class="col-md-2">
              <h3>MENU</h3>
              <p class="mb-1">Beranda</p>
              <p class="mb-1">Pengadaan</p>
              <p class="mb-1">Berita</p>
              <p class="mb-1">Kontak Kami</p>
          </div>
          <div class="col-md-3">
              <h3>ALAMAT</h3>
              <P class="tj fw-light">{{ $setting->alamat_perusahaan }}</P>
          </div>
      </div>
      <div id="footer__bottom">
          <hr class="bg-white border-2 border-bottom border-white">
          <div class="legal">
              <p>©2020 Saranawisesa, All Rights Reserved.</p>
              <p>Terms & Condition - Privacy - Cookies</p>
          </div>
      </div>
  </div>
</footer>