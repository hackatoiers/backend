<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\Auditing\AuditingController;


Route::get('users/search', [UserController::class, 'search']);
Route::get('/audits', [AuditingController::class, 'index']);
Route::get('/audits/{id}', [AuditingController::class, 'show']);
Route::get('/audits/model/{model}', [AuditingController::class, 'forModel']);


Route::apiResource('users', UserController::class);

Route::post('auth/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('auth/logout', [AuthController::class, 'logout']);
    Route::get('auth/me', [AuthController::class, 'me']);
});

Route::apiResource('collections', CollectionController::class);
Route::apiResource('conservation-actions', ConservationActionController::class);
Route::apiResource('ethnic-groups', EthnicGroupController::class);
Route::apiResource('items', ItemController::class);
Route::apiResource('materials', MaterialController::class);
Route::apiResource('location', LocationController::class);
Route::apiResource('material', MaterialController::class);
Route::apiResource('photos', PhotoController::class)->only(['store', 'show', 'destroy']);
Route::apiResource('reserves', ReserveController::class)->only(['store', 'index', 'show', 'destroy']);
Route::apiResource('material-subtypes', MaterialSubtypeController::class);
