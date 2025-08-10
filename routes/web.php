<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChattingController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\MeetingRoomController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/save', [AuthController::class, 'save']);
    Route::get('/login', [AuthController::class, 'login_form'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/', [ChattingController::class, 'index']);
    Route::get('/chatting/show/{id}', [ChattingController::class, 'show']);
});
