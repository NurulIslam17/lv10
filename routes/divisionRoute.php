<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisionController;

Route::get('/', [DivisionController::class, 'index'])->name('index');
