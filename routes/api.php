<?php

use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProgramBugReportController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('programs', ProgramController::class);
    Route::post('programs/{program}/bug-reports',[ProgramBugReportController::class, 'store']);
});
