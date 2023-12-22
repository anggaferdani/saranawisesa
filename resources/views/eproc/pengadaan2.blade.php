@extends('templates.eproc.pages')
@section('title', 'SARANAWISESA PROPERINDO')
@section('content')
<section>
  <div class="container py-5">
    <h2 class="fw-light">DETAIL <span class="fw-bold" style="color: #930000;">PENGADAAN</span></h2>
    @if(Session::get('success'))
      <div class="alert alert-primary">{{ Session::get('success') }}</div>
    @endif
    <div class="row g-2">
      <div class="col-md-4"><div class="p-2 text-white" style="background-color: #0458B8">Kode Pengadaan</div></div>
      <div class="col-md-8"><div class="p-2" style="background-color: #F5F6F8">{{ $lelang->kode_lelang }}</div></div>
      <div class="col-md-4"><div class="p-2 text-white" style="background-color: #0458B8">Jenis Pengadaan</div></div>
      <div class="col-md-8"><div class="p-2" style="background-color: #F5F6F8">{{ $lelang->jenis_pengadaans->jenis_pengadaan }}</div></div>
      <div class="col-md-4"><div class="p-2 text-white" style="background-color: #0458B8">Nama Pengadaan</div></div>
      <div class="col-md-8"><div class="p-2" style="background-color: #F5F6F8">{{ $lelang->nama_lelang }}</div></div>
      @if($lelang->status_pengadaan == 'penunjukan langsung')
      <div class="col-md-4"><div class="p-2 text-white" style="background-color: #0458B8">Nama Perusahaan</div></div>
      <div class="col-md-8"><div class="p-2" style="background-color: #F5F6F8">{{ $user->nama_panjang }}</div></div>
      @endif
      <div class="col-md-4"><div class="p-2 text-white" style="background-color: #0458B8">Uraian Singkat Pekerjaan</div></div>
      <div class="col-md-8"><div class="p-2" style="background-color: #F5F6F8">{{ $lelang->uraian_singkat_pekerjaan }}</div></div>
      <div class="col-md-4"><div class="p-2 text-white" style="background-color: #0458B8">Tanggal Mulai Pengadaan</div></div>
      <div class="col-md-8"><div class="p-2" style="background-color: #F5F6F8">{{ $lelang->tanggal_mulai_lelang }}</div></div>
      <div class="col-md-4"><div class="p-2 text-white" style="background-color: #0458B8">Tanggal Akhir Pengadaan</div></div>
      <div class="col-md-8"><div class="p-2" style="background-color: #F5F6F8">{{ $lelang->tanggal_akhir_lelang }}</div></div>
      <div class="col-md-4"><div class="p-2 text-white" style="background-color: #0458B8">Jenis Kontrak</div></div>
      <div class="col-md-8"><div class="p-2" style="background-color: #F5F6F8">{{ $lelang->jenis_kontrak }}</div></div>
      <div class="col-md-4"><div class="p-2 text-white" style="background-color: #0458B8">Lokasi Pekerjaan</div></div>
      <div class="col-md-8"><div class="p-2" style="background-color: #F5F6F8">{{ $lelang->lokasi_pekerjaan }}</div></div>
      <div class="col-md-4"><div class="p-2 text-white" style="background-color: #0458B8">HPS</div></div>
      <div class="col-md-8"><div class="p-2" style="background-color: #F5F6F8">{{ 'Rp. '.strrev(implode('.', str_split(strrev(strval($lelang->hps)), 3))) }}</div></div>
      <div class="col-md-4"><div class="p-2 text-white" style="background-color: #0458B8">Syarat Kualifikasi</div></div>
      <div class="col-md-8"><div class="p-2" style="background-color: #F5F6F8">{!! $lelang->syarat_kualifikasi !!}</div></div>
    </div>
    <div class="row mt-4">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <td class="text-center text-white" style="background-color: #0458B8; width: 25%;">No.</td>
              <td class="text-center text-white" style="background-color: #0458B8; width: 25%;">Nama Kegiatan</td>
              <td class="text-center text-white" style="background-color: #0458B8; width: 25%;">Tanggal Mulai Kegiatan</td>
              <td class="text-center text-white" style="background-color: #0458B8; width: 25%;">Tanggal Akhir Kegiatan</td>
            </tr>
          </thead>
          <tbody>
            <?php $id = 0; ?>
            @forelse($lelang->jadwal_lelangs as $jadwal_lelang)
              <?php $id++; ?>
              <tr>
                <td class="text-center">{{ $id }}</td>
                <td class="text-center">{{ $jadwal_lelang->nama_kegiatan_lelang }}</td>
                <td class="text-center">{{ $jadwal_lelang->tanggal_mulai_kegiatan_lelang }}</td>
                <td class="text-center">{{ $jadwal_lelang->tanggal_akhir_kegiatan_lelang }}</td>
              </tr>
            @empty
            <tr>
              <td class="text-center" colspan="4">BELUM ADA JADWAL KEGIATAN</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
    <div class="row mt-4">
      @if(!Auth::guest())
        @if(auth()->user()->status_verifikasi2 == 'terverifikasi')
          @if($lelang->status_pengadaan == 'lelang')
            @if(!$ikuti_lelang)
              <a href="{{ route('eproc.ikuti-pengadaan', Crypt::encrypt($lelang->id)) }}" class="btn btn-primary" style="background-color: #0458B8;">IKUTI PENGADAAN</a>
            @else
              @if(!$lampiran)
                <div class="alert alert-primary">Maaf, sehubungan dengan pengajuan lelang, kami ingin mengingatkan bahwa lampiran yang diperlukan belum lengkap. Mohon untuk segera melengkapi lampiran lelang agar proses dapat berlanjut dengan lancar. Terima kasih atas perhatiannya.</div>
                <form action="{{ route('eproc.post-lampiran') }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate="" id="lampiran">
                  @csrf
                  <input type="hidden" class="form-control" name="lelang_id" value="{{ $lelang->id }}">
                  <input type="hidden" class="form-control" name="user_id" value="{{ Auth::id() }}">
                  @if($lelang->lampiran_pengadaan == 'penawaran')
                    <div class="mb-3">
                      <label class="form-label">Penawaran <span class="text-danger">*</span></label>
                      <input type="file" class="form-control" name="penawaran">
                      @error('penawaran')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                  @endif
                  @if($lelang->lampiran_pengadaan == 'konsep')
                    <div class="mb-3">
                      <label class="form-label">Konsep <span class="text-danger">*</span></label>
                      <input type="file" class="form-control" name="konsep">
                      @error('konsep')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                  @endif
                  @if($lelang->lampiran_pengadaan == 'penawaran dan konsep')
                    <div class="mb-3">
                      <label class="form-label">Penawaran Dan Konsep <span class="text-danger">*</span></label>
                      <input type="file" class="form-control" name="penawaran_dan_konsep">
                      @error('penawaran_dan_konsep')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                  @endif
                  <button type="submit" class="btn btn-primary" style="background-color: #0458B8;">Submit</button>
                </form>
              @else
                @if($lelang->user_id == auth()->user()->id)
                  <div class="alert alert-primary">Dengan senang hati kami umumkan bahwa setelah proses penilaian yang cermat, anda telah ditunjuk sebagai pemenang dalam lelang kami.</div>
                @else
                  <div class="alert alert-primary">Pengajuan Anda telah berhasil dikirim. Anda dapat mengakses dan melacak status pengajuan Anda pada dashboard pribadi Anda. Dalam dashboard ini, Anda dapat dengan mudah melihat semua detail pengajuan Anda, termasuk tanggal pengiriman, status saat ini, dan catatan terkait. <a href="{{ route('eproc.perusahaan.pengadaan.show', Crypt::encrypt($lelang->id)) }}">CEK PENGADAAN</a></div>
                @endif
              @endif
            @endif
          @endif
          @if($lelang->status_pengadaan == 'penunjukan langsung')
            @if($user->id == auth()->user()->id)
              <form action="{{ route('eproc.post-lampiran') }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate="" id="lampiran">
                @csrf
                <input type="hidden" class="form-control" name="lelang_id" value="{{ $lelang->id }}">
                <input type="hidden" class="form-control" name="user_id" value="{{ Auth::id() }}">
                @if($lelang->lampiran_pengadaan == 'penawaran')
                  <div class="mb-3">
                    <label class="form-label">Penawaran <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="penawaran">
                    @error('penawaran')<div class="text-danger">{{ $message }}</div>@enderror
                  </div>
                @endif
                @if($lelang->lampiran_pengadaan == 'konsep')
                  <div class="mb-3">
                    <label class="form-label">Konsep <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="konsep">
                    @error('konsep')<div class="text-danger">{{ $message }}</div>@enderror
                  </div>
                @endif
                @if($lelang->lampiran_pengadaan == 'penawaran dan konsep')
                  <div class="mb-3">
                    <label class="form-label">Penawaran Dan Konsep <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="penawaran_dan_konsep">
                    @error('penawaran_dan_konsep')<div class="text-danger">{{ $message }}</div>@enderror
                  </div>
                @endif
                <button type="submit" class="btn btn-primary" style="background-color: #0458B8;">Submit</button>
              </form>
            @endif
          @endif
        @else
          <div class="alert alert-danger">Belum bisa mengikuti lelang, tunggu beberapa saat sampai admin memverifikasi akun yang digunakan. Pemberitahuan verifikasi bahwa akun telah terverifikasi akan dikirim melalui email.</div>
        @endif
      @endif
    </div>
  </div>
</section>
@endsection