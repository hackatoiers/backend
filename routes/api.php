<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AuthController;
use Orion\Facades\Orion;

Route::get('users/search', [UserController::class, 'search']);
Route::apiResource('users', UserController::class);

Route::post('auth/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('auth/logout', [AuthController::class, 'logout']);
    Route::get('auth/me', [AuthController::class, 'me']);
});

Orion::resource('collections', CollectionController::class)->withoutBatch();
Orion::resource('conservation-actions', ConservationActionController::class)->withoutBatch();
Orion::resource('ethnic-groups', EthnicGroupController::class)->withoutBatch();
Orion::resource('items', ItemController::class)->withoutBatch();
Orion::resource('materials', MaterialController::class)->withoutBatch();
Orion::resource('location', LocationController::class)->withoutBatch();
Orion::resource('material', MaterialController::class)->withoutBatch();
Orion::resource('photos', PhotoController::class)->withoutBatch();
Orion::resource('material-subtypes', MaterialSubtypeController::class)->withoutBatch();