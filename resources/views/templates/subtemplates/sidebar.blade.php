<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <img src="{{ asset('logo-saranawisesa.png') }}" width="50px" alt="">
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <img src="{{ asset('logo-saranawisesa.png') }}" width="30px" alt="">
    </div>
    <ul class="sidebar-menu">
      @if(Session::has('compro'))
        @if(auth()->user()->level == 'superadmin')
        <li class="menu-header">Menu</li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.superadmin.dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.superadmin.dashboard') }}"><i class="fas fa-quote-right"></i><span>Dashboard</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.superadmin.akun') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.superadmin.akun.index') }}"><i class="fas fa-user"></i><span>Akun</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.superadmin.profile-perusahaan') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.superadmin.profile-perusahaan.edit', Crypt::encrypt(1)) }}"><i class="fas fa-lock"></i><span>Profile Perusahaan</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.superadmin.produk-dan-layanan') || str_contains(Route::currentRouteName(), 'compro.superadmin.subproduk-dan-layanan') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.superadmin.produk-dan-layanan.index') }}"><i class="fas fa-quote-left"></i><span>Produk Dan Layanan</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.superadmin.portofolio') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.superadmin.portofolio.index') }}"><i class="fas fa-folder"></i><span>Portofolio</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.superadmin.artikel') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.superadmin.artikel.index') }}"><i class="fas fa-tag"></i><span>Artikel</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.superadmin.direksi') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.superadmin.direksi.index') }}"><i class="fas fa-user"></i><span>Direksi</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.superadmin.komisaris') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.superadmin.komisaris.index') }}"><i class="fas fa-user"></i><span>Komisaris</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.superadmin.survey') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.superadmin.survey.index') }}"><i class="fas fa-star"></i><span>Survey</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.superadmin.setting') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.superadmin.setting.index') }}"><i class="fas fa-cog"></i><span>Setting</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.superadmin.banner') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.superadmin.banner.index') }}"><i class="fas fa-image"></i><span>Banner</span></a></li>
        @endif
        @if(auth()->user()->level == 'admin')
        <li class="menu-header">Menu</li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.admin.dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.admin.dashboard') }}"><i class="fas fa-quote-right"></i><span>Dashboard</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.admin.profile-perusahaan') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.admin.profile-perusahaan.edit', Crypt::encrypt(1)) }}"><i class="fas fa-lock"></i><span>Profile Perusahaan</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.admin.produk-dan-layanan') || str_contains(Route::currentRouteName(), 'compro.admin.subproduk-dan-layanan') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.admin.produk-dan-layanan.index') }}"><i class="fas fa-quote-left"></i><span>Produk Dan Layanan</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.admin.portofolio') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.admin.portofolio.index') }}"><i class="fas fa-folder"></i><span>Portofolio</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.admin.artikel') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.admin.artikel.index') }}"><i class="fas fa-tag"></i><span>Artikel</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.admin.direksi') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.admin.direksi.index') }}"><i class="fas fa-user"></i><span>Direksi</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.admin.komisaris') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.admin.komisaris.index') }}"><i class="fas fa-user"></i><span>Komisaris</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.admin.survey') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.admin.survey.index') }}"><i class="fas fa-star"></i><span>Survey</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.admin.setting') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.admin.setting.index') }}"><i class="fas fa-cog"></i><span>Setting</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.admin.banner') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.admin.banner.index') }}"><i class="fas fa-image"></i><span>Banner</span></a></li>
        @endif
        @if(auth()->user()->level == 'creator')
        <li class="menu-header">Menu</li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.creator.dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.creator.dashboard') }}"><i class="fas fa-quote-right"></i><span>Dashboard</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.creator.artikel') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.creator.artikel.index') }}"><i class="fas fa-tag"></i><span>Artikel</span></a></li>
        @endif
        @if(auth()->user()->level == 'helpdesk')
        <li class="menu-header">Menu</li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.helpdesk.dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.helpdesk.dashboard') }}"><i class="fas fa-quote-right"></i><span>Dashboard</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.helpdesk.survey') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.helpdesk.survey.index') }}"><i class="fas fa-star"></i><span>Survey</span></a></li>
        @endif
      @endif
      @if(Session::has('eproc'))
        @if(auth()->user()->level == 'superadmin')
          <li class="menu-header">Menu</li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.superadmin.dashboard') }}"><i class="fas fa-quote-right"></i><span>Dashboard</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.akun') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.superadmin.akun.index') }}"><i class="fas fa-user-cog"></i><span>Admin</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.perusahaan') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.superadmin.perusahaan.index') }}"><i class="fas fa-user"></i><span>Admin</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.berita') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.superadmin.berita.index') }}"><i class="fas fa-quote-left"></i><span>Berita</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.jenis-pengadaan') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.superadmin.jenis-pengadaan.index') }}"><i class="fas fa-tag"></i><span>Jenis Pengadaan</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.lelang') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.superadmin.lelang.index') }}"><i class="fas fa-box"></i><span>Lelang</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.penunjukan-langsung') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.superadmin.penunjukan-langsung.index') }}"><i class="fas fa-box-open"></i><span>Penunjukan Langsung</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.pelayanan') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.superadmin.pelayanan.index') }}"><i class="fas fa-th-large"></i><span>Kategori Pelayanan</span></a></li>
        @endif
        @if(auth()->user()->level == 'admin')
          <li class="menu-header">Menu</li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.admin.dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.admin.dashboard') }}"><i class="fas fa-quote-right"></i><span>Dashboard</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.admin.perusahaan') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.admin.perusahaan.index') }}"><i class="fas fa-user"></i><span>Admin</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.admin.berita') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.admin.berita.index') }}"><i class="fas fa-quote-left"></i><span>Berita</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.admin.jenis-pengadaan') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.admin.jenis-pengadaan.index') }}"><i class="fas fa-tag"></i><span>Jenis Pengadaan</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.admin.lelang') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.admin.lelang.index') }}"><i class="fas fa-box"></i><span>Lelang</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.admin.penunjukan-langsung') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.admin.penunjukan-langsung.index') }}"><i class="fas fa-box-open"></i><span>Penunjukan Langsung</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.admin.pelayanan') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.admin.pelayanan.index') }}"><i class="fas fa-th-large"></i><span>Kategori Pelayanan</span></a></li>
        @endif
        @if(auth()->user()->level == 'perusahaan')
          <li class="menu-header">Menu</li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.perusahaan.dashboard') }}"><i class="fas fa-quote-right"></i><span>Dashboard</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.dokumen') ||
          str_contains(Route::currentRouteName(), 'eproc.perusahaan.akun-bank') ||
          str_contains(Route::currentRouteName(), 'eproc.perusahaan.pengalaman') ||
          str_contains(Route::currentRouteName(), 'eproc.perusahaan.struktur-organisasi') ||
          str_contains(Route::currentRouteName(), 'eproc.perusahaan.gambar-perusahaan') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.perusahaan.dokumen', ['user_id' => Crypt::encrypt(Auth::id())]) }}"><i class="fas fa-user"></i><span>Data Perusahaan</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.pengadaan') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.perusahaan.pengadaan.index') }}"><i class="fas fa-tag"></i><span>Pengadaan</span></a></li>
        @endif
      @endif
    </ul>
  </aside>
</div>