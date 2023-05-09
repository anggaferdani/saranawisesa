<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saranawisesa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('eproc/home.css') }}">
  </head>
  <body>

    @include('templates.eproc.header')

    <img class="circle-1" src="{{ asset('eproc/img/circle-biru.png') }}" alt="">
    <img class="circle-2" src="{{ asset('eproc/img/circle-putih.png') }}" alt="">
    <img class="circle-icon" src="{{ asset('eproc/img/icon.png') }}" alt="">
    <img class="circle-3" src="{{ asset('eproc/img/circle-ungu.png') }}" alt="">
    <img class="circle-4" src="{{ asset('eproc/img/circle-putih-ungu.png') }}" alt="">
    <img class="circle-5" src="{{ asset('eproc/img/circle-cream.png') }}" alt="">
    <img class="car-icon" src="{{ asset('eproc/img/car-icon.png') }}" alt="">

    <div class="container" id="header">
        <div class="row">
            <div class="col-md-6">
                <h1 class="fw-light fs-3"><span class="fw-bold">SARANAWISESA</span> adalah Tempat Pengadaan
                    Barang dan Jasa <span class="fw-bold">No.1 di INDONESIA</span>
                </h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi dolorem repellat in harum eligendi voluptatem?</p>
                <div class="button">
                    <a class="btn btn-primary btn-left" href="{{ route('profile-perusahaan') }}" role="button">Pofile Perusahaan</a>
                    <a class="btn btn-right" href="{{ route('eproc.pengadaan') }}" role="button">Riwayat Pengadaan</a>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>

    <div class="container" id="kedua">
        <center>
            <h1 class="text-center">Perusahaan Pengadaan</h1>
        <hr style="width: 25%;">
        </center>
        <div class="row text-center" id="info">
            <div class="col-md-2">
                <h1 style="color: #8502AD;">128+</h1>
                <p class="mb-1">Pengadaan</p>
                <p class="fw-bold">Barang</p>
            </div>
            <div class="col-md-2">
                <h1 style="color: #0458B8;">69</h1>
                <p class="mb-1">Pengadaan </p>
                <p class="fw-bold">Jasa Konsultasi</p> 
            </div>
            <div class="col-md-2">
                <h1  style="color: #558225;">20+</h1>
                <p class="mb-1">Pengadaan </p>
                <p class="fw-bold">Pekerja Komunikasi</p> 
            </div>
            <div class="col-md-2">
                <h1 style="color:#F9B305">75+</h1>
                <p class="mb-1">Pengadaan </p>
                <p class="fw-bold">Terintegrasi</p> 
            </div>
        </div>
    </div>

    <div class="container" id="ketiga">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('eproc/img/gambar3.png') }}" alt="">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <div class="title">
                    <p>Tentang</p>
                    <hr class="bg-dark border-2 border-bottom border-dark">
                </div>
                <h3><span class="fw-bold">SARANAWISESA</span> PENGADAAN</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique, repudiandae quia minus officiis temporibus ducimus quam itaque, accusamus voluptatem expedita officia odit! Odio, obcaecati a.</p>
                <a href="{{ route('eproc.pengadaan') }}">Selengkapnya</a>
            </div>
        </div>
    </div>

    <div class="container mb-5" id="keempat">
        <center>
            <h2>CARA UNTUK <span>PENGADAAN BARANG</span></h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda sit sapiente rem reprehenderit quia consequuntur? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim dolore nulla deserunt.</p>
        </center>
        <div class="row" id="card">
           <div class="col-md-9">
            <div class="row" id="card-2">
                <div class="col-md-3">Menganalisis kebutuhan
                    perusahaan</div>
                <div class="col-md-3">Mendapatkan persetujuan
                    dari pihak manajemen</div>
                <div class="col-md-3">Melakukan
                    tender</div>
                <div class="col-md-3">Menganalisis supplier atau
                    vendor yang sesuai
                    dengan kriteria</div>
                <div class="col-md-3">Meminta penawaran
                    (quotation)</div>
                <div class="col-md-3">Melakukan negosiasi
                    dengan supplier
                    atau vendor</div>
                <div class="col-md-3">Membuat kontrak
                    atau purchase order</div>
                <div class="col-md-3">Proses penerimaan
                    barang/jasa dan
                    pemeriksaan kualitas
                    barang/jasa</div>
                <div class="col-md-3">Pembayaran pengadaan
                    barang/jasa</div>
            </div>
           </div>
        </div>
    </div>

    @include('templates.eproc.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>