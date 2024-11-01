<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\PasswordController;

Route::prefix('/v1')->group(function() {
  Route::get('/password', [PasswordController::class, 'all']);
  Route::post('/password', [PasswordController::class, 'create']);
  Route::put('/password/{id}', [PasswordController::class, 'update']);
  Route::delete('/password/{id}', [PasswordController::class, 'delete']);
});
