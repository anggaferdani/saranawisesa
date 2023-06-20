<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\EprocController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ComproController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DireksiController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\KomisarisController;
use App\Http\Controllers\NewComproController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\JadwalLelangController;
use App\Http\Controllers\Pengadaan0002Controller;
use App\Http\Controllers\JenisPengadaanController;
use App\Http\Controllers\ProdukDanLayananController;
use App\Http\Controllers\ProfilePerusahaanController;
use App\Http\Controllers\PenunjukanLangsungController;
use App\Http\Controllers\SubprodukDanLayananController;
use App\Http\Controllers\Pages\EprocController as Eproc;
use App\Http\Controllers\Pages\ComproController as Compro;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ComproController::class, 'index'])->name('index');
Route::get('/profile-perusahaan', [ComproController::class, 'profile_perusahaan'])->name('profile-perusahaan');
Route::get('/produk-dan-layanans', [ComproController::class, 'produk_dan_layanans'])->name('produk-dan-layanans');
Route::get('/produk-dan-layanan/{id}', [ComproController::class, 'produk_dan_layanan'])->name('produk-dan-layanan');
Route::get('/portofolios', [ComproController::class, 'portofolios'])->name('portofolios');
Route::get('/portofolio/{id}', [ComproController::class, 'portofolio'])->name('portofolio');
Route::get('/artikels', [ComproController::class, 'artikels'])->name('artikels');
Route::get('/artikel/{id}', [ComproController::class, 'artikel'])->name('artikel');

