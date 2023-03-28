<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantController;


Route::get('/', [ApplicantController::class, 'index'])->name('index');
Route::post('/store', [ApplicantController::class, 'store'])->name('store');
