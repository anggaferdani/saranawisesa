<div class="card-body">
  <div class="buttons">
    @if(auth()->user()->level == 'superadmin')
      <a href="{{ route('eproc.superadmin.perusahaan.index') }}" class="btn btn-primary badge px-4 my-0"><i class="fas fa-times"></i></a>
      <a href="{{ route('eproc.superadmin.dokumen', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary badge px-5 my-0 {{ str_contains(Route::currentRouteName(), 'eproc.superadmin.dokumen') ? 'btn-primary' : '' }}">Akta Pendirian</a>
      <a href="{{ route('eproc.superadmin.akun-bank', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary badge px-5 my-0 {{ str_contains(Route::currentRouteName(), 'eproc.superadmin.akun-bank') ? 'btn-primary' : '' }}">Akun Bank</a>
      <a href="{{ route('eproc.superadmin.pengalaman', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary badge px-5 my-0 {{ str_contains(Route::currentRouteName(), 'eproc.superadmin.pengalaman') ? 'btn-primary' : '' }}">Pengalaman</a>
      <a href="{{ route('eproc.superadmin.struktur-organisasi', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary badge px-5 my-0 {{ str_contains(Route::currentRouteName(), 'eproc.superadmin.struktur-organisasi') ? 'btn-primary' : '' }}">Struktur Organisasi</a>
      <a href="{{ route('eproc.superadmin.gambar-perusahaan', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary badge px-5 my-0 {{ str_contains(Route::currentRouteName(), 'eproc.superadmin.gambar-perusahaan') ? 'btn-primary' : '' }}">Gambar Perusahaan</a>
    @endif
    @if(auth()->user()->level == 'admin')
      <a href="{{ route('eproc.admin.perusahaan.index') }}" class="btn btn-primary badge px-4 my-0"><i class="fas fa-times"></i></a>
      <a href="{{ route('eproc.admin.dokumen', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary badge px-5 my-0 {{ str_contains(Route::currentRouteName(), 'eproc.admin.dokumen') ? 'btn-primary' : '' }}">Akta Pendirian</a>
      <a href="{{ route('eproc.admin.akun-bank', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary badge px-5 my-0 {{ str_contains(Route::currentRouteName(), 'eproc.admin.akun-bank') ? 'btn-primary' : '' }}">Akun Bank</a>
      <a href="{{ route('eproc.admin.pengalaman', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary badge px-5 my-0 {{ str_contains(Route::currentRouteName(), 'eproc.admin.pengalaman') ? 'btn-primary' : '' }}">Pengalaman</a>
      <a href="{{ route('eproc.admin.struktur-organisasi', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary badge px-5 my-0 {{ str_contains(Route::currentRouteName(), 'eproc.admin.struktur-organisasi') ? 'btn-primary' : '' }}">Struktur Organisasi</a>
      <a href="{{ route('eproc.admin.gambar-perusahaan', ['user_id' => Crypt::encrypt($user->id)]) }}" class="btn btn-secondary badge px-5 my-0 {{ str_contains(Route::currentRouteName(), 'eproc.admin.gambar-perusahaan') ? 'btn-primary' : '' }}">Gambar Perusahaan</a>
    @endif
    @if(auth()->user()->level == 'perusahaan')
      <a href="{{ route('eproc.perusahaan.dokumen', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary badge px-5 my-0 {{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.dokumen') ? 'btn-primary' : '' }}">Akta Pendirian</a>
      <a href="{{ route('eproc.perusahaan.akun-bank', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary badge px-5 my-0 {{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.akun-bank') ? 'btn-primary' : '' }}">Akun Bank</a>
      <a href="{{ route('eproc.perusahaan.pengalaman', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary badge px-5 my-0 {{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.pengalaman') ? 'btn-primary' : '' }}">Pengalaman</a>
      <a href="{{ route('eproc.perusahaan.struktur-organisasi', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary badge px-5 my-0 {{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.struktur-organisasi') ? 'btn-primary' : '' }}">Struktur Organisasi</a>
      <a href="{{ route('eproc.perusahaan.gambar-perusahaan', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="btn btn-secondary badge px-5 my-0 {{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.gambar-perusahaan') ? 'btn-primary' : '' }}">Gambar Perusahaan</a>
    @endif
  </div>
</div>