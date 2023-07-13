{{-- <div class="card-body">
  <div class="buttons">
    @if(auth()->user()->level == 'superadmin')
      <a href="{{ route('eproc.superadmin.perusahaan.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i></a>
      <a href="{{ route('eproc.superadmin.administrasi.edit', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.superadmin.administrasi') ? 'btn-primary' : '' }}">Administrasi</a>
      <a href="{{ route('eproc.superadmin.akta-pendirian-perusahaan.index', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.superadmin.akta-pendirian-perusahaan') ? 'btn-primary' : '' }}">Akta Pendirian Usaha</a>
      <a href="{{ route('eproc.superadmin.pengurus-badan-usaha.index', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.superadmin.pengurus-badan-usaha') ? 'btn-primary' : '' }}">Pengurus Badan Usaha</a>
      <a href="{{ route('eproc.superadmin.tanda-daftar-usaha.edit', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.superadmin.tanda-daftar-usaha') ? 'btn-primary' : '' }}">Tanda Daftar Usaha</a>
      <a href="{{ route('eproc.superadmin.susunan-kepemilikan-saham.index', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.superadmin.susunan-kepemilikan-saham') ? 'btn-primary' : '' }}">Susunan Kepemilikan Saham</a>
      <a href="{{ route('eproc.superadmin.data-personalia.index', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.superadmin.data-personalia') ? 'btn-primary' : '' }}">Data Personalia</a>
      <a href="{{ route('eproc.superadmin.data-fasilitas.index', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.superadmin.data-fasilitas') ? 'btn-primary' : '' }}">Data Fasilitas</a>
      <a href="{{ route('eproc.superadmin.pengalaman-perusahaan.index', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.superadmin.pengalaman-perusahaan') ? 'btn-primary' : '' }}">Pengalaman Perusahaan</a>
      <a href="{{ route('eproc.superadmin.pekerjaan-yang-sedang-dilaksanakan.index', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.superadmin.pekerjaan-yang-sedang-dilaksanakan') ? 'btn-primary' : '' }}">Pekerjaan Yang Sedang Dilaksanakan</a>
      <a href="{{ route('eproc.superadmin.sisa-kemampuan-nyata.edit', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.superadmin.sisa-kemampuan-nyata') ? 'btn-primary' : '' }}">Sisa Kemampuan Nyata</a>
      <a href="{{ route('eproc.superadmin.lampiran-kualifikasi.edit', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.superadmin.lampiran-kualifikasi') ? 'btn-primary' : '' }}">Lampiran kualifikasi</a>
    @endif
    @if(auth()->user()->level == 'admin')
      <a href="{{ route('eproc.admin.perusahaan.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i></a>
      <a href="{{ route('eproc.admin.administrasi.edit', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.admin.administrasi') ? 'btn-primary' : '' }}">Administrasi</a>
      <a href="{{ route('eproc.admin.akta-pendirian-perusahaan.index', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.admin.akta-pendirian-perusahaan') ? 'btn-primary' : '' }}">Akta Pendirian Usaha</a>
      <a href="{{ route('eproc.admin.pengurus-badan-usaha.index', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.admin.pengurus-badan-usaha') ? 'btn-primary' : '' }}">Pengurus Badan Usaha</a>
      <a href="{{ route('eproc.admin.tanda-daftar-usaha.edit', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.admin.tanda-daftar-usaha') ? 'btn-primary' : '' }}">Tanda Daftar Usaha</a>
      <a href="{{ route('eproc.admin.susunan-kepemilikan-saham.index', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.admin.susunan-kepemilikan-saham') ? 'btn-primary' : '' }}">Susunan Kepemilikan Saham</a>
      <a href="{{ route('eproc.admin.data-personalia.index', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.admin.data-personalia') ? 'btn-primary' : '' }}">Data Personalia</a>
      <a href="{{ route('eproc.admin.data-fasilitas.index', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.admin.data-fasilitas') ? 'btn-primary' : '' }}">Data Fasilitas</a>
      <a href="{{ route('eproc.admin.pengalaman-perusahaan.index', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.admin.pengalaman-perusahaan') ? 'btn-primary' : '' }}">Pengalaman Perusahaan</a>
      <a href="{{ route('eproc.admin.pekerjaan-yang-sedang-dilaksanakan.index', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.admin.pekerjaan-yang-sedang-dilaksanakan') ? 'btn-primary' : '' }}">Pekerjaan Yang Sedang Dilaksanakan</a>
      <a href="{{ route('eproc.admin.sisa-kemampuan-nyata.edit', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.admin.sisa-kemampuan-nyata') ? 'btn-primary' : '' }}">Sisa Kemampuan Nyata</a>
      <a href="{{ route('eproc.admin.lampiran-kualifikasi.edit', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.admin.lampiran-kualifikasi') ? 'btn-primary' : '' }}">Lampiran kualifikasi</a>
    @endif
    @if(auth()->user()->level == 'perusahaan')
      <a href="{{ route('eproc.perusahaan.administrasi.edit', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.administrasi') ? 'btn-primary' : '' }}">Administrasi</a>
      <a href="{{ route('eproc.perusahaan.akta-pendirian-perusahaan.index', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.akta-pendirian-perusahaan') ? 'btn-primary' : '' }}">Akta Pendirian Usaha</a>
      <a href="{{ route('eproc.perusahaan.pengurus-badan-usaha.index', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.pengurus-badan-usaha') ? 'btn-primary' : '' }}">Pengurus Badan Usaha</a>
      <a href="{{ route('eproc.perusahaan.tanda-daftar-usaha.edit', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.tanda-daftar-usaha') ? 'btn-primary' : '' }}">Tanda Daftar Usaha</a>
      <a href="{{ route('eproc.perusahaan.susunan-kepemilikan-saham.index', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.susunan-kepemilikan-saham') ? 'btn-primary' : '' }}">Susunan Kepemilikan Saham</a>
      <a href="{{ route('eproc.perusahaan.data-personalia.index', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.data-personalia') ? 'btn-primary' : '' }}">Data Personalia</a>
      <a href="{{ route('eproc.perusahaan.data-fasilitas.index', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.data-fasilitas') ? 'btn-primary' : '' }}">Data Fasilitas</a>
      <a href="{{ route('eproc.perusahaan.pengalaman-perusahaan.index', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.pengalaman-perusahaan') ? 'btn-primary' : '' }}">Pengalaman Perusahaan</a>
      <a href="{{ route('eproc.perusahaan.pekerjaan-yang-sedang-dilaksanakan.index', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.pekerjaan-yang-sedang-dilaksanakan') ? 'btn-primary' : '' }}">Pekerjaan Yang Sedang Dilaksanakan</a>
      <a href="{{ route('eproc.perusahaan.sisa-kemampuan-nyata.edit', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.sisa-kemampuan-nyata') ? 'btn-primary' : '' }}">Sisa Kemampuan Nyata</a>
      <a href="{{ route('eproc.perusahaan.lampiran-kualifikasi.edit', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary {{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.lampiran-kualifikasi') ? 'btn-primary' : '' }}">Lampiran kualifikasi</a>
    @endif
  </div>
</div> --}}
<div class="card-body">
  <div class="buttons">
    @if(auth()->user()->level == 'superadmin')
      
    @endif
    @if(auth()->user()->level == 'admin')
      
    @endif
    @if(auth()->user()->level == 'perusahaan')
      <a href="{{ route('eproc.perusahaan.dokumen', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary badge px-5 my-0 {{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.dokumen') ? 'btn-primary' : '' }}">Akta Pendirian</a>
      <a href="" class="btn btn-secondary badge px-5 my-0">Akun Bank</a>
      <a href="" class="btn btn-secondary badge px-5 my-0">Pengalaman</a>
      <a href="" class="btn btn-secondary badge px-5 my-0">Struktur Organisasi</a>
      <a href="" class="btn btn-secondary badge px-5 my-0">Gambar Perusahaan</a>
    @endif
  </div>
</div>