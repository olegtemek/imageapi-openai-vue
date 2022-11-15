<?php

use App\Http\Controllers\api\ImageController;
use App\Http\Controllers\api\WordController;
use Illuminate\Http\Request;
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

Route::post('/store-words', [WordController::class, 'store']);
Route::get('/get-words', [WordController::class, 'index']);
Route::get('/get-images', [ImageController::class, 'index']);
