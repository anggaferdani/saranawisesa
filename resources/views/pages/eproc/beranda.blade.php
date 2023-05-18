<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saranawisesa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('eproc/beranda.css') }}">
  </head>
  <body style="max-width: 100%; overflow-x: hidden; position: relative;">

    @include('templates.eproc.header')
    
    <div class="parent" style="background-color: #F5F6F8;">
        <img class="circle-1" src="{{ asset('eproc/img/circle-merah.png') }}" alt="">
        <img class="circle-2" src="{{ asset('eproc/img/circle-putih.png') }}" alt="">
        <img class="circle-icon" src="{{ asset('eproc/img/icon.png') }}" alt="">
        <img class="circle-3" src="{{ asset('eproc/img/circle-cream-kecil.png') }}" alt="">
        <img class="circle-4" src="{{ asset('eproc/img/circle-putih-cream.png') }}" alt="">
        <img class="circle-5" src="{{ asset('eproc/img/circle-cream.png') }}" alt="">
        <img class="car-icon" src="{{ asset('eproc/img/car-icon.png') }}" alt="">
        <div class="container" id="header">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="fw-light fs-3 text-black"><span class="fw-bold">SARANAWISESA</span> adalah Tempat Pengadaan
                        Barang dan Jasa <span class="fw-bold">No.1 di INDONESIA</span>
                    </h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi dolorem repellat in harum eligendi voluptatem?</p>
                    <div class="button">
                        <a class="btn btn-left" href="{{ route('profile-perusahaan') }}" style="background-color: #830000; color: white" role="button">Pofile Perusahaan</a>
                        <a class="btn btn-right" href="{{ route('eproc.pengadaan') }}" style="color: #830000; background: none; border: 1px solid #830000;" role="button">Riwayat Pengadaan</a>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>

    <div class="container mt-4" id="kedua">
        <center>
            <h2 class="text-center fw-light">Perusahaan <span class="fw-bold" style="color: #830000;">Pengadaan</span></h2>
            <hr class="mt-3" style="width: 25%;">
        </center>
        <div class="row text-center mt-4" id="info">
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

    <div style="background-color: #F5F6F8;">
        <div class="container mt-5 py-2 py-md-5 py-lg-5">
            <div class="row gap-3 gap-md-5 gap-lg-5 py-2">
                <div class="col-md-6">
                    <img src="{{ asset('eproc/img/gambar3.png') }}" class="img-fluid" alt="">
                </div>
                <div class="col-md-5">
                    <div class="title">
                        <p>Tentang</p>
                    </div>
                    <h3 class="fw-light"><span class="fw-bold" style="color: #830000;">SARANAWISESA</span> PENGADAAN</h3>
                    <p class="mb-2 mb-md-5 mb-lg-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique, repudiandae quia minus officiis temporibus ducimus quam itaque, accusamus voluptatem expedita officia odit! Odio, obcaecati a.</p>
                    <a href="{{ route('eproc.pengadaan') }}" style="color: #830000; text-decoration: none;">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-2 mb-md-5 mb-lg-5" id="keempat">
        <div class="row justify-content-center mb-4">
            <div class="col-md-8 text-center">
                <h2 class="fw-light">CARA UNTUK <span class="fw-bold" style="color: #830000;">PENGADAAN BARANG</span></h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda sit sapiente rem reprehenderit quia consequuntur? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim dolore nulla deserunt.</p>
            </div>
        </div>
        <div class="row" id="card">
           <div class="col-md-9">
            <div class="row px-2 px-md-0 px-lg-0" id="card-2">
                <div class="col-md-3" style="background-color: #DFE4ED;">Menganalisis kebutuhan
                    perusahaan</div>
                <div class="col-md-3" style="background-color: #DFE4ED;">Mendapatkan persetujuan
                    dari pihak manajemen</div>
                <div class="col-md-3" style="background-color: #DFE4ED;">Melakukan
                    tender</div>
                <div class="col-md-3" style="background-color: #DFE4ED;">Menganalisis supplier atau
                    vendor yang sesuai
                    dengan kriteria</div>
                <div class="col-md-3" style="background-color: #DFE4ED;">Meminta penawaran
                    (quotation)</div>
                <div class="col-md-3" style="background-color: #DFE4ED;">Melakukan negosiasi
                    dengan supplier
                    atau vendor</div>
                <div class="col-md-3" style="background-color: #DFE4ED;">Membuat kontrak
                    atau purchase order</div>
                <div class="col-md-3" style="background-color: #DFE4ED;">Proses penerimaan
                    barang/jasa dan
                    pemeriksaan kualitas
                    barang/jasa</div>
                <div class="col-md-3" style="background-color: #DFE4ED;">Pembayaran pengadaan
                    barang/jasa</div>
            </div>
           </div>
        </div>
    </div>

    @include('templates.eproc.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>