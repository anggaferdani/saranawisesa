@extends('templates.compro.pages')
@section('title', 'Index')
@section('content')
<section class="py-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('img/sarana-parking.png') }}); background-size: cover; background-repeat: no-repeat; background-position: center;">
  <div class="container py-5 h-100">
    <div class="row py-5 justify-content-center text-center align-items-center h-100">
      <div class="col text-white"><h1>PRODUCT & SERVICES</h1></div>
    </div>
  </div>
</section>

<section class="pb-md-5">
  <div class="container py-5">
    <div class="row row-cols-1 row-cols-md-3 g-2 g-md-3 mt-2">
      @foreach($produk_dan_layanans as $produk_dan_layanan)
        <div class="col">
          <a href="{{ route('produk-dan-layanan', Crypt::encrypt($produk_dan_layanan->id)) }}" class="text-decoration-none">
            <div class="card h-100 rounded-4 border-light-subtle">
              <div class="row">
                <div class="col">
                  <div class="rounded-start-4" style="height: 175px; background-image: url({{ asset('compro/produk-dan-layanan/thumbnail/'.$produk_dan_layanan["thumbnail"]) }}); background-position: center; background-size: cover;"></div>
                </div>
                <div class="col">
                  <div class="card-body h-100 ps-0" style="height: 175px; display: flex; justify-content: space-between; flex-direction: column;">
                    <h4 class="card-title fw-bold text-uppercase" style="color: #920000;">{{ $produk_dan_layanan->judul }}</h4>
                    <p class="card-text fs-5 lh-sm">{!! Str::limit($produk_dan_layanan->deskripsi, 40) !!}</p>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endsection