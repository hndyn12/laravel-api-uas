<?php

use App\Http\Controllers\Api\SavingController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::get('/test', function () {
        return view('welcome');
    });
});