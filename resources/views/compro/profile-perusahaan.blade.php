@extends('templates.compro.pages')
@section('title', 'Profile Perusahaan')
@section('content')
<section class="py-5">
  <div class="container py-5">
    <div class="row py-5">
      <div class="col-md-6 text-center">
        <img src="{{ asset('compro/img/logo.png') }}" width="300px" class="img-fluid" alt="">
      </div>
      <div class="col-md-6 pt-4">
        <h1>ABOUT US</h1>
        <div class="fw-light p-0 m-0 lh-sm" style="text-align: justify;">{!! $profile_perusahaan->sejarah_perusahaan !!}</div>
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
            <h5 class="card-title"><i class="fa-solid fa-eye"></i> VISI</h5>
            <hr>
            <div>{!! $profile_perusahaan->visi !!}</div>
          </div>
          <div class="card-body">
            <h5 class="card-title"><i class="fa-solid fa-thumbtack"></i> MISI</h5>
            <hr>
            <div>{!! $profile_perusahaan->misi !!}</div>
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

<section class="pt-5 pb-2">
  <div class="container pt-5">
    <div class="row">
      <h1 class="text-center">BOARD OF COMMISSIONERS</h1>
    </div>
    <div class="row g-2 g-md-5 mt-4 justify-content-center">
      @foreach ($komisarisies as $komisaris)
      <div class="col-md-4 m-0">
        <div class="card h-100 rounded-4 border-0">
          <div class="rounded-circle mx-auto" style="height: 250px; width: 250px; background-image: url({{ asset('komisaris/'.$komisaris["komisaris"]) }}); background-position: center; background-size: cover; border: 5px #920000 solid;"></div>
          <div class="card-body px-0 px-md-5">
            <div class="mb-2">
              <h5 class="card-title fw-bold text-center mt-2">{{ $komisaris->nama_komisaris }}</h5>
              <p class="card-text fw-semibold small lh-sm text-center mt-2" style="color: #920000;">{{ $komisaris->jabatan_komisaris }}</p>
              <div class="card-text small lh-sm" style="text-align: justify;">{!! $komisaris->pendapat_komisaris !!}</div>
            </div>
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
      <h1 class="text-center">BOARD OF DIRECTORS</h1>
    </div>
    <div class="row g-2 g-md-5 mt-4 justify-content-center">
      @foreach ($direksis as $direksi)
      <div class="col-md-4 m-0">
        <div class="card h-100 rounded-4 border-0">
          <div class="rounded-circle mx-auto" style="height: 250px; width: 250px; background-image: url({{ asset('direksi/'.$direksi['direksi']) }}); background-position: center; background-size: cover; border: 5px #920000 solid;"></div>
          <div class="card-body px-0 px-md-5">
            <div class="mb-2">
              <h5 class="card-title fw-bold text-center mt-2">{{ $direksi->nama_direksi }}</h5>
              <p class="card-text fw-semibold small lh-sm text-center mt-2" style="color: #920000;">{{ $direksi->jabatan_direksi }}</p>
              <div class="card-text small lh-sm" style="text-align: justify;">{!! $direksi->pendapat_direksi !!}</div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection