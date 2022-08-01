<?php

use App\Http\Controllers\Api\BlogControllerApi;
use App\Http\Controllers\Api\CartControllerApi;
use App\Http\Controllers\Api\CheckoutControllerApi;
use App\Http\Controllers\Api\PostControllerApi;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/post', PostControllerApi::class);
Route::apiResource('/blog', BlogControllerApi::class);
Route::apiResource('/cart', CartControllerApi::class);
Route::apiResource('/checkout', CheckoutControllerApi::class);
