<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DistrictController;


Route::get('/district', [DistrictController::class, 'index'])->name('index');