Route::prefix('compro')->name('compro.')->group(function(){
  Route::middleware(['web'])->group(function(){
    Route::middleware(['logged_in'])->group(function(){
      Route::get('/login', [ComproController::class, 'login'])->name('login');
      Route::post('/postlogin', [ComproController::class, 'postlogin'])->name('postlogin');
    });
    Route::get('/logout', [ComproController::class, 'logout'])->name('logout');
  });

  Route::prefix('superadmin')->name('superadmin.')->group(function(){
    Route::middleware(['auth:web', 'disable_back_button', 'compro', 'superadmin'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
      Route::resource('akun', AkunController::class);
      Route::get('profile-perusahaan', [ProfilePerusahaanController::class, 'index'])->name('profile-perusahaan.index');
      Route::get('profile-perusahaan/{id}/edit', [ProfilePerusahaanController::class, 'edit'])->name('profile-perusahaan.edit');
      Route::put('profile-perusahaan/{id}', [ProfilePerusahaanController::class, 'update'])->name('profile-perusahaan.update');
      Route::resource('portofolio', PortofolioController::class);
      Route::resource('artikel', ArtikelController::class);
      Route::get('export', [ArtikelController::class, 'export'])->name('export');
      Route::post('import', [ArtikelController::class, 'import'])->name('import');
      Route::get('pdf', [ArtikelController::class, 'pdf'])->name('pdf');
      Route::resource('direksi', DireksiController::class);
      Route::resource('komisaris', KomisarisController::class);
      Route::resource('setting', SettingController::class);
      Route::get('survey', [SurveyController::class, 'index'])->name('survey.index');
      Route::get('survey/{id}', [SurveyController::class, 'show'])->name('survey.show');
      Route::get('profile', [Controller::class, 'profile'])->name('profile');
      Route::put('postprofile', [Controller::class, 'postprofile'])->name('postprofile');
      Route::resource('produk-dan-layanan', ProdukDanLayananController::class);
      Route::get('{produk_dan_layanan_id}/subproduk-dan-layanan', [SubprodukDanLayananController::class, 'index'])->name('subproduk-dan-layanan.index');
      Route::get('{produk_dan_layanan_id}/subproduk-dan-layanan/create', [SubprodukDanLayananController::class, 'create'])->name('subproduk-dan-layanan.create');
      Route::post('{produk_dan_layanan_id}/subproduk-dan-layanan/store', [SubprodukDanLayananController::class, 'store'])->name('subproduk-dan-layanan.store');
      Route::get('{produk_dan_layanan_id}/subproduk-dan-layanan/{id}', [SubprodukDanLayananController::class, 'show'])->name('subproduk-dan-layanan.show');
      Route::get('{produk_dan_layanan_id}/subproduk-dan-layanan/{id}/edit', [SubprodukDanLayananController::class, 'edit'])->name('subproduk-dan-layanan.edit');
      Route::put('{produk_dan_layanan_id}/subproduk-dan-layanan/{id}', [SubprodukDanLayananController::class, 'update'])->name('subproduk-dan-layanan.update');
      Route::delete('{produk_dan_layanan_id}/subproduk-dan-layanan/{id}', [SubprodukDanLayananController::class, 'destroy'])->name('subproduk-dan-layanan.destroy');
    });
  });

  Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['auth:web', 'disable_back_button', 'compro', 'admin'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
      Route::get('profile-perusahaan', [ProfilePerusahaanController::class, 'index'])->name('profile-perusahaan.index');
      Route::get('profile-perusahaan/{id}/edit', [ProfilePerusahaanController::class, 'edit'])->name('profile-perusahaan.edit');
      Route::put('profile-perusahaan/{id}', [ProfilePerusahaanController::class, 'update'])->name('profile-perusahaan.update');
      Route::resource('portofolio', PortofolioController::class);
      Route::resource('artikel', ArtikelController::class);
      Route::get('export', [ArtikelController::class, 'export'])->name('export');
      Route::post('import', [ArtikelController::class, 'import'])->name('import');
      Route::get('pdf', [ArtikelController::class, 'pdf'])->name('pdf');
      Route::resource('direksi', DireksiController::class);
      Route::resource('komisaris', KomisarisController::class);
      Route::resource('setting', SettingController::class);
      Route::get('survey', [SurveyController::class, 'index'])->name('survey.index');
      Route::get('survey/{id}', [SurveyController::class, 'show'])->name('survey.show');
      Route::get('profile', [Controller::class, 'profile'])->name('profile');
      Route::put('postprofile', [Controller::class, 'postprofile'])->name('postprofile');
      Route::resource('produk-dan-layanan', ProdukDanLayananController::class);
      Route::get('{produk_dan_layanan_id}/subproduk-dan-layanan', [SubprodukDanLayananController::class, 'index'])->name('subproduk-dan-layanan.index');
      Route::get('{produk_dan_layanan_id}/subproduk-dan-layanan/create', [SubprodukDanLayananController::class, 'create'])->name('subproduk-dan-layanan.create');
      Route::post('{produk_dan_layanan_id}/subproduk-dan-layanan/store', [SubprodukDanLayananController::class, 'store'])->name('subproduk-dan-layanan.store');
      Route::get('{produk_dan_layanan_id}/subproduk-dan-layanan/{id}', [SubprodukDanLayananController::class, 'show'])->name('subproduk-dan-layanan.show');
      Route::get('{produk_dan_layanan_id}/subproduk-dan-layanan/{id}/edit', [SubprodukDanLayananController::class, 'edit'])->name('subproduk-dan-layanan.edit');
      Route::put('{produk_dan_layanan_id}/subproduk-dan-layanan/{id}', [SubprodukDanLayananController::class, 'update'])->name('subproduk-dan-layanan.update');
      Route::delete('{produk_dan_layanan_id}/subproduk-dan-layanan/{id}', [SubprodukDanLayananController::class, 'destroy'])->name('subproduk-dan-layanan.destroy');
    });
  });

  Route::prefix('creator')->name('creator.')->group(function(){
    Route::middleware(['auth:web', 'disable_back_button', 'compro', 'creator'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
      Route::resource('artikel', ArtikelController::class);
      Route::get('export', [ArtikelController::class, 'export'])->name('export');
      Route::post('import', [ArtikelController::class, 'import'])->name('import');
      Route::get('pdf', [ArtikelController::class, 'pdf'])->name('pdf');
      Route::get('profile', [Controller::class, 'profile'])->name('profile');
      Route::put('postprofile', [Controller::class, 'postprofile'])->name('postprofile');
    });
  });

  Route::prefix('helpdesk')->name('helpdesk.')->group(function(){
    Route::middleware(['auth:web', 'disable_back_button', 'compro', 'helpdesk'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
      Route::get('survey', [SurveyController::class, 'index'])->name('survey.index');
      Route::get('survey/{id}', [SurveyController::class, 'show'])->name('survey.show');
      Route::get('profile', [Controller::class, 'profile'])->name('profile');
      Route::put('postprofile', [Controller::class, 'postprofile'])->name('postprofile');
    });
  });
});

