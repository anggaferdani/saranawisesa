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

<section>
  <div class="container py-5">
    <div class="row mt-2">
      <div class="col-md-8">
        <h1 style="color: #830000;">Saranawisesa call center</h1>
        <p>Jika terdapat pertanyaan, kami siap membantu. Hubungi layanan pelanggan SARANAWISESA atau temukan jawabannya di bawah ini.</p>
      </div>
    </div>
    <div class="row g-4 mt-2">
      <div class="col-md-6">
        <div class="row">
          <h4>Layanan Pelanggan SARANAWISESA</h4>
          <h4>Telepon {{ $setting[0]->isi }}</h4>
        </div>
        <div class="row">
          <p class="m-0 fs-4 lh-sm">Anda dapat menghubungi kami <br>Senin - Minggu : 10.00 - 21.00</p>
        </div>
      </div>
      <div class="col-md-1"><div class="vr h-100"></div></div>
      <div class="col-md-5">
        <div class="row">
          <h4 style="color: #830000;">Email</h4>
          <p class="fs-5 lh-sm">Email kami kapan pun dan kami akan membalasnya dalam 24 jam</p>
          <p class="fs-5">kirim email ke {{ $setting[1]->isi }}</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection