<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{


    public function index(){

        $products=Product::paginate(10);

        return response()->json($products, 200);
    }
    public function products_by_category($id){
         $products=  Category::find($id)->products()->paginate(10);

        return response()->json($products, 200);
    }
    public function products_price(){

        $products=Product::orderBy('price','ASC')->paginate(10);

        return response()->json($products, 200);

    }
    public function best_sellings_products(){
    $products=  DB::table('products')
    ->select([
        'products.id',
        'products.name',
        'products.ar_name',
        'products.fr_name',
        'products.en_name',
        'products.price',
        'products.currency',
        'products.description',
        'products.status',
        DB::raw('SUM(order_items.quantity) as total_sales')
    ])
    ->join('order_items', 'order_items.product_id', '=', 'products.id')
    ->join('orders', 'order_items.order_id', '=', 'orders.id')
    ->where('orders.status','delivered')
    ->groupBy('products.id')
    ->orderByDesc('total_sales')
    ->paginate(10);

        return response()->json($products, 200);
    }
}
