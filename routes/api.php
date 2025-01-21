<?php

use App\Http\Controllers\Api\GradeController;
use App\Http\Controllers\Api\SavingController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::resource('users', UserController::class);
    Route::resource('grade', GradeController::class);
    Route::resource('student', StudentController::class);
    Route::resource('saving', SavingController::class);

    Route::get('/test', function () {
        return view('welcome');
    });
});
