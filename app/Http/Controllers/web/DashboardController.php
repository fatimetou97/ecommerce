<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Customer;
use App\Models\Order;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    //

    public function index(){
        $now=  carbon::now()->format('Y-m-d');
        $onemonth=  carbon::now()->subMonths(1)->format('Y-m-d');
        $oneyear=  carbon::now()->subMonths(12)->format('Y-m-d');
        $customers=Customer::count();
        $users=User::count();
        if(count(Order::get())!=0){
            $currency=Order::first()->currency;
        }
        else{
            $currency='';
        }


        $orders = Order::whereDate('created_at','>=',$onemonth)->get();
        $orders_now = Order::whereDate('created_at',$now)->get();
        $total_orders_month = Order::whereDate('created_at','>=',$onemonth)->count();
        $total_orders_today = Order::whereDate('created_at',$now)->count();
        $total = Order::count();
        $cities=City::get();
        $orders_month_cancelled = Order::where('status','canceled')->whereDate('created_at','>=',$onemonth)->count();
        $orders_now_cancelled = Order::where('status','canceled')->whereDate('created_at',$now)->count();
        $orders_year_cancelled = Order::where('status','canceled')->whereDate('created_at','>=',$oneyear)->count();

        $orders_month_delivered = Order::where('status','delivered')->whereDate('created_at','>=',$onemonth)->count();
        $orders_now_delivered = Order::where('status','delivered')->whereDate('created_at',$now)->count();
        $orders_year_delivered = Order::where('status','delivered')->whereDate('created_at','>=',$oneyear)->count();

        $orders_month_ordered = Order::where('status','ordered')->whereDate('created_at','>=',$onemonth)->count();
        $orders_now_ordered = Order::where('status','ordered')->whereDate('created_at',$now)->count();
        $orders_year_ordered = Order::where('status','ordered')->whereDate('created_at','>=',$oneyear)->count();
        return view('dashboard',
         ['title' => 'Dashboard',
         'subtitle'=>'Dashboard',
         'orders'=>$orders->sum('total'),
         'orders_now'=>$orders_now->sum('total'),
         'total_orders_month'=>$total_orders_month,
         'total_orders_today'=>$total_orders_today,
         'total'=>$total,
         'cities'=>$cities,
         'orders_month_cancelled'=>$orders_month_cancelled,
         'orders_now_cancelled'=>$orders_now_cancelled,
         'orders_year_cancelled'=>$orders_year_cancelled,
         'orders_month_delivered'=>$orders_month_delivered,
         'orders_now_delivered'=>$orders_now_delivered ,
         'orders_year_delivered'=>$orders_year_delivered ,
         'orders_month_ordered'=>$orders_month_ordered,
         'orders_now_ordered'=>$orders_now_ordered ,
         'orders_year_ordered'=>$orders_year_ordered ,
         'currency'=>$currency,
         'users'=>$users,
         'customers'=>$customers]);

    }

}
