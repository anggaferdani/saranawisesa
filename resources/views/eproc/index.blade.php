@extends('templates.eproc.pages')
@section('title', 'SARANAWISESA PROPERINDO')
@section('content')
<section class="" style="height: 85vh;">
  <div class="container h-100">
    <div class="row py-4 h-100 align-items-center justify-content-center">
      <div class="col-md-6 order-2 order-md-1">
        <h2 class="fw-normal lh-sm">Sistem Pengadaan Berbasis Digital Milik <span class="fw-bold">Saranawisesa</span></h2>
        <p class="lh-sm mt-2 fs-5">Mendekonstruksi Proses Pengadaan dengan Teknologi Terkini. Menghadirkan Efisiensi, Transparansi, dan Kepuasan  Pelayanan Berkualitas Tinggi</p>
        <div class="mt-4">
          <a href="{{ route('profile-perusahaan') }}" class="btn text-white" style="background-color: #830000;">Profile Perusahaan</a>
          @if(Session::has('eproc') && auth()->user()->level == 'perusahaan')
            <a href="{{ route('eproc.perusahaan.dashboard') }}" class="btn" style="color: #830000; border: 1px #830000 solid;">Riwayat Pengadaan</a>
          @else
            <a href="{{ route('eproc.pengadaan') }}" class="btn" style="color: #830000; border: 1px #830000 solid;">Riwayat Pengadaan</a>
          @endif
        </div>
      </div>
      <div class="col-md-6 order-1 order-md-2">
        <img src="{{ asset('eproc/img/banner.png') }}" class="banner img-fluid" alt="">
      </div>
      <img src="{{ asset('eproc/img/banner2.png') }}" class="banner2" alt="">
      <img src="{{ asset('eproc/img/banner3.png') }}" class="banner3" alt="">
      <img src="{{ asset('eproc/img/banner4.png') }}" class="banner4" alt="">
    </div>
  </div>
</section>

<section>
  <div class="container py-5">
    <h2 class="fw-light text-center">Perusahaan <span class="fw-bold" style="color: #830000;">Pengadaan</span></h2>
    <div class="row mt-5 px-5 px-md-0 g-5 g-md-0 justify-content-center">
      <div class="col-md-2 col-6 text-center">
        <h1 class="m-0 fw-bold" style="color: #830000;">128+</h1>
        <p class="m-0 fs-5">pengadaan</p>
        <p class="m-0 fw-bold">barang</p>
      </div>
      <div class="col-md-2 col-6 text-center">
        <h1 class="m-0 fw-bold" style="color: #830000;">69+</h1>
        <p class="m-0 fs-5">pengadaan</p>
        <p class="m-0 fw-bold">Jasa Konsultasi</p>
      </div>
      <div class="col-md-2 col-6 text-center">
        <h1 class="m-0 fw-bold" style="color: #830000;">20+</h1>
        <p class="m-0 fs-5">pengadaan</p>
        <p class="m-0 fw-bold">Pekerja Komunikasi</p>
      </div>
      <div class="col-md-2 col-6 text-center">
        <h1 class="m-0 fw-bold" style="color: #830000;">75+</h1>
        <p class="m-0 fs-5">pengadaan</p>
        <p class="m-0 fw-bold">Terintegrasi</p>
      </div>
    </div>
  </div>
</section>

<section class="" style="background: #F5F6F8;">
  <div class="container py-5">
    <div class="row py-5">
      <div class="col-md-6">
        <div class="row mx-1 mx-md-0 gx-3">
          <div class="col" style="background: url({{ asset('eproc/img/index.png') }}); background-repeat: no-repeat; background-size: cover;"></div>
          <div class="col">
            <div style="background: url({{ asset('eproc/img/index2.png') }}); background-repeat: no-repeat; height: 180px;"></div>
            <div class="mt-2" style="background: url({{ asset('eproc/img/index3.png') }}); background-repeat: no-repeat; height: 180px;"></div>
          </div>
        </div>
      </div>
      <div class="col-md-6 pt-4">
        <p class="m-0 fs-5">Tentang</p>
        <h2 class="fw-light"><span class="fw-bold" style="color: #830000;">SARANAWISESA</span> PENGADAAN</h2>
        <p class="fw-light p-0 lh-sm fs-5">Sistem Pengadaan Berbasis Digital Saranawisesa adalah solusi inovatif untuk e-procurement. Memungkinkan organisasi mengotomatisasi, mengoptimalkan, dan menyederhanakan seluruh proses pengadaan barang dan jasa secara elektronik. Dengan antarmuka intuitif dan teknologi canggih, Saranawisesa membantu perusahaan dan instansi pemerintah mengelola tawaran, vendor, negosiasi, dan kontrak dengan efisiensi dan transparansi tinggi.</p>
        <a href="{{ route('eproc.berita-tentang-pengadaan') }}" class="text-decoration-none fs-5" style="color: #830000;">selengkapnya</a>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container py-5">
    <div class="row">
      <div class="col-12 col-md-8 m-auto">
        <h2 class="fw-light text-center">CARA UNTUK <span class="fw-bold" style="color: #830000;">PENGADAAN BARANG</span></h2>
        <p class="text-center fs-5 lh-sm">Pengadaan barang adalah proses yang penting dalam bisnis dan organisasi untuk memenuhi kebutuhan akan produk, peralatan, atau layanan yang diperlukan. Berikut adalah beberapa langkah umum dalam proses pengadaan :</p>
      </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 w-100 mt-4 px-0 px-md-5 g-3 mx-auto">
      <div class="col">
        <div class="text-center h-100 p-4" style="background-color: #DFE4ED">Menganalisis kebutuhan perusahaan</div>
      </div>
      <div class="col">
        <div class="text-center h-100 p-4" style="background-color: #DFE4ED">Mendapatkan persetujuan dari pihak manajemen</div>
      </div>
      <div class="col">
        <div class="text-center h-100 p-4" style="background-color: #DFE4ED">Melakukan tender</div>
      </div>
      <div class="col">
        <div class="text-center h-100 p-4" style="background-color: #DFE4ED">Menganalisis supplier atau vendor yang sesuai dengan kriteria</div>
      </div>
      <div class="col">
        <div class="text-center h-100 p-4" style="background-color: #DFE4ED">Meminta penawaran <br>(quotation)</div>
      </div>
      <div class="col">
        <div class="text-center h-100 p-4" style="background-color: #DFE4ED">Melakukan negosiasi dengan supplier atau vendor</div>
      </div>
      <div class="col">
        <div class="text-center h-100 p-4" style="background-color: #DFE4ED">Membuat kontrak atau purchase order</div>
      </div>
      <div class="col">
        <div class="text-center h-100 p-4" style="background-color: #DFE4ED">Proses penerimaan barang/jasa dan pemeriksaan kualitas barang/jasa</div>
      </div>
      <div class="col">
        <div class="text-center h-100 p-4" style="background-color: #DFE4ED">Pembayaran pengadaan barang/jasa</div>
      </div>
    </div>
  </div>
</section>
@endsection