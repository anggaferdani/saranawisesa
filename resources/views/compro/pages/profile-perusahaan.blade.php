@extends('compro.templates.pages')
@section('title', 'Index')
@section('content')
<section class="py-5">
  <div class="container py-5">
    <div class="row py-5">
      <div class="col-md-6 text-center">
        <img src="{{ asset('img/logo.png') }}" width="300px" class="img-fluid" alt="">
      </div>
      <div class="col-md-6 pt-4">
        <h1>ABOUT US</h1>
        <p class="fw-light p-0 m-0 lh-sm">{{ $profile_perusahaan->sejarah_perusahaan }}</p>
        <div class="mt-4">
          <a href=""><img src="{{ asset('img/read-more.png') }}" alt=""></a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container py-5">
    <div class="row">
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title"><i class="bi bi-eye-fill"></i> asdsadas</h5>
            <hr>
            <ul style="list-style-type: none">
              @foreach(explode('#', $profile_perusahaan->visi) as $visi)
                <li class="tect py-2">{{ $visi }}</li>
              @endforeach
            </ul>
          </div>
          <div class="card-body">
            <h5 class="card-title"><i class="bi bi-pin-angle-fill"></i> asdsadas</h5>
            <hr>
            <ul style="list-style-type: none">
              @foreach(explode('#', $profile_perusahaan->misi) as $misi)
                <li class="tect py-2">{{ $misi }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <h1>NILAI NILAI SARANAWISESA</h1>
        <div class="row row-cols-2 row-cols-md-2 row-cols-lg-2 gx-3 gx-md-4 gx-lg-4 gy-5 gy-md-5 mt-2">
          <div class="col">
            <div class="card h-100">
              <div class="card-body position-relative">
                <div class="kotak m-0 position-absolute align-items-center" style="transform: translateY(-40px); background-color: #F9B305; width: 60px; height: 60px; border-radius: 10px;">
                  <p class="text-center my-auto fs-1 fw-bold text-white">M</p>
                </div>
                <div class="card-title mt-4">MAJU</div>
                <div class="card-text small lh-sm">Proaktif dalam terus mengembangkan keterampilan diri sehingga mampu melaksanakan pekerjaan dengan baik</div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <div class="card-body position-relative">
                <div class="kotak m-0 position-absolute align-items-center" style="transform: translateY(-40px); background-color: #558225; width: 60px; height: 60px; border-radius: 10px;">
                  <p class="text-center my-auto fs-1 fw-bold text-white">A</p>
                </div>
                <div class="card-title mt-4">AKUNTABEL</div>
                <div class="card-text small lh-sm">Pertanggung jawaban transparan dan terukur</div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <div class="card-body position-relative">
                <div class="kotak m-0 position-absolute align-items-center" style="transform: translateY(-40px); background-color: #004EB4; width: 60px; height: 60px; border-radius: 10px;">
                  <p class="text-center my-auto fs-1 fw-bold text-white">J</p>
                </div>
                <div class="card-title mt-4">JUJUR</div>
                <div class="card-text small lh-sm">Bertindak dengan intergritas, estetika, kejujuran, keadilan secara konsisten</div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <div class="card-body position-relative">
                <div class="kotak m-0 position-absolute align-items-center" style="transform: translateY(-40px); background-color: #8502AD; width: 60px; height: 60px; border-radius: 10px;">
                  <p class="text-center my-auto fs-1 fw-bold text-white">U</p>
                </div>
                <div class="card-title mt-4">UNGGUL</div>
                <div class="card-text small lh-sm">Terus-menerus mengejar standart kinerja yang tinggi</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container py-5">
    <div class="text-center">
      <h1>BOARD OF DIRECTORS</h1>
    </div>
    <div class="row">
      <img src="{{ asset('img/directors.png') }}" class="img-fluid" width="1200" alt="">
    </div>
    <div class="row mt-4">
      <div class="d-flex">
        @foreach ($direksis as $direksi)
        <div class="text-center pe-4">
          <h5 class="">{{ $direksi->nama_direksi }}</h5>
          <p class="lh-sm small mt-4">{{ $direksi->pendapat_direksi }}</p>
          <p class="lh-sm small mt-4">{{ $direksi->jabatan_direksi }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endsection