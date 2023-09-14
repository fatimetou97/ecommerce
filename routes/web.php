<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\web\AttributeController;
use App\Http\Controllers\web\CategoryController;
use App\Http\Controllers\web\CityController;
use App\Http\Controllers\web\CustomerController;
use App\Http\Controllers\web\DashboardController;
use App\Http\Controllers\web\DiscountController;
use App\Http\Controllers\web\OrderController;
use App\Http\Controllers\web\ProductController;
use App\Http\Controllers\web\ShippingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
Route::group(['prefix' => 'web', 'middleware' => ['auth']], function(){

    //Categories
    Route::apiResource('/categories',CategoryController::class);
    Route::match(['get', 'post'],'/add_category',[CategoryController::class,'add']);
    Route::match(['get', 'post'],'/edit_category/{id}',[CategoryController::class,'edit']);
    Route::get('/products_category/{id}',[CategoryController::class,'products_by_category']);
     //Products
    Route::apiResource('/products',ProductController::class);
    Route::get('/add_product',[ProductController::class,'add']);
    Route::get('/edit_product/{id}',[ProductController::class,'edit']);
    Route::post('/update_product/{id}',[ProductController::class,'update_product']);
    Route::match(['get','post'],'/product_images/{id}',[ProductController::class,'product_images']);
    Route::post('/delete_product_image',[ProductController::class,'delete_product_image']);

    //Attributes Products
    Route::get('/attributes_product/{id}',[ProductController::class,'attributes_product']);
    Route::match(['get','post'],'/add_product_attribute/{id}',[ProductController::class,'add_product_attribute']);
    Route::get('/get_attribute_values/{id}',[ProductController::class,'get_attribute_values']);
    Route::delete('/destroy_product_attribute/{id}',[ProductController::class,'destroy_product_attribute']);
    //Attributes
    Route::apiResource('/attributes',AttributeController::class);
    Route::match(['get', 'post'],'/add_attribute',[AttributeController::class,'add']);
    Route::match(['get', 'post'],'/edit_attribute/{id}',[AttributeController::class,'edit']);

      //Attribute_Options
    Route::get('/attribute_options/{id}',[AttributeController::class,'attribute_options'])->name('attribute_options');
    Route::match(['get', 'post'],'/add_attribute_option/{id}',[AttributeController::class,'add_attribute_option']);
    Route::delete('/destroy_attribute_option/{id}',[AttributeController::class,'destroy_attribute_option']);
    Route::match(['get', 'post'],'/edit_attribute_option/{attribute_id}/{id}',[AttributeController::class,'edit_attribute_option']);

     //Orders
    Route::apiResource('/orders',OrderController::class);
    Route::match(['get','post'],'/order_details/{id}',[OrderController::class,'order_details']);
    Route::get('/list_order_items/{id}',[OrderController::class,'list_order_items']);


    //cities
    Route::apiResource('/cities',CityController::class);
    Route::match(['get', 'post'],'/add_city',[CityController::class,'add']);
    Route::match(['get', 'post'],'/edit_city/{id}',[CityController::class,'edit']);
    Route::get('/shipping_by_city/{id}',[CityController::class,'shipping_by_city']);

    //shipping
    Route::apiResource('/shippings',ShippingController::class);
    Route::match(['get', 'post'],'/add_shipping',[ShippingController::class,'add']);
    Route::match(['get', 'post'],'/edit_shipping/{id}',[ShippingController::class,'edit']);


    //Customers
    Route::apiResource('/customers',CustomerController::class);
    Route::match(['get', 'post'],'/add_customer',[CustomerController::class,'add']);
    Route::match(['get', 'post'],'/edit_customer/{id}',[CustomerController::class,'edit']);
    Route::get('/orders_by_customer/{id}',[CustomerController::class,'orders_by_customer']);
    //Customers
    Route::apiResource('/discounts',DiscountController::class);
    Route::match(['get', 'post'],'/add_discount',[DiscountController::class,'add']);
    Route::match(['get', 'post'],'/edit_discount/{id}',[DiscountController::class,'edit']);

});
require __DIR__.'/auth.php';
