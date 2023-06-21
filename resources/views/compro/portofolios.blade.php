@extends('templates.compro.pages')
@section('title', 'Portofolio')
@section('content')
<section class="py-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('compro/img/portofolio.png') }}); background-size: cover; background-repeat: no-repeat; background-position: center;">
  <div class="container py-5 h-100">
    <div class="row py-5 justify-content-center text-center align-items-center h-100">
      <div class="col text-white"><h1>PORTOFOLIO</h1></div>
    </div>
  </div>
</section>

<section>
  <div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3 g-2 mt-2">
      @foreach ($portofolios as $portofolio)
      <div class="col">
        <div class="card h-100 rounded-4 shadow-sm">
          <div class="rounded-top-4" style="height: 200px; background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url({{ asset('portofolio/'.$portofolio["portofolio"]) }}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
          <div class="card-body">
            <h5 class="card-title mt-2">{{ Str::limit($portofolio->judul_portofolio, 25) }}</h5>
            <p class="card-text small lh-sm">{!! Str::limit($portofolio->isi_portofolio, 80) !!}</p>
            <a href="{{ route('portofolio', Crypt::encrypt($portofolio->id)) }}" class="d-flex small align-items-center text-dark text-decoration-none">
              Read More<i class="bi bi-arrow-right stretched-link"></i>
            </a>
          </div>
        </div>
      </div>
      @endforeach      
    </div>
  </div>
</section>

<div class="section py-5">
  <div class="container d-flex justify-content-center">
    {{ $portofolios->links('pagination::bootstrap-4') }}
  </div>
</div>
@endsection