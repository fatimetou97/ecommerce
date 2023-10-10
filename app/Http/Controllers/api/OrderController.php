<?php

namespace App\Http\Controllers\api;

use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderItem;
use App\Models\OrderOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //
    public function order(Request $request){


        $customer=Customer::firstWhere('phone','=',$request->order['mobile']);


          $order= Order::create($request->order);
          if (isset($customer)) {
            $order->customer_id=$customer->id;
            $order->save();
          }

          foreach ($request->items as $item) {

            $order_item=new OrderItem;
            $order_item->quantity=$item['quantity'];
            $order_item->price=$item['price'];
            $order_item->product_id=$item['product_id'];
            $order_item->order_id=$order->id;

            $order_item->save();

        foreach ($item['options'] as $value) {
            $order_options=new OrderOption;
        $order_options->order_item_id=$order_item->id;
        $order_options->attribute_options_id=$value['id'];

        $order_options->save();

     }
          }


          return response()->json(['success'=>true,'message'=>'Commandé avec succès'], 200);
        }


}
