<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saranawisesa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('eproc/pengadaan.css') }}">
  </head>
  <body>

    @include('templates.eproc.header')

    <div class="header">
      <img src="img/pengadaan.png" alt="">
      <h1 class="text-white">PENGADAAN</h1>
      <h2>TERBARU</h2>
    </div>

    <div class="container mt-5">
      <P>TENDER</P>
      @if (count($jenisPengadaansGroupByLelang))
        @forelse ($jenisPengadaansGroupByLelang as $jenisPengadaan)
        <a class="btn w-100 text-white" style="background-color: #0458B8;" href="#" role="button">{{ $jenisPengadaan->jenis_pengadaan }}</a>
        <div class="row">
            <div class="col-md-12">
                <table class="table mt-2">
                    <thead>
                      <tr class="text-white" style="background-color: #0458B8;">
                        <th scope="col">Kode</th>
                        <th scope="col">Tanggal Berakhir</th>
                        <th scope="col">Nama Paket</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($jenisPengadaan->lelangs as $lelang)
                      <tr>
                        <td>{{ $lelang->kode_lelang }}</td>
                        <td>{{ $lelang->tanggal_akhir_lelang }}</td>
                        <td><a href="{{ route('eproc.detail-pengadaan', $lelang->id) }}">{{ $lelang->nama_lelang }}</a></td>
                        <td>Approved</td>
                      </tr>
                      @empty
                      {{--  --}}
                      @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @empty
        {{--  --}}
        @endforelse
      @else
      <div style="text-align: center;">Records not found</div>
      @endif

      <P>NON TENDER</P>
      @if (count($jenisPengadaansGroupByLangsung))
        @forelse ($jenisPengadaansGroupByLangsung as $jenisPengadaan)
        <a class="btn w-100 text-white" style="background-color: #920000;" href="#" role="button">{{ $jenisPengadaan->jenis_pengadaan }}</a>
        <div class="row">
            <div class="col-md-12">
                <table class="table mt-2">
                    <thead>
                      <tr class="text-white" style="background-color: #920000;">
                        <th scope="col">Kode</th>
                        <th scope="col">Tanggal Berakhir</th>
                        <th scope="col">Nama Paket</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($jenisPengadaan->lelangs as $lelang)
                      <tr>
                        <td>{{ $lelang->kode_lelang }}</td>
                        <td>{{ $lelang->tanggal_akhir_lelang }}</td>
                        <td><a href="{{ route('eproc.detail-pengadaan', $lelang->id) }}">{{ $lelang->nama_lelang }}</a></td>
                        <td>Approved</td>
                      </tr>
                      @empty
                      {{--  --}}
                      @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @empty
        {{--  --}}
        @endforelse
      @else
      <div style="text-align: center;">Records not found</div>
      @endif

        {{-- <P>TENDER</P>
        @if($lelang)
          @foreach($jenis_pengadaan as $jenis_pengadaans)
          <a class="btn w-100 text-white" style="background-color: #0458B8;" href="#" role="button">{{ $jenis_pengadaans->jenis_pengadaan }}</a>
          <div class="row">
              <div class="col-md-12">
                  <table class="table mt-2">
                      <thead>
                        <tr class="text-white" style="background-color: #0458B8;">
                          <th scope="col">Kode</th>
                          <th scope="col">Tanggal Berakhir</th>
                          <th scope="col">Nama Paket</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($jenis_pengadaans->lelangs as $lelangs)
                          @if($lelangs->status_pengadaan == 'lelang')
                          <tr>
                            <td>{{ $lelangs->kode_lelang }}</td>
                            <td>{{ $lelangs->tanggal_akhir_lelang }}</td>
                            <td><a href="{{ route('eproc.detail-pengadaan', $lelangs->id) }}">{{ $lelangs->nama_lelang }}</a></td>
                            <td>Approved</td>
                          </tr>
                          @endif
                        @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
          @endforeach
        @endif
        
        <P>NON TENDER</P>
        @if($penunjukan_langsung)
          @foreach($jenis_pengadaan as $jenis_pengadaans)
          <a class="btn w-100 text-white" style="background-color: #920000;" href="#" role="button">{{ $jenis_pengadaans->jenis_pengadaan }}</a>
          <div class="row">
              <div class="col-md-12">
                  <table class="table mt-2">
                      <thead>
                        <tr class="text-white" style="background-color: #920000;">
                          <th scope="col">Kode</th>
                          <th scope="col">Tanggal Berakhir</th>
                          <th scope="col">Nama Paket</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($jenis_pengadaans->lelangs as $lelangs)
                          @if($lelangs->status_pengadaan == 'penunjukan_langsung')
                          <tr>
                            <td>{{ $lelangs->kode_lelang }}</td>
                            <td>{{ $lelangs->tanggal_akhir_lelang }}</td>
                            <td><a href="{{ route('eproc.detail-pengadaan', $lelangs->id) }}">{{ $lelangs->nama_lelang }}</a></td>
                            <td>Approved</td>
                          </tr>
                          @endif
                        @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
          @endforeach
        @endif --}}
    </div>

    @include('templates.eproc.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>