<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EprocController;
use App\Http\Controllers\ComproController;

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
    Route::get('/login', [ComproController::class, 'login'])->name('login');
    Route::post('/postlogin', [ComproController::class, 'postlogin'])->name('postlogin');
    Route::get('/logout', [ComproController::class, 'logout'])->name('logout');
  });

  Route::prefix('superadmin')->name('superadmin.')->group(function(){
    Route::middleware(['auth:web'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
    });
  });

  Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['auth:web'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
    });
  });

  Route::prefix('creator')->name('creator.')->group(function(){
    Route::middleware(['auth:web'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
    });
  });

  Route::prefix('helpdesk')->name('helpdesk.')->group(function(){
    Route::middleware(['auth:web'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
    });
  });
});

Route::prefix('eproc')->name('eproc.')->group(function(){
  Route::middleware(['web'])->group(function(){
    Route::get('/login', [EprocController::class, 'login'])->name('login');
    Route::post('/postlogin', [EprocController::class, 'postlogin'])->name('postlogin');
    Route::get('/logout', [EprocController::class, 'logout'])->name('logout');
  });

  Route::prefix('superadmin')->name('superadmin.')->group(function(){
    Route::middleware(['auth:web'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
    });
  });

  Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['auth:web'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
    });
  });
});