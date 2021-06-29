<?php

use App\Http\Controllers\ProductController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/create-product', [ProductController::class,'createData']);
Route::get('/get-product/{id}', [ProductController::class,'getData']);
Route::get('/get-all-product', [ProductController::class,'getAllData']);
Route::get('/search-product', [ProductController::class,'searchData']);

Route::patch('/update-product/{id}',[ProductController::class,'updateData']);

Route::delete('/delete-product/{id}',[ProductController::class,'deleteData']);