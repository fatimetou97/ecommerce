<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\CityController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\api\DiscountController;

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
//products
Route::apiResource('/products',ProductController::class);
Route::get('/products_by_category/{id}',[ProductController::class,'products_by_category']);
Route::get('/lower_price_products',[ProductController::class,'products_price']);
Route::get('/all_lower_price_products',[ProductController::class,'all_products_price']);
Route::get('/best_sellings',[ProductController::class,'best_sellings_products']);
Route::get('/all_best_sellings',[ProductController::class,'all_best_sellings_products']);
Route::get('/category_product/{id}',[ProductController::class,'category_product']);

Route::get('/product_attributes/{id}',[ProductController::class,'product_attributes']);
Route::get('/attribute_options',[ProductController::class,'attribute_options']);

//order
Route::post('/orders',[OrderController::class,'order']);

//cities
Route::get('/cities',[CityController::class,'index']);

//customers
Route::post('/register',[CustomerController::class,'register']);
Route::post('/login',[CustomerController::class,'login']);


//discount
Route::get('/discounts',[DiscountController::class,'index']);
Route::post('/discount_code',[DiscountController::class,'discount_code']);
