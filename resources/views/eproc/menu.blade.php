<div class="card-body">
  <ul class="nav nav-pills">
    <li class="nav-item"><a href="{{ route('eproc.perusahaan.administrasi.edit', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="nav-link {{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.administrasi.edit') ? 'active' : '' }}">Administrasi <span class="badge badge-primary">1</span></a></li>
    <li class="nav-item"><a href="{{ route('eproc.perusahaan.akta-pendirian-perusahaan.index', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="nav-link {{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.akta-pendirian-perusahaan.index') ? 'active' : '' }}">Akta Pendirian Usaha <span class="badge badge-primary">2</span></a></li>
    <li class="nav-item"><a href="{{ route('eproc.perusahaan.pengurus-badan-usaha.index', ['user_id' => Crypt::encrypt(Auth::id())]) }}" class="nav-link {{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.pengurus-badan-usaha.index') ? 'active' : '' }}">Pengurus Badan Usaha <span class="badge badge-primary">3</span></a></li>
  </ul>
</div>