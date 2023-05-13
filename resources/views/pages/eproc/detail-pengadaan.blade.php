<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saranawisesa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('eproc/detail.css') }}">
  </head>
  <body>

    @include('templates.eproc.header')

    <br><br><br>

    <div class="container mt-5 mb-5">
        @if(Session::get('success'))
            <div class="alert alert-primary">{{ Session::get('success') }}</div>
        @endif
        <h1 class="fs-4 fw-light">DETAIL <span class="fw-bold" style="color: #0458B8;">PENGADAAN</span></h1>
        <div class="row d-flex gap-0 gap-md-3">
            <div class="col-md-3 mt-2 left__content text-white d-flex align-items-center">
                Kode Tender
            </div>
            <div class="col-md-8 mt-2 right__content d-flex align-items-center">
                <p class="mb-0">{{ $lelang->kode_lelang }}</p>
            </div>

            <div class="col-md-3 mt-2 left__content text-white d-flex align-items-center">
                Nama Tender
            </div>
            <div class="col-md-8 mt-2 right__content d-flex align-items-center">
                <p class="mb-0">{{ $lelang->nama_lelang }}</p>
            </div>
            <div class="col-md-3 mt-2 left__content text-white d-flex align-items-center">
                Uraian Singkat Pekerjaan
            </div>
            <div class="col-md-8 mt-2 right__content d-flex align-items-center">
                <p class="mb-0">{{ $lelang->uraian_singkat_pekerjaan }}</p>
            </div>
            <div class="col-md-3 mt-2 left__content text-white d-flex align-items-center">
                Tanggal Mulai Lelang
            </div>
            <div class="col-md-8 mt-2 right__content d-flex align-items-center">
                <p class="mb-0">{{ $lelang->tanggal_mulai_lelang }}</p>
            </div>
            <div class="col-md-3 mt-2 left__content text-white d-flex align-items-center">
                Tanggal Akhir Lelang
            </div>
            <div class="col-md-8 mt-2 right__content d-flex align-items-center">
                <p class="mb-0">{{ $lelang->tanggal_akhir_lelang }}</p>
            </div>
            <div class="col-md-3 mt-2 left__content text-white d-flex align-items-center">
                Jenis Kontrak
            </div>
            <div class="col-md-8 mt-2 right__content d-flex align-items-center">
                <p class="mb-0">{{ $lelang->jenis_kontrak }}</p>
            </div>
            <div class="col-md-3 mt-2 left__content text-white d-flex align-items-center">
                Lokasi Pekerjaan
            </div>
            <div class="col-md-8 mt-2 right__content d-flex align-items-center">
                <p class="mb-0">{{ $lelang->lokasi_pekerjaan }}</p>
            </div>
            <div class="col-md-3 mt-2 left__content text-white d-flex align-items-center">
                HPS
            </div>
            <div class="col-md-8 mt-2 right__content d-flex align-items-center">
                <p class="mb-0">{{ 'Rp. '.strrev(implode('.', str_split(strrev(strval($lelang->hps)), 3))) }}</p>
            </div>
            <div class="col-md-3 mt-2 left__content text-white d-flex align-items-center">
                Syarat Kualifikasi
            </div>
            <div class="col-md-8 mt-2 right__content d-flex align-items-center">
                <p class="mb-0">{!! $lelang->syarat_kualifikasi !!}</p>
            </div>
            <div class="">
                <label for="penawaran_dan_konsep" class="form-label">Jadwal Lelang</label>
            <div style="overflow-x: auto;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                          <th scope="col" style="white-space: nowrap;">#</th>
                          <th scope="col" style="white-space: nowrap;">Nama Agenda</th>
                          <th scope="col" style="white-space: nowrap;">Tanggal Mulai Agenda</th>
                          <th scope="col" style="white-space: nowrap;">Tanggal Mulai Agenda</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $id = 0; ?>
                        @forelse ($lelang->jadwal_lelangs as $jadwal_lelang)
                            <?php $id++; ?>
                            @if($jadwal_lelang->status_aktif == 'aktif')
                                <tr>
                                    <td>{{ $id }}</td>
                                    <td>{{ $jadwal_lelang->nama_lelang }}</td>
                                    <td>@twitter</td>
                                    <td>@twitter</td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="4" style="text-align: center; padding-block: 2rem;">Belum ada jadwal yang ditentukan</td>
                                </tr>
                            @endif
                        @empty
                        <tr>
                            <td colspan="4" style="text-align: center; padding-block: 2rem;">Belum ada jadwal yang ditentukan</td>
                        </tr>
                        @endforelse
                      </tbody>
                </table>
            </div>
            </div>
            @if(!Auth::guest())
                @if(empty($perusahaan->lelang_id))
                    <a href="{{ route('eproc.ikut-pengadaan', $perusahaan->id) }}" class="btn btn-icon btn-primary">Ikut Pengadaan</a>
                @else
                    <form method="POST" action="{{ route('eproc.kirim-lampiran') }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
                        @csrf
                        <input id="lelang_id" type="hidden" class="form-control" name="lelang_id" value="{{ $lelang->id }}">
                        <input id="perusahaan_id" type="hidden" class="form-control" name="perusahaan_id" value="{{ $perusahaan->id }}">
                        @if($lelang->lampiran_pengadaan == 'penawaran')
                            <div class="mb-3">
                                <label for="penawaran" class="form-label">Penawaran</label>
                                <input id="penawaran" type="file" class="form-control" name="penawaran">
                                @error('penawaran')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        @endif
                        @if($lelang->lampiran_pengadaan == 'konsep')
                            <div class="mb-3">
                                <label for="konsep" class="form-label">Konsep</label>
                                <input id="konsep" type="file" class="form-control" name="konsep">
                                @error('konsep')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        @endif
                        @if($lelang->lampiran_pengadaan == 'penawaran_dan_konsep')
                            <div class="mb-3">
                                <label for="penawaran_dan_konsep" class="form-label">Penawaran Dan Konsep</label>
                                <input id="penawaran_dan_konsep" type="file" class="form-control" name="penawaran_dan_konsep">
                                @error('penawaran_dan_konsep')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                @endif
            @endif
        </div>
    </div>

    @include('templates.eproc.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>