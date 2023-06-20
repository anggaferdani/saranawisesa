@extends('templates.compro.pages')
@section('title', 'Index')
@section('content')
<section style="height: 85vh; background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.2) 30%, rgba(0, 0, 0, 0.9) 100%), url({{ asset('portofolio/'.$portofolio["portofolio"]) }}); background-size: cover; background-repeat: no-repeat; background-position: center;">
  <div class="container h-100">
    <div class="row py-4 h-100 align-items-end">
      <div class="col-md-10 text-white">
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
        <div class="row px-md-4">
          <div>{!! $portofolio->isi_portofolio !!}</div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection