@extends('templates.eproc.pages')
@section('title', 'Contact Us')
@section('content')
<section class="py-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('eproc/img/kontak.png') }}); background-size: cover; background-repeat: no-repeat; background-position: center;">
  <div class="container py-5 h-100">
    <div class="row py-5 justify-content-center text-center align-items-center h-100">
      <div class="col text-white"><h1>CONTACT US</h1></div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container py-5">
    <div class="row">
      <div class="col-md-4 px-2 px-md-5 contact  border-end border-dark border-2">
        <div class="location d-flex gap-3">
          <div class="icon">
            <i class="fa-solid fa-location-dot fs-1" style="color: #830000;"></i>
          </div>
          <div class="location-desc">
            <h3 class="fw-bold" style="color: #830000;">LOCATION</h3>
            <p class="">Sarana Square Lt.5 Jalan Tebet Barat IV No.20, Jakarta Selatan 12810</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 px-2 px-md-5 contact">
        <div class="location d-flex gap-3">
          <div class="icon">
            <i class="fa-solid fa-envelope fs-1" style="color: #830000;"></i>
          </div>
          <div class="location-desc">
            <h3 class="fw-bold" style="color: #830000;">E-MAIL</h3>
            <p class="">Hubungi alamat email kami di <span class="fw-bold">info@saranawisesa.co.id</span></p>
          </div>
        </div>
      </div>
      <div class="col-md-4 px-2 px-md-5 contact border-start border-dark border-2">
        <div class="location d-flex gap-3">
          <div class="icon">
            <i class="fa-solid fa-phone fs-1" style="color: #830000;"></i>
          </div>
          <div class="location-desc">
            <h3 class="fw-bold" style="color: #830000;">CALL SERVICES</h3>
            <p class=""><span class="fw-bold">(021) 83794770</span><br> Anda dapat mengubungi kami <span class="fw-bold">Senin - Minggu : 10.00 - 21.00</span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection