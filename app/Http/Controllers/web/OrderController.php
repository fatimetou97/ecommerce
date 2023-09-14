<?php

namespace App\Http\Controllers\web;

use App\Models\Order;
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

            return view('order.details',[
                'order'=>$order,
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
        return view('order.order_items',[
            'order'=>$order,
            'title'=>'Order Items',
            'subtitle'=>'List Order Items'
        ]);
    }
}
