<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\LocalizacaoController;
use App\Http\Controllers\Api\ColecaoController;
use App\Http\Controllers\Api\AcoesConservacaoController;
use App\Http\Controllers\Api\MateriaisController;
use App\Http\Controllers\Api\SubtipoController;

Route::get('users/search', [UserController::class, 'search']);
Route::apiResource('users', UserController::class);

Route::post('auth/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('auth/logout', [AuthController::class, 'logout']);
    Route::get('auth/me', [AuthController::class, 'me']);
});

Route::apiResource('locations', LocalizacaoController::class);
Route::apiResource('colections', ColecaoController::class);
Route::apiResource('conserve-actions', AcoesConservacaoController::class);
Route::apiResource('materials', MateriaisController::class);
Route::apiResource('subtypes', SubtipoController::class);
