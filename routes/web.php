<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\EprocController;
use App\Http\Controllers\ComproController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DireksiController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\KomisarisController;
use App\Http\Controllers\ManagementPengadaanController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ProfilePerusahaanController;

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
      Route::resource('direksi', DireksiController::class);
      Route::resource('komisaris', KomisarisController::class);
      Route::get('survey', [SurveyController::class, 'index'])->name('survey.index');
      Route::get('survey/{id}', [SurveyController::class, 'show'])->name('survey.show');
      // setting
      Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
      Route::get('setting/{id}/edit', [SettingController::class, 'edit'])->name('setting.edit');
      Route::put('setting/{id}', [SettingController::class, 'update'])->name('setting.update');
      // profile
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
      Route::resource('direksi', DireksiController::class);
      Route::resource('komisaris', KomisarisController::class);
      Route::get('survey', [SurveyController::class, 'index'])->name('survey.index');
      Route::get('survey/{id}', [SurveyController::class, 'show'])->name('survey.show');
      // setting
      Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
      Route::get('setting/{id}/edit', [SettingController::class, 'edit'])->name('setting.edit');
      Route::put('setting/{id}', [SettingController::class, 'update'])->name('setting.update');
      // profile
      Route::get('profile', [Controller::class, 'profile'])->name('profile');
      Route::put('postprofile', [Controller::class, 'postprofile'])->name('postprofile');
    });
  });

  Route::prefix('creator')->name('creator.')->group(function(){
    Route::middleware(['auth:web', 'disable_back_button', 'compro', 'creator'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
      Route::resource('artikel', ArtikelController::class);
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
      // profile
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
  });

  Route::prefix('superadmin')->name('superadmin.')->group(function(){
    Route::middleware(['auth:web', 'disable_back_button', 'eproc', 'superadmin'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
      Route::resource('akun', AkunController::class);
      // profile
      Route::get('profile', [Controller::class, 'profile'])->name('profile');
      Route::put('postprofile', [Controller::class, 'postprofile'])->name('postprofile');
      // Berita
      Route::resource('berita', BeritaController::class);
      // Pengadaan
      Route::resource('management-pengadaan', ManagementPengadaanController::class);
    });
  });

  Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['auth:web', 'disable_back_button', 'eproc', 'admin'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
      // profile
      Route::get('profile', [Controller::class, 'profile'])->name('profile');
      Route::put('postprofile', [Controller::class, 'postprofile'])->name('postprofile');
      // Berita
      Route::resource('berita', BeritaController::class);
      // Pengadaan
      Route::resource('management-pengadaan', ManagementPengadaanController::class);
    });
  });
});