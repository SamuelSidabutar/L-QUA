<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    $jumlahBuku = \App\Models\Buku::count();
    return view('dashboard', compact('jumlahBuku'));
})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('bukus', BukuController::class);

Route::resource('komentars', KomentarController::class);

Route::post('komentars', [KomentarController::class, 'store'])->name('komentars.store');
Route::delete('komentars/{komentar}', [KomentarController::class, 'destroy'])->name('komentars.destroy');



require __DIR__.'/auth.php';
