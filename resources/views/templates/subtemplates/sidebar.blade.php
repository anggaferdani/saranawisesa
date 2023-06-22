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
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.superadmin.akun.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.superadmin.akun.index') }}"><i class="fas fa-user"></i><span>Akun</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.superadmin.profile-perusahaan.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.superadmin.profile-perusahaan.index') }}"><i class="fas fa-lock"></i><span>Profile Perusahaan</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.superadmin.produk-dan-layanan.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.superadmin.produk-dan-layanan.index') }}"><i class="fas fa-quote-left"></i><span>Produk Dan Layanan</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.superadmin.portofolio.index') }}"><i class="fas fa-folder"></i><span>Portofolio</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.superadmin.artikel.index') }}"><i class="fas fa-tag"></i><span>Artikel</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.superadmin.direksi.index') }}"><i class="fas fa-user"></i><span>Direksi</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.superadmin.komisaris.index') }}"><i class="fas fa-user"></i><span>Komisaris</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.superadmin.survey.index') }}"><i class="fas fa-star"></i><span>Survey</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.superadmin.setting.index') }}"><i class="fas fa-cog"></i><span>Setting</span></a></li>
        @endif
        @if(auth()->user()->level == 'admin')
        <li class="menu-header">Menu</li>
          <li><a class="nav-link" href="{{ route('compro.admin.dashboard') }}"><i class="fas fa-quote-right"></i><span>Dashboard</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.admin.profile-perusahaan.index') }}"><i class="fas fa-lock"></i><span>Profile Perusahaan</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'compro.admin.produk-dan-layanan.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('compro.admin.produk-dan-layanan.index') }}"><i class="fas fa-quote-left"></i><span>Produk Dan Layanan</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.admin.portofolio.index') }}"><i class="fas fa-folder"></i><span>Portofolio</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.admin.artikel.index') }}"><i class="fas fa-tag"></i><span>Artikel</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.admin.direksi.index') }}"><i class="fas fa-user"></i><span>Direksi</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.admin.komisaris.index') }}"><i class="fas fa-user"></i><span>Komisaris</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.admin.survey.index') }}"><i class="fas fa-star"></i><span>Survey</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.admin.setting.index') }}"><i class="fas fa-cog"></i><span>Setting</span></a></li>
        @endif
        @if(auth()->user()->level == 'creator')
        <li class="menu-header">Menu</li>
          <li><a class="nav-link" href="{{ route('compro.creator.dashboard') }}"><i class="fas fa-quote-right"></i><span>Dashboard</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.creator.artikel.index') }}"><i class="fas fa-tag"></i><span>Artikel</span></a></li>
        @endif
        @if(auth()->user()->level == 'helpdesk')
        <li class="menu-header">Menu</li>
          <li><a class="nav-link" href="{{ route('compro.helpdesk.dashboard') }}"><i class="fas fa-quote-right"></i><span>Dashboard</span></a></li>
          <li><a class="nav-link" href="{{ route('compro.helpdesk.survey.index') }}"><i class="fas fa-star"></i><span>Survey</span></a></li>
        @endif
      @endif
      @if(Session::has('eproc'))
        @if(auth()->user()->level == 'superadmin')
          <li class="menu-header">Menu</li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.superadmin.dashboard') }}"><i class="fas fa-quote-right"></i><span>Dashboard</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.akun.index') || str_contains(Route::currentRouteName(), 'eproc.superadmin.perusahaan.index') ? 'active' : '' }}" class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i><span>Akun</span></a>
            <ul class="dropdown-menu" style="display: block;">
              <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.akun.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.superadmin.akun.index') }}"><span>Admin</span></a></li>
              <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.perusahaan.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.superadmin.perusahaan.index') }}"><span>Perusahaan</span></a></li>
            </ul>
          </li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.berita.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.superadmin.berita.index') }}"><i class="fas fa-quote-left"></i><span>Berita</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.jenis-pengadaan.index') || str_contains(Route::currentRouteName(), 'eproc.superadmin.lelang.index') || str_contains(Route::currentRouteName(), 'eproc.superadmin.penunjukan-langsung.index') ? 'active' : '' }}" class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tag"></i><span>Pengadaan</span></a>
            <ul class="dropdown-menu" style="display: block;">
              <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.jenis-pengadaan.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.superadmin.jenis-pengadaan.index') }}">Jenis Pengadaan</a></li>
              <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.lelang.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.superadmin.lelang.index') }}">Lelang</a></li>
              <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.penunjukan-langsung.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.superadmin.penunjukan-langsung.index') }}">Penunjukan Langsung</a></li>
            </ul>
          </li>
        @endif
        @if(auth()->user()->level == 'admin')
          <li class="menu-header">Menu</li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.admin.dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.admin.dashboard') }}"><i class="fas fa-quote-right"></i><span>Dashboard</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.admin.perusahaan.index') ? 'active' : '' }}" class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i><span>Akun</span></a>
            <ul class="dropdown-menu" style="display: block;">
              <li class="{{ str_contains(Route::currentRouteName(), 'eproc.admin.perusahaan.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.admin.perusahaan.index') }}"><span>Perusahaan</span></a></li>
            </ul>
          </li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.admin.berita.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.admin.berita.index') }}"><i class="fas fa-quote-left"></i><span>Berita</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.admin.jenis-pengadaan.index') || str_contains(Route::currentRouteName(), 'eproc.admin.lelang.index') || str_contains(Route::currentRouteName(), 'eproc.admin.penunjukan-langsung.index') ? 'active' : '' }} class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tag"></i><span>Pengadaan</span></a>
            <ul class="dropdown-menu" style="display: block;">
              <li class="{{ str_contains(Route::currentRouteName(), 'eproc.admin.jenis-pengadaan.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.admin.jenis-pengadaan.index') }}">Jenis Pengadaan</a></li>
              <li class="{{ str_contains(Route::currentRouteName(), 'eproc.admin.lelang.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.admin.lelang.index') }}">Lelang</a></li>
              <li class="{{ str_contains(Route::currentRouteName(), 'eproc.admin.penunjukan-langsung.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.admin.penunjukan-langsung.index') }}">Penunjukan Langsung</a></li>
            </ul>
          </li>
        @endif
        @if(auth()->user()->level == 'perusahaan')
          <li class="menu-header">Menu</li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.perusahaan.dashboard') }}"><i class="fas fa-quote-right"></i><span>Dashboard</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.administrasi') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.perusahaan.administrasi.edit', ['user_id' => Crypt::encrypt(Auth::id())]) }}"><i class="fas fa-quote-right"></i><span>Kualifikasi</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.pengadaan.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.perusahaan.pengadaan.index') }}"><i class="fas fa-tag"></i><span>Pengadaan</span></a></li>
        @endif
      @endif
    </ul>
  </aside>
</div>