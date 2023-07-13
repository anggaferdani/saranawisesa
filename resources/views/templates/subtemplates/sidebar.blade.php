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
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.akun') ||
          str_contains(Route::currentRouteName(), 'eproc.superadmin.perusahaan') ||
          str_contains(Route::currentRouteName(), 'eproc.superadmin.administrasi') ||
          str_contains(Route::currentRouteName(), 'eproc.superadmin.akta-pendirian-perusahaan') ||
          str_contains(Route::currentRouteName(), 'eproc.superadmin.pengurus-badan-usaha') ||
          str_contains(Route::currentRouteName(), 'eproc.superadmin.tanda-daftar-usaha') ||
          str_contains(Route::currentRouteName(), 'eproc.superadmin.susunan-kepemilikan-saham') ||
          str_contains(Route::currentRouteName(), 'eproc.superadmin.data-personalia') ||
          str_contains(Route::currentRouteName(), 'eproc.superadmin.data-fasilitas') ||
          str_contains(Route::currentRouteName(), 'eproc.superadmin.pengalaman-perusahaan') ||
          str_contains(Route::currentRouteName(), 'eproc.superadmin.pekerjaan-yang-sedang-dilaksanakan') ||
          str_contains(Route::currentRouteName(), 'eproc.superadmin.sisa-kemampuan-nyata') ||
          str_contains(Route::currentRouteName(), 'eproc.superadmin.lampiran-kualifikasi') ? 'active' : '' }}" class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i><span>Akun</span></a>
            <ul class="dropdown-menu" style="display: block;">
              <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.akun') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.superadmin.akun.index') }}"><span>Admin</span></a></li>
              <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.perusahaan') ||
              str_contains(Route::currentRouteName(), 'eproc.superadmin.administrasi') ||
              str_contains(Route::currentRouteName(), 'eproc.superadmin.akta-pendirian-perusahaan') ||
              str_contains(Route::currentRouteName(), 'eproc.superadmin.pengurus-badan-usaha') ||
              str_contains(Route::currentRouteName(), 'eproc.superadmin.tanda-daftar-usaha') ||
              str_contains(Route::currentRouteName(), 'eproc.superadmin.susunan-kepemilikan-saham') ||
              str_contains(Route::currentRouteName(), 'eproc.superadmin.data-personalia') ||
              str_contains(Route::currentRouteName(), 'eproc.superadmin.data-fasilitas') ||
              str_contains(Route::currentRouteName(), 'eproc.superadmin.pengalaman-perusahaan') ||
              str_contains(Route::currentRouteName(), 'eproc.superadmin.pekerjaan-yang-sedang-dilaksanakan') ||
              str_contains(Route::currentRouteName(), 'eproc.superadmin.sisa-kemampuan-nyata') ||
              str_contains(Route::currentRouteName(), 'eproc.superadmin.lampiran-kualifikasi') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.superadmin.perusahaan.index') }}"><span>Perusahaan</span></a></li>
            </ul>
          </li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.berita') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.superadmin.berita.index') }}"><i class="fas fa-quote-left"></i><span>Berita</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.jenis-pengadaan') || str_contains(Route::currentRouteName(), 'eproc.superadmin.lelang') || str_contains(Route::currentRouteName(), 'eproc.superadmin.penunjukan-langsung') ? 'active' : '' }}" class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tag"></i><span>Pengadaan</span></a>
            <ul class="dropdown-menu" style="display: block;">
              <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.jenis-pengadaan') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.superadmin.jenis-pengadaan.index') }}">Jenis Pengadaan</a></li>
              <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.lelang') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.superadmin.lelang.index') }}">Lelang</a></li>
              <li class="{{ str_contains(Route::currentRouteName(), 'eproc.superadmin.penunjukan-langsung') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.superadmin.penunjukan-langsung.index') }}">Penunjukan Langsung</a></li>
            </ul>
          </li>
        @endif
        @if(auth()->user()->level == 'admin')
          <li class="menu-header">Menu</li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.admin.dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.admin.dashboard') }}"><i class="fas fa-quote-right"></i><span>Dashboard</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.admin.perusahaan') ||
          str_contains(Route::currentRouteName(), 'eproc.admin.administrasi') ||
          str_contains(Route::currentRouteName(), 'eproc.admin.akta-pendirian-perusahaan') ||
          str_contains(Route::currentRouteName(), 'eproc.admin.pengurus-badan-usaha') ||
          str_contains(Route::currentRouteName(), 'eproc.admin.tanda-daftar-usaha') ||
          str_contains(Route::currentRouteName(), 'eproc.admin.susunan-kepemilikan-saham') ||
          str_contains(Route::currentRouteName(), 'eproc.admin.data-personalia') ||
          str_contains(Route::currentRouteName(), 'eproc.admin.data-fasilitas') ||
          str_contains(Route::currentRouteName(), 'eproc.admin.pengalaman-perusahaan') ||
          str_contains(Route::currentRouteName(), 'eproc.admin.pekerjaan-yang-sedang-dilaksanakan') ||
          str_contains(Route::currentRouteName(), 'eproc.admin.sisa-kemampuan-nyata') ||
          str_contains(Route::currentRouteName(), 'eproc.admin.lampiran-kualifikasi') ? 'active' : '' }}" class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i><span>Akun</span></a>
            <ul class="dropdown-menu" style="display: block;">
              <li class="{{ str_contains(Route::currentRouteName(), 'eproc.admin.perusahaan') ||
              str_contains(Route::currentRouteName(), 'eproc.admin.administrasi') ||
              str_contains(Route::currentRouteName(), 'eproc.admin.akta-pendirian-perusahaan') ||
              str_contains(Route::currentRouteName(), 'eproc.admin.pengurus-badan-usaha') ||
              str_contains(Route::currentRouteName(), 'eproc.admin.tanda-daftar-usaha') ||
              str_contains(Route::currentRouteName(), 'eproc.admin.susunan-kepemilikan-saham') ||
              str_contains(Route::currentRouteName(), 'eproc.admin.data-personalia') ||
              str_contains(Route::currentRouteName(), 'eproc.admin.data-fasilitas') ||
              str_contains(Route::currentRouteName(), 'eproc.admin.pengalaman-perusahaan') ||
              str_contains(Route::currentRouteName(), 'eproc.admin.pekerjaan-yang-sedang-dilaksanakan') ||
              str_contains(Route::currentRouteName(), 'eproc.admin.sisa-kemampuan-nyata') ||
              str_contains(Route::currentRouteName(), 'eproc.admin.lampiran-kualifikasi') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.admin.perusahaan.index') }}"><span>Perusahaan</span></a></li>
            </ul>
          </li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.admin.berita') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.admin.berita.index') }}"><i class="fas fa-quote-left"></i><span>Berita</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.admin.jenis-pengadaan') || str_contains(Route::currentRouteName(), 'eproc.admin.lelang') || str_contains(Route::currentRouteName(), 'eproc.admin.penunjukan-langsung') ? 'active' : '' }} class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tag"></i><span>Pengadaan</span></a>
            <ul class="dropdown-menu" style="display: block;">
              <li class="{{ str_contains(Route::currentRouteName(), 'eproc.admin.jenis-pengadaan') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.admin.jenis-pengadaan.index') }}">Jenis Pengadaan</a></li>
              <li class="{{ str_contains(Route::currentRouteName(), 'eproc.admin.lelang') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.admin.lelang.index') }}">Lelang</a></li>
              <li class="{{ str_contains(Route::currentRouteName(), 'eproc.admin.penunjukan-langsung') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.admin.penunjukan-langsung.index') }}">Penunjukan Langsung</a></li>
            </ul>
          </li>
        @endif
        @if(auth()->user()->level == 'perusahaan')
          <li class="menu-header">Menu</li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.perusahaan.dashboard') }}"><i class="fas fa-quote-right"></i><span>Dashboard</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.dokumen') ||
          str_contains(Route::currentRouteName(), 'eproc.perusahaan.administrasi') ||
          str_contains(Route::currentRouteName(), 'eproc.perusahaan.akta-pendirian-perusahaan') ||
          str_contains(Route::currentRouteName(), 'eproc.perusahaan.pengurus-badan-usaha') ||
          str_contains(Route::currentRouteName(), 'eproc.perusahaan.tanda-daftar-usaha') ||
          str_contains(Route::currentRouteName(), 'eproc.perusahaan.susunan-kepemilikan-saham') ||
          str_contains(Route::currentRouteName(), 'eproc.perusahaan.data-personalia') ||
          str_contains(Route::currentRouteName(), 'eproc.perusahaan.data-fasilitas') ||
          str_contains(Route::currentRouteName(), 'eproc.perusahaan.pengalaman-perusahaan') ||
          str_contains(Route::currentRouteName(), 'eproc.perusahaan.pekerjaan-yang-sedang-dilaksanakan') ||
          str_contains(Route::currentRouteName(), 'eproc.perusahaan.sisa-kemampuan-nyata') ||
          str_contains(Route::currentRouteName(), 'eproc.perusahaan.lampiran-kualifikasi') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.perusahaan.dokumen', ['user_id' => Crypt::encrypt(Auth::id())]) }}"><i class="fas fa-user"></i><span>Kualifikasi</span></a></li>
          <li class="{{ str_contains(Route::currentRouteName(), 'eproc.perusahaan.pengadaan') ? 'active' : '' }}"><a class="nav-link" href="{{ route('eproc.perusahaan.pengadaan.index') }}"><i class="fas fa-tag"></i><span>Pengadaan</span></a></li>
        @endif
      @endif
    </ul>
  </aside>
</div>