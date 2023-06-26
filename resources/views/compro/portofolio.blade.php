@extends('templates.compro.pages')
@section('title', 'Portofolio')
@section('content')
@foreach ($portofolio->portofolio_images->take(1) as $portofolio_image)
<section style="height: 85vh; background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.2) 30%, rgba(0, 0, 0, 0.9) 100%), url({{ asset('compro/portofolio/image/'.$portofolio_image["image"]) }}); background-size: cover; background-repeat: no-repeat; background-position: center;">
@endforeach
  <div class="container h-100">
    <div class="row py-4 h-100 align-items-end">
      <div class="col-md-10 text-white">
        <h1 class="fw-bold">{{ $portofolio->judul }}</h1>
        <p class="fw-light fs-5">{{ $portofolio->alamat }}</p>
      </div>
    </div>
  </div>
</section>

<div class="section py-1 py-md-5">
  <div class="container py-1 py-md-5">
    <div class="row">
      <div class="col-md-6">
        <div class="row slider-for">
          @foreach ($portofolio->portofolio_images as $portofolio_image)
            <div class="col" style="height: 350px; background: url({{ asset('compro/portofolio/image/'.$portofolio_image["image"]) }}); background-size: cover; background-repeat: no-repeat;"></div>
          @endforeach
        </div>
        <div class="row mt-2 slider-nav">
          @foreach ($portofolio->portofolio_images as $portofolio_image)
            <div class="col pe-3"><div style="height: 150px; background: url({{ asset('compro/portofolio/image/'.$portofolio_image["image"]) }}); background-size: cover; background-repeat: no-repeat;"></div></div>
          @endforeach
        </div>
      </div>
      <div class="col-md-6">
        <div class="row px-md-4">
          <div>{!! $portofolio->isi !!}</div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection