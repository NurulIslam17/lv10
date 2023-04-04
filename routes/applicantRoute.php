<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantController;

Route::controller(ApplicantController::class)->group(function () {
    Route::get('/applicant', 'index')->name('index');
    Route::post('/store', 'store')->name('store');
    Route::get('get/district/for/division/{id}', 'getDistrict')->name('get.districts.for.division');
});
