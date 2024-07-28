<?php

use App\Http\Controllers\Api\RiderController;
use App\Http\Controllers\Api\SearchRiderController;
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

Route::post('store-rider-location', [RiderController::class, 'storeLocation']);
Route::get('get-riders', [SearchRiderController::class, 'getRiderByLocation']);
