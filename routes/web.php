<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response('OK');
});

Route::prefix('/user/{user}')->group(function() {
    Route::get('/schedule', [UserController::class, 'schedule']);
    Route::get('/questions/today', [UserController::class, 'getTodayQuestions']);
    Route::post('/questions/{question}/answer', [UserController::class, 'saveAnswer']);
});
