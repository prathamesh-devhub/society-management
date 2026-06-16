<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MemberApiController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/members', MemberApiController::class)->names('api.members');
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);

?>