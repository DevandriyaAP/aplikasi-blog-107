<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ArtikelPublicController;
use Illuminate\Support\Facades\Route;

// Halaman Publik
Route::get('/', [ArtikelPublicController::class, 'index'])->name('publik.index');
Route::get('/artikel/{slug}', [ArtikelPublicController::class, 'show'])->name('publik.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Resource routes untuk CMS
    Route::resource('kategori-artikel', KategoriArtikelController::class);
    Route::resource('penulis', PenulisController::class);
    Route::resource('artikel', ArtikelController::class);
});

require __DIR__.'/auth.php';