Route::prefix('eproc')->name('eproc.')->group(function(){

  Route::middleware(['web'])->group(function(){
    Route::middleware(['logged_in'])->group(function(){
      Route::get('/login', [EprocController::class, 'login'])->name('login');
      Route::post('/post-login', [EprocController::class, 'postLogin'])->name('post-login');
    });
    Route::get('/logout', [EprocController::class, 'logout'])->name('logout');
    Route::get('/register', [EprocController::class, 'register'])->name('register');
    Route::post('/post-register', [EprocController::class, 'postRegister'])->name('post-register');
    Route::get('/verifikasi', [EprocController::class, 'verifikasi'])->name('verifikasi');

    Route::get('/index', [EprocController::class, 'index'])->name('index');
    Route::get('/pengadaan', [EprocController::class, 'pengadaan'])->name('pengadaan');
    Route::get('/pengadaan/{id}', [EprocController::class, 'pengadaan2'])->name('pengadaan2');
    Route::get('/ikuti-pengadaan/{id}', [EprocController::class, 'ikutiPengadaan'])->name('ikuti-pengadaan');
    Route::post('/post-lampiran', [EprocController::class, 'postLampiran'])->name('post-lampiran');
    Route::get('/berita', [EprocController::class, 'berita'])->name('berita');
    Route::get('/contact-us', [EprocController::class, 'contactUs'])->name('contact-us');
  });

  Route::prefix('superadmin')->name('superadmin.')->group(function(){
    Route::middleware(['auth:web', 'disable_back_button', 'eproc', 'superadmin'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
      Route::resource('perusahaan', PerusahaanController::class);
      Route::resource('akun', AkunController::class);
      Route::get('profile', [Controller::class, 'profile'])->name('profile');
      Route::put('postprofile', [Controller::class, 'postprofile'])->name('postprofile');
      Route::resource('berita', BeritaController::class);
      Route::get('export', [BeritaController::class, 'export'])->name('export');
      Route::post('import', [BeritaController::class, 'import'])->name('import');
      Route::get('pdf', [BeritaController::class, 'pdf'])->name('pdf');
      Route::resource('lelang', LelangController::class);
      Route::resource('jenis-pengadaan', JenisPengadaanController::class);
      Route::resource('penunjukan-langsung', PenunjukanLangsungController::class);
      Route::get('{lelang_id}/jadwal-lelang', [JadwalLelangController::class, 'index'])->name('jadwal-lelang.index');
      Route::get('{lelang_id}/jadwal-lelang/create', [JadwalLelangController::class, 'create'])->name('jadwal-lelang.create');
      Route::post('{lelang_id}/jadwal-lelang/store', [JadwalLelangController::class, 'store'])->name('jadwal-lelang.store');
      Route::get('{lelang_id}/jadwal-lelang/{id}', [JadwalLelangController::class, 'show'])->name('jadwal-lelang.show');
      Route::get('{lelang_id}/jadwal-lelang/{id}/edit', [JadwalLelangController::class, 'edit'])->name('jadwal-lelang.edit');
      Route::put('{lelang_id}/jadwal-lelang/{id}', [JadwalLelangController::class, 'update'])->name('jadwal-lelang.update');
      Route::delete('{lelang_id}/jadwal-lelang/{id}', [JadwalLelangController::class, 'destroy'])->name('jadwal-lelang.destroy');
      Route::get('{lelang_id}/peserta', [PesertaController::class, 'index'])->name('peserta.index');
      Route::get('{lelang_id}/peserta/{id}', [PesertaController::class, 'show'])->name('peserta.show');
      Route::put('{lelang_id}/peserta/{id}', [PesertaController::class, 'pemenang'])->name('peserta.pemenang');
    });
  });

  Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['auth:web', 'disable_back_button', 'eproc', 'admin'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
      Route::resource('perusahaan', PerusahaanController::class);
      Route::get('profile', [Controller::class, 'profile'])->name('profile');
      Route::put('postprofile', [Controller::class, 'postprofile'])->name('postprofile');
      Route::resource('berita', BeritaController::class);
      Route::get('export', [BeritaController::class, 'export'])->name('export');
      Route::post('import', [BeritaController::class, 'import'])->name('import');
      Route::get('pdf', [BeritaController::class, 'pdf'])->name('pdf');
      Route::resource('lelang', LelangController::class);
      Route::get('/perusahaan', [Eproc::class, 'index'])->name('perusahaan.index');
      Route::get('/perusahaan/{id}', [Eproc::class, 'show'])->name('perusahaan.show');
      Route::resource('jenis-pengadaan', JenisPengadaanController::class);
      Route::resource('penunjukan-langsung', PenunjukanLangsungController::class);
      Route::get('{lelang_id}/jadwal-lelang', [JadwalLelangController::class, 'index'])->name('jadwal-lelang.index');
      Route::get('{lelang_id}/jadwal-lelang/create', [JadwalLelangController::class, 'create'])->name('jadwal-lelang.create');
      Route::post('{lelang_id}/jadwal-lelang/store', [JadwalLelangController::class, 'store'])->name('jadwal-lelang.store');
      Route::get('{lelang_id}/jadwal-lelang/{id}', [JadwalLelangController::class, 'show'])->name('jadwal-lelang.show');
      Route::get('{lelang_id}/jadwal-lelang/{id}/edit', [JadwalLelangController::class, 'edit'])->name('jadwal-lelang.edit');
      Route::put('{lelang_id}/jadwal-lelang/{id}', [JadwalLelangController::class, 'update'])->name('jadwal-lelang.update');
      Route::delete('{lelang_id}/jadwal-lelang/{id}', [JadwalLelangController::class, 'destroy'])->name('jadwal-lelang.destroy');
      Route::get('{lelang_id}/peserta', [PesertaController::class, 'index'])->name('peserta.index');
      Route::get('{lelang_id}/peserta/{id}', [PesertaController::class, 'show'])->name('peserta.show');
      Route::put('{lelang_id}/peserta/{id}', [PesertaController::class, 'pemenang'])->name('peserta.pemenang');
    });
  });

  Route::prefix('perusahaan')->name('perusahaan.')->group(function(){
    Route::middleware(['auth:web', 'disable_back_button', 'eproc', 'perusahaan'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
      Route::resource('pengadaan', Pengadaan0002Controller::class);
    });
  });
});