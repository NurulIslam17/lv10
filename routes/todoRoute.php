<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoAppController;

Route::controller(TodoAppController::class)->prefix('todo')->group(function () {
    Route::get('/app', 'index')->name('index');
    Route::post('/add', 'store')->name('store');
    Route::get('/status/{id}', 'changeStatus')->name('change.status');
    Route::get('/delete/{id}', 'delete')->name('delete');
});
