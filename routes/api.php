<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('/show', BookController::class);
Route::apiResource('/store', BookController::class);
// Route::put('/update/{$id}', [BookController::class, 'update']);


Route::put('update/{id}', [BookController::class, 'update']);
Route::delete('delete/{id}', [BookController::class, 'destroy']);