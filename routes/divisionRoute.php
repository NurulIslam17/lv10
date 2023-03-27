<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisionController;

Route::get('/', [DivisionController::class, 'index'])->name('index');
Route::get('create', [DivisionController::class, 'create'])->name('create');
Route::post('store', [DivisionController::class, 'store'])->name('store');
Route::post('update/{division}', [DivisionController::class, 'update'])->name('update');
// Route::post('delete/{division}', [DivisionController::class, 'delete'])->name('delete');
