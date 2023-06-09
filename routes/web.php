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
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\JadwalLelangController;
use App\Http\Controllers\JenisPengadaanController;
use App\Http\Controllers\NewComproController;
use App\Http\Controllers\ProfilePerusahaanController;
use App\Http\Controllers\PenunjukanLangsungController;
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

Route::get('/', [NewComproController::class, 'index'])->name('index');
Route::get('/profile-perusahaan', [NewComproController::class, 'profile_perusahaan'])->name('profile-perusahaan');
Route::get('/produk-dan-layanan', [NewComproController::class, 'produk_dan_layanan'])->name('produk-dan-layanan');
Route::get('/portofolios', [NewComproController::class, 'portofolios'])->name('portofolios');
Route::get('/portofolio/{id}', [NewComproController::class, 'portofolio'])->name('portofolio');
Route::get('/artikels', [NewComproController::class, 'artikels'])->name('artikels');
Route::get('/artikel/{id}', [NewComproController::class, 'artikel'])->name('artikel');

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
      Route::get('survey', [SurveyController::class, 'index'])->name('survey.index');
      Route::get('survey/{id}', [SurveyController::class, 'show'])->name('survey.show');
      Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
      Route::get('setting/{id}/edit', [SettingController::class, 'edit'])->name('setting.edit');
      Route::put('setting/{id}', [SettingController::class, 'update'])->name('setting.update');
      Route::get('profile', [Controller::class, 'profile'])->name('profile');
      Route::put('postprofile', [Controller::class, 'postprofile'])->name('postprofile');
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
      Route::get('survey', [SurveyController::class, 'index'])->name('survey.index');
      Route::get('survey/{id}', [SurveyController::class, 'show'])->name('survey.show');
      Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
      Route::get('setting/{id}/edit', [SettingController::class, 'edit'])->name('setting.edit');
      Route::put('setting/{id}', [SettingController::class, 'update'])->name('setting.update');
      Route::get('profile', [Controller::class, 'profile'])->name('profile');
      Route::put('postprofile', [Controller::class, 'postprofile'])->name('postprofile');
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
      Route::post('/postlogin', [EprocController::class, 'postlogin'])->name('postlogin');
    });
    Route::get('/logout', [EprocController::class, 'logout'])->name('logout');
    Route::get('/register', [EprocController::class, 'register'])->name('register');
    Route::post('/postregister', [EprocController::class, 'postregister'])->name('postregister');
    Route::get('/verify', [EprocController::class, 'verify'])->name('verify');

    Route::get('/kualifikasi/{user_id}', [Eproc::class, 'kualifikasi'])->name('kualifikasi');
    Route::post('/kirim-kualifikasi', [Eproc::class, 'kirim_kualifikasi'])->name('kirim-kualifikasi');

    Route::get('/beranda', [Eproc::class, 'beranda'])->name('beranda');
    Route::get('/pengadaan', [Eproc::class, 'pengadaan'])->name('pengadaan');
    Route::get('/pengadaan/{id}', [Eproc::class, 'detail_pengadaan'])->name('detail-pengadaan');
    Route::get('/ikut-pengadaan/{id}', [Eproc::class, 'ikut_pengadaan'])->name('ikut-pengadaan');
    Route::post('/kirim-lampiran', [Eproc::class, 'kirim_lampiran'])->name('kirim-lampiran');
    Route::get('/berita', [Eproc::class, 'berita'])->name('berita');
    Route::get('/kontak', [Eproc::class, 'kontak'])->name('kontak');
  });

  Route::prefix('superadmin')->name('superadmin.')->group(function(){
    Route::middleware(['auth:web', 'disable_back_button', 'eproc', 'superadmin'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
      Route::get('perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan.index');
      Route::get('perusahaan/{id}', [PerusahaanController::class, 'show'])->name('perusahaan.show');
      Route::post('perusahaan/verifikasi/{id}', [PerusahaanController::class, 'verifikasi'])->name('perusahaan.verifikasi');
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
      Route::post('{lelang_id}/peserta/{id}/pemenang', [PesertaController::class, 'pemenang'])->name('peserta.pemenang');
    });
  });

  Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['auth:web', 'disable_back_button', 'eproc', 'admin'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
      Route::get('perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan.index');
      Route::get('perusahaan/{id}', [PerusahaanController::class, 'show'])->name('perusahaan.show');
      Route::post('perusahaan/verifikasi/{id}', [PerusahaanController::class, 'verifikasi'])->name('perusahaan.verifikasi');
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
      Route::post('{lelang_id}/peserta/{id}/pemenang', [PesertaController::class, 'pemenang'])->name('peserta.pemenang');
    });
  });
});