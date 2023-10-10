<?php

namespace App\Http\Controllers\web;

use App\Models\Order;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){
        $orders=Order::orderBy('id','DESC')->paginate(10);
        return view('order.index',
        ['orders'=>$orders,
        'title'=>'Orders','subtitle'=>'List of Orders'
         ]);
    }

    public function order_details($id,Request $request){
        $order=Order::find($id);
        if($request->isMethod('GET')){
            $order_options= DB::table('orders')
            ->where('orders.id', '=',4)
            ->leftjoin('order_items as oi', 'orders.id', '=', 'oi.order_id')
            ->leftjoin('order_options as oo', 'oi.id', '=', 'oo.order_item_id')
            ->leftjoin('attribute_options as ao', 'oo.attribute_options_id', '=', 'ao.id')
            ->leftJoin('attributes as a','ao.attribute_id','a.id')
            ->select('orders.id as order_id','oi.id as order_items_id','oo.id as order_option_id','ao.id as attribute_option_id','ao.name as attribute_option_name','a.name as att_name')
            ->get()
             ->groupBy('att_name');
            return view('order.details',[
                'order'=>$order,
                'order_options'=>$order_options,
                'title'=>'Order',
                'subtitle'=>'Details'
            ]);
        }

        elseif($request->isMethod('POST')){

        $order->update(['status'=>$request->status]);


        session()->flash('success','Order Updated Successfully !');

        return redirect()->back();
        }
    }
    public function list_order_items($id){
        $order=Order::find($id);
        $order_options= DB::table('orders')
        ->where('orders.id', '=',4)
        ->leftjoin('order_items as oi', 'orders.id', '=', 'oi.order_id')
        ->leftjoin('order_options as oo', 'oi.id', '=', 'oo.order_item_id')
        ->leftjoin('attribute_options as ao', 'oo.attribute_options_id', '=', 'ao.id')
        ->leftJoin('attributes as a','ao.attribute_id','a.id')
        ->select('orders.id as order_id','oi.id as order_items_id','oo.id as order_option_id','ao.id as attribute_option_id','ao.name as attribute_option_name','a.name as att_name')
        ->get()
         ->groupBy('att_name');
        return view('order.order_items',[
            'order'=>$order,
            'order_options'=>$order_options,
            'title'=>'Order Items',
            'subtitle'=>'List Order Items'
        ]);
    }
}
