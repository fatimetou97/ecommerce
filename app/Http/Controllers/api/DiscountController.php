<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller {

 public function index(){
       $discounts=Discount::get();
    return response()->json($discounts, 200);

 }

 public function discount_code(Request $request){

    $discount=Discount::firstWhere('code','=',$request->code);
    if (!isset($discount)) {
        return response()->json("", 200);
    } else {
        return response()->json($discount, 200);
    }



}

}
