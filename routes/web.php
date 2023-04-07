<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DevosiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PembelajaranController;
use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Route;

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

    Route::group(['prefix' => '/'], function() {
        Route::get('/', [LoginController::class, 'indexSiswa'])->name('index.siswa');
        Route::post('/', [LoginController::class, 'loginSiswa'])->name('login.siswa');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    
        Route::group(['prefix' => 'guru'], function() {
            Route::get('/', [LoginController::class, 'indexGuru'])->name('index.guru');
            Route::post('/', [LoginController::class, 'loginGuru'])->name('login.guru');
        });
    });
    
    Route::group(['prefix' => 'home'], function() {
        Route::get('/', [HomeController::class, 'index'])->name('index.home');
    });
    
    Route::group(['prefix' => 'devosi'], function() {
        Route::get('/', [DevosiController::class, 'index'])->name('devosi.index');
        Route::get('/showDevosiDate', [DevosiController::class, 'showDevosiDate'])->name('devosi.showDevosiDate');
        Route::group(['middleware' => 'guru'], function() {
            Route::get('/create', [DevosiController::class, 'create'])->name('devosi.create');
            Route::post('/create', [DevosiController::class, 'store'])->name('devosi.store');
            Route::post('/destroy/{id}', [DevosiController::class, 'destroy'])->name('devosi.destroy');
            Route::get('/edit/{id}', [DevosiController::class, 'edit'])->name('devosi.edit');
            Route::post('/update/{id}', [DevosiController::class, 'update'])->name('devosi.update');
        });
    });
    
    Route::group(['prefix' => 'pembelajaran'], function() {
        Route::get('/', [PembelajaranController::class, 'index'])->name('pembelajaran.index');
        Route::post('/materi', [PembelajaranController::class, 'showMateri'])->name('pembelajaran.materi');
        Route::get('/materi/{materi}', [PembelajaranController::class, 'showIsiMateri'])->name('pembelajaran.showIsiMateri');
        Route::group(['middleware' => 'guru'], function() {
            Route::get('/create', [PembelajaranController::class, 'create'])->name('pembelajaran.create');
            Route::post('/create', [PembelajaranController::class, 'store'])->name('pembelajaran.store');
            Route::get('/edit/{id}', [PembelajaranController::class, 'edit'])->name('pembelajaran.edit');
            Route::post('/update/{id}', [PembelajaranController::class, 'update'])->name('pembelajaran.update');
            Route::post('/destroy/{id}', [PembelajaranController::class, 'destroy'])->name('pembelajaran.destroy');
        });
    });

    Route::group(['prefix' => 'tugas'], function() {
        Route::get('/{id}', [TugasController::class, 'index'])->name('tugas.index');
        Route::get('/detailTugas/{judul}', [TugasController::class, 'detailTugas'])->name('tugas.detailTugas');
        Route::post('/submitTugas', [TugasController::class, 'submitTugas'])->name('tugas.submitTugas');
        Route::group(['middleware' => 'guru'], function() {
            Route::post('/penilaian/{id}', [TugasController::class, 'penilaian'])->name('tugas.penilaian');
            Route::post('/store', [TugasController::class, 'store'])->name('tugas.store');
        });
    });
