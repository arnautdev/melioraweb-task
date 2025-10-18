<?php

use App\Http\Middleware\LogApiRequests;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdScriptTaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum', LogApiRequests::class])->group(function () {
    Route::post('/add-scripts', [AdScriptTaskController::class, 'store'])->name('add-scripts');
    Route::post('/add-scripts/{id}/result', [AdScriptTaskController::class, 'result'])->name('ad-scripts.result');
});
