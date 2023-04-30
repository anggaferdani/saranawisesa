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
use App\Http\Controllers\SettingController;
use App\Http\Controllers\KomisarisController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\JadwalLelangController;
use App\Http\Controllers\ProfilePerusahaanController;
use App\Http\Controllers\ManagementPengadaanController;

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
      // profile
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
  });

  Route::prefix('superadmin')->name('superadmin.')->group(function(){
    Route::middleware(['auth:web', 'disable_back_button', 'eproc', 'superadmin'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
      Route::resource('akun', AkunController::class);
      Route::get('profile', [Controller::class, 'profile'])->name('profile');
      Route::put('postprofile', [Controller::class, 'postprofile'])->name('postprofile');
      Route::resource('berita', BeritaController::class);
      Route::get('export', [BeritaController::class, 'export'])->name('export');
      Route::post('import', [BeritaController::class, 'import'])->name('import');
      Route::get('pdf', [BeritaController::class, 'pdf'])->name('pdf');
      Route::resource('lelang', LelangController::class);
      Route::get('lelang/{lelang_id}/jadwal-lelang', [JadwalLelangController::class, 'index'])->name('jadwal-lelang.index');
      Route::get('lelang/{lelang_id}/jadwal-lelang/create', [JadwalLelangController::class, 'create'])->name('jadwal-lelang.create');
      Route::post('lelang/{lelang_id}/jadwal-lelang/store', [JadwalLelangController::class, 'store'])->name('jadwal-lelang.store');
      Route::get('lelang/{lelang_id}/jadwal-lelang/{id}', [JadwalLelangController::class, 'show'])->name('jadwal-lelang.show');
      Route::get('lelang/{lelang_id}/jadwal-lelang/{id}/edit', [JadwalLelangController::class, 'edit'])->name('jadwal-lelang.edit');
      Route::put('lelang/{lelang_id}/jadwal-lelang/{id}', [JadwalLelangController::class, 'update'])->name('jadwal-lelang.update');
      Route::delete('lelang/{lelang_id}/jadwal-lelang/{id}', [JadwalLelangController::class, 'destroy'])->name('jadwal-lelang.destroy');
    });
  });

  Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['auth:web', 'disable_back_button', 'eproc', 'admin'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
      Route::get('profile', [Controller::class, 'profile'])->name('profile');
      Route::put('postprofile', [Controller::class, 'postprofile'])->name('postprofile');
      Route::resource('berita', BeritaController::class);
      Route::get('export', [BeritaController::class, 'export'])->name('export');
      Route::post('import', [BeritaController::class, 'import'])->name('import');
      Route::get('pdf', [BeritaController::class, 'pdf'])->name('pdf');
      Route::resource('lelang', LelangController::class);
      Route::get('lelang/{lelang_id}/jadwal-lelang', [JadwalLelangController::class, 'index'])->name('jadwal-lelang.index');
      Route::get('lelang/{lelang_id}/jadwal-lelang/create', [JadwalLelangController::class, 'create'])->name('jadwal-lelang.create');
      Route::post('lelang/{lelang_id}/jadwal-lelang/store', [JadwalLelangController::class, 'store'])->name('jadwal-lelang.store');
      Route::get('lelang/{lelang_id}/jadwal-lelang/{id}', [JadwalLelangController::class, 'show'])->name('jadwal-lelang.show');
      Route::get('lelang/{lelang_id}/jadwal-lelang/{id}/edit', [JadwalLelangController::class, 'edit'])->name('jadwal-lelang.edit');
      Route::put('lelang/{lelang_id}/jadwal-lelang/{id}', [JadwalLelangController::class, 'update'])->name('jadwal-lelang.update');
      Route::delete('lelang/{lelang_id}/jadwal-lelang/{id}', [JadwalLelangController::class, 'destroy'])->name('jadwal-lelang.destroy');
    });
  });
});