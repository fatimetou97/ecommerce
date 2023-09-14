<?php

use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\CategoryController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//categories
Route::apiResource('/categories',CategoryController::class);
Route::apiResource('/products',ProductController::class);
Route::get('/products_by_category/{id}',[ProductController::class,'products_by_category']);
Route::get('/lower_price_products',[ProductController::class,'products_price']);
Route::get('/best_selling_products',[ProductController::class,'best_sellings_products']);

