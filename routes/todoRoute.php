<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoAppController;

Route::controller(TodoAppController::class)->group(function () {
    Route::get('todo/app', 'index')->name('index');
    Route::post('todo/add', 'store')->name('store');
    Route::get('todo/status/{id}', 'changeStatus')->name('change.status');
});
