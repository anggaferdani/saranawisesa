@extends('templates.compro.pages')
@section('title', 'Produk Dan Layanan')
@section('content')
<section class="py-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('compro/produk-dan-layanan/thumbnail/'.$produk_dan_layanan["thumbnail"]) }}); background-size: cover; background-repeat: no-repeat; background-position: center;">
  <div class="container py-5 h-100">
    <div class="row py-5 justify-content-center align-items-center h-100">
      <div class="col-md-10 text-white">
        <h1 class="fw-bold title text-uppercase text-center mb-4">{{ $produk_dan_layanan->judul }}</h1>
        <div class="fs-5 lh-sm">{!! $produk_dan_layanan->deskripsi !!}</div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    @foreach($subproduk_dan_layanans as $subproduk_dan_layanan)
      <div class="row my-5">
        <div class="col-md-5 rounded-end-5" style="background: url({{ asset('compro/subproduk-dan-layanan/thumbnail/'.$subproduk_dan_layanan["thumbnail"]) }}); background-size: cover; background-repeat: no-repeat; background-position: center; min-height: 200px;"></div>
        <div class="col-md-7 mt-2 ps-2 ps-md-5">
          <h1 class="fw-bold" style="color: #920000;">{{ $subproduk_dan_layanan->judul }}</h1>
          <div class="mt-2 mt-md-4 lh-sm fs-5" style="text-align: justify;">{!! $subproduk_dan_layanan->deskripsi !!}</div>
        </div>
      </div>
    @endforeach
  </div>
</section>
@endsection