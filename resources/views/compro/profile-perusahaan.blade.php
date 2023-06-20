@extends('templates.compro.pages')
@section('title', 'Index')
@section('content')
<section class="py-5">
  <div class="container py-5">
    <div class="row py-5">
      <div class="col-md-6 text-center">
        <img src="{{ asset('compro/img/logo.png') }}" width="300px" class="img-fluid" alt="">
      </div>
      <div class="col-md-6 pt-4">
        <h1>ABOUT US</h1>
        <p class="fw-light p-0 m-0 lh-sm">{{ $profile_perusahaan->sejarah_perusahaan }}</p>
        <div class="mt-4">
          <a href="{{ route('profile-perusahaan') }}/#visi-dan-misi"><img src="{{ asset('img/read-more.png') }}" alt=""></a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5" id="visi-dan-misi">
  <div class="container py-5">
    <div class="row">
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title"><i class="bi bi-eye-fill"></i> VISI</h5>
            <hr>
            <ul style="list-style-type: none">
              @foreach(explode('#', $profile_perusahaan->visi) as $visi)
                <li class="tect py-2">{{ $visi }}</li>
              @endforeach
            </ul>
          </div>
          <div class="card-body">
            <h5 class="card-title"><i class="bi bi-pin-angle-fill"></i> MISI</h5>
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
    <div class="row">
      <h1 class="text-center">BOARD OF DIRECTORS</h1>
    </div>
    <div class="row g-2 mt-2">
      @foreach ($direksis as $direksi)
      <div class="col-md-4">
        <div class="card h-100 rounded-4">
          <div class="rounded-top-4" style="height: 300px; background-image: url({{ asset('direksi/'.$direksi['direksi']) }}); background-position: center; background-size: cover;"></div>
          <div class="card-body" style="display: flex; justify-content: space-between; flex-direction: column;">
            <div class="mb-2">
              <h5 class="card-title fw-bold">{{ $direksi->nama_direksi }}</h5>
              <p class="card-text small lh-sm">{!! $direksi->pendapat_direksi !!}</p>
            </div>
            <p class="card-text fw-semibold small lh-sm">{{ $direksi->jabatan_direksi }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container py-5">
    <div class="row">
      <h1 class="text-center">BOARD OF COMMISSINERS</h1>
    </div>
    <div class="row g-2 mt-2">
      @foreach ($komisarisies as $komisaris)
      <div class="col-md-4">
        <div class="card h-100 rounded-4">
          <div class="rounded-top-4" style="height: 300px; background-image: url({{ asset('komisaris/'.$komisaris["komisaris"]) }}); background-position: center; background-size: cover;"></div>
          <div class="card-body" style="display: flex; justify-content: space-between; flex-direction: column;">
            <div class="mb-2">
              <h5 class="card-title fw-bold">{{ $komisaris->nama_komisaris }}</h5>
              <p class="card-text small lh-sm">{!! $komisaris->pendapat_komisaris !!}</p>
            </div>
            <p class="card-text fw-semibold small lh-sm">{{ $komisaris->jabatan_komisaris }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection