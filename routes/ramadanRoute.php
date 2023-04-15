<?php

use App\Http\Controllers\Ramadan\IftarController;
use Illuminate\Support\Facades\Route;

Route::controller(IftarController::class)->group(function () {
    Route::get('/iftar', 'index')->name('index');
});
