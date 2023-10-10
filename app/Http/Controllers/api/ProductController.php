<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\AttributeOption;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductAttribute;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{


    public function index(Request $request){
          $params=$request->params;
        $products=Product::join('categories', 'categories.id', '=', 'products.category_id')
        ->where('categories.name','LIKE',"%$params%")->
        orWhere('products.name','like',"%$params%")
        ->orWhere('products.ar_name','like',"%$params%")
        ->orWhere('products.en_name','like',"%$params%")
        ->orWhere('products.fr_name','like',"%$params%")
        ->select('products.*')
        ->paginate(10);
        return response()->json($products, 200);
    }
    public function products_by_category($id){
        $products=  Category::find($id)->products()->get();
       return response()->json($products, 200);

    }

    public function products_price(){

        $products=Product::orderBy('price','ASC')
        ->paginate(15);

        return response()->json($products, 200);

    }
    public function all_products_price(){

        $products=Product::orderBy('price','ASC')
        ->get();

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
    return response()->json($products , 200);
    }

    public function all_best_sellings_products(){
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
        ->get();
        return response()->json($products , 200);
        }
    public function category_product($id){
        $category=Product::find($id)->category->get();
        return response()->json($category[0], 200);
      }

      public function product_attributes($id){
        if(count(ProductAttribute::where('product_id',$id)->get())==0){
            return response()->json(null, 200);
        }

        $attribute_options = DB::table('products')
                  ->where('products.id', '=',$id )
                   ->leftjoin('product_attributes as pa', 'products.id', '=', 'pa.product_id')
                    ->leftjoin('attribute_options as ao', 'pa.attribute_options_id', '=', 'ao.id')
                    ->leftJoin('attributes as a','ao.attribute_id','a.id')
                    ->select('products.id','ao.name as option_name','ao.id as option_id','a.name as att_name','a.id as att_id')
                     ->get()->groupBy('att_name');

        return response()->json($attribute_options, 200);

      }


      //give it a list attribute optons of an order_items
      public function attribute_options(){

        // $attribute_options=    DB::table('orders')
        // ->where('orders.id', '=',4)
        //  ->leftjoin('order_items as oi', 'orders.id', '=', 'oi.order_id')
        //  ->leftjoin('order_options as oo', 'oi.id', '=', 'oo.order_item_id')
        //   ->leftjoin('attribute_options as ao', 'oo.attribute_options_id', '=', 'ao.id')
        //   ->leftJoin('attributes as a','ao.attribute_id','a.id')
        //   ->select('orders.id','ao.name as option_name','ao.id as option_id','a.name as att_name','a.id as att_id')
        //    ->get()->groupBy('att_name');


        $attribute_options= DB::table('orders')
                               ->where('orders.id', '=',4)
        ->leftjoin('order_items as oi', 'orders.id', '=', 'oi.order_id')
         ->leftjoin('order_options as oo', 'oi.id', '=', 'oo.order_item_id')
          ->leftjoin('attribute_options as ao', 'oo.attribute_options_id', '=', 'ao.id')
          ->leftJoin('attributes as a','ao.attribute_id','a.id')
          ->select('orders.id as order_id','oi.id as order_items_id','oo.id as order_option_id','ao.id as attribute_option_id','ao.name as attribute_option_name','a.name as att_name')
           ->get()
           ->groupBy('att_name');
        return response()->json($attribute_options, 200);

      }
}
