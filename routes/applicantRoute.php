<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantController;


Route::get('/applicant', [ApplicantController::class, 'index'])->name('index');
Route::post('/store', [ApplicantController::class, 'store'])->name('store');


Route::post('get_division_Wise_district', [ApplicantController::class, 'getDistrict']);
