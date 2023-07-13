@extends('templates.compro.pages')
@section('title', 'Artikel')
@section('content')
<section class="py-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('compro/banner/'.$banner[2]["thumbnail"]) }}); background-size: cover; background-repeat: no-repeat; background-position: center;">
  <div class="container py-5 h-100">
    <div class="row py-5 justify-content-center text-center align-items-center h-100">
      <div class="col text-white"><h1>ARTIKEL</h1></div>
    </div>
  </div>
</section>

<section>
  <div class="container py-5">
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-2 mt-4">
      @foreach ($artikels as $artikel)
      <div class="col">
        <div class="card h-100 rounded-4">
          <div class="rounded-top-4" style="height: 200px; background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url({{ asset('artikel/'.$artikel["thumbnail"]) }}); background-position: center; background-size: cover;">
          </div>
          <div class="card-body" style="display: flex; justify-content: space-between; flex-direction: column;">
            <div>
              <h5 class="card-title fw-bold" style="color: #920000;">{{ Str::limit($artikel->judul_artikel, 15) }}</h5>
              <p class="card-text fw-semibold small lh-sm">{!! Str::limit($artikel->isi_artikel, 80) !!}</p>
            </div>
            <a href="{{ route('artikel', Crypt::encrypt($artikel->id)) }}" class="d-flex justify-content-end align-items-center text-decoration-none text-dark fw-semibold small lh-sm stretched-link mt-4">Read More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<div class="section py-5">
  <div class="container d-flex justify-content-center">
    {{ $artikels->links('pagination::bootstrap-4') }}
  </div>
</div>
@endsection