<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Ramadan\IftarController;
use App\Http\Controllers\Ramadan\SehariController;

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


Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('auth/register', 'register')->name('register.account');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/ profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Iftar
Route::controller(IftarController::class)->middleware('auth')->prefix('iftar')->group(function () {
    Route::get('/iftar', 'index')->name('iftar.index');
    Route::get('/bazar', 'bazarList')->name('bazar.list');
    Route::get('/create', 'crateIftar')->name('crate.iftar');
    Route::post('/store', 'storeIftar')->name('store.iftar');
    Route::get('/bazar-create', 'bazarCreate')->name('bazar.create');
    Route::post('/bazar-store', 'storeIftarBazar')->name('store.iftar.bazar');
    Route::get('/iftar/report', 'iftarReport')->name('iftar.report');
});
Route::controller(SehariController::class)->middleware('auth')->prefix('sehari')->group(function () {
    Route::get('/', 'index')->name('sehari.index');
    Route::get('/create', 'crateSehari')->name('crate.sehari');
    Route::post('/store', 'storeSehari')->name('store.sehari');
    Route::get('/bazar/list', 'bazarList')->name('sehari.bazar.list');
    Route::get('/bazar/create', 'bazarCreate')->name('sehari.create');
    Route::post('/bazar/store', 'storeSehariBazar')->name('store.sehari.bazar');
    Route::get('/report', 'sehariReport')->name('sehari.report');
});


require __DIR__ . '/auth.php';
