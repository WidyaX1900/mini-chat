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
    
    // Chat Routes
    Route::get('/chatting/show/{id}', [ChattingController::class, 'show']);
    Route::post('/chatting/send', [ChattingController::class, 'send']);
    Route::get('/chatting/get_messages', [ChattingController::class, 'get_messages']);
});
