<?php

use App\Http\Controllers\Api\MakesListController;
use App\Http\Controllers\Api\ReportStolenController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('makes/search', [MakesListController::class, 'search']);
Route::get('report/export', [ReportStolenController::class, 'export']);
Route::apiResource('report', ReportStolenController::class);
