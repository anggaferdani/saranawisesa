@extends('compro.templates.pages')
@section('title', 'Index')
@section('content')
<section style="height: 100vh; background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.5) 50%, #000000 100%), url({{ asset('portofolio/'.$portofolio["portofolio"]) }}); background-size: cover; background-repeat: no-repeat; background-position: center;">
  <div class="container vh-100">
    <div class="row py-4 vh-100 align-items-end">
      <div class="col-12 col-lg-8 col-md-6 text-white">
        <h1 class="fw-bold">{{ $portofolio->judul_portofolio }}</h1>
        <p class="fw-light fs-5">{{ $portofolio->alamat_portofolio }}</p>
      </div>
    </div>
  </div>
</section>

<div class="section py-5">
  <div class="container py-5">
    <div class="row">
      <div class="col-md-6 px-4 px-md-2 px-lg-2">
        <div class="row" style="height: 300px; background: url({{ asset('portofolio/'.$portofolio["portofolio"]) }}); background-size: cover; background-repeat: no-repeat;"></div>
        <div class="row mt-3 slider">
          @foreach ($portofolio->portofolio_images as $portofolios)
            <div class="col pe-3"><div style="height: 150px; background: url({{ asset('portofolio/image/'.$portofolios["image"]) }}); background-size: cover; background-repeat: no-repeat;"></div></div>
          @endforeach
        </div>
      </div>
      <div class="col-md-6">
        <div class="row row-cols-1 gy-2 gy-md-3 gy-lg-3 py-2 pt-md-0 pt-lg-0">
          <div class="col">
            <div class="row align-items-center">
              <div class="col-md-2 col-2 text-center pe-0"><i class="bi bi-people-fill text-danger fs-1"></i></div>
              <div class="col-md-10 col-10">
                <h4>Pengelolaan Gedung & Staff Admin</h4>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="row align-items-center">
              <div class="col-md-2 col-2 text-center pe-0"><i class="bi bi-car-front-fill text-danger fs-1"></i></div>
              <div class="col-md-10 col-10">
                <h4>Sistem Parkir</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection