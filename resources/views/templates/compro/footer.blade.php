<!-- FOOTER -->
<section>
  <div class="foli mt-5">
    <div class="container">
      <div id="outer-grid5">
        <div class="mt-4 ">
          <h5 class="mx-4 py-2">PROFILE</h5>
          <ul class="ulli">
            <li class="item">
              <a href="about.html">About Us</a>
            </li>
            <li class="item">
              <a href="#">Visi & Misi</a>
            </li>
            <li class="item">
              <a href="#">Board of Directors</a>
            </li>
            <li class="item">
              <a href="#">Board of Commissioners</a>
            </li>
          </ul>
        </div>
        <div class="mt-4">
          <h5 class="mx-4 py-2">PRODUCT & SERVICES</h5>
          <ul class="ulli">
            <li class="item">
              <a href="">Wise</a>
            </li>
            <li class="item">
              <a href="">Wira</a>
            </li>
            <li class="item">
              <a href="">SP Parking</a>
            </li>
            <li class="item">
              <a href="">ICT</a>
            </li>
            <li class="item">
              <a href="">DIKLAT</a>
            </li>
          </ul>
        </div>
        <div class="mt-4 ">
          <h5 class="mx-4 py-2">CONTACT INFO</h5>
          <ul class="ulli">
            <li class="item">
              Address : {{ $setting->alamat_perusahaan }}
            </li>
            <li class="item">
              Telephone : {{ $setting->no_telepon_perusahaan }}
            </li>
            <li class="item">
              {{ $setting->email_perusahaan }}
            </li>
          </ul>
        </div>
        <div class="mt-4 ">
          <h5 class="mx-4 py-2">SOCIAL MEDIA</h5>
          <ul class="ulli">
            <li class="item">
              <a class="bi bi-facebook" href="{{ $setting->facebook }}"> saranawisesa</a>
            </li>
            <li class="item">
              <a class="bi bi-instagram" href="{{ $setting->instagram }}"> saranawisesa.ofc</a>
            </li>
            <li class="item">
              <a class="bi bi-twitter" href="{{ $setting->twitter }}"> saranawisesa.ofc</a>
            </li>
            <li class="item">
              <a class="bi bi-youtube" href="{{ $setting->youtube }}"> saranawisesa TV</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="end" >
    <h7>©2023 Saranawisesa. Website by Spero.id</h7>
  </div>
</section>
<!-- AKHIR FOOTER -->