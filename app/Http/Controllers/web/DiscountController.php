<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiscountController extends Controller
{
     public function index(){
       $discounts=Discount::orderBy('id','DESC')->paginate(5);
        return view('discount.index',
        ['discounts'=>$discounts,'title'=>'Discounts','subtitle'=>'List of Discounts']);
      }
    public function add(Request $request){
        if($request->isMethod('GET')){
        return view('discount.add',['title' => 'Discounts','subtitle'=>'Add Discount']);
        }
        elseif($request->isMethod('POST')){
            $validatedData =$request->validate([
                'code' => ['required'],
                'type' => ['required'],
                'discount' => ['required'],
                'expired_date' => ['required'],

            ]);
            if (!$validatedData) {
                return redirect()->back()
                            ->withErrors($validatedData)
                            ->withInput();
            }

           discount::create($validatedData);
           session()->flash('success', 'Discount Created Successfully!');
          return  redirect()->route('discounts.index');
        }
    }
    public function edit(Request $request){
        $discount=  discount::find($request->id);
        if($request->isMethod('GET')){

        return view('discount.edit',['discount'=>$discount,'title' => 'Discounts','subtitle'=>'Edit Discount']);
        }
        elseif($request->isMethod('POST')){
          $validator=$request->validate([
            'code' => ['required'],
            'type' => ['required'],
            'discount' => ['required'],
            'expired_date' => ['required'],
                              ]);
           if(!$validator){
                 return redirect()->back()->withErrors($validator)->withInput();

                         }

            $discount->update($validator);
           session()->flash('success', 'Discount Updated Successfully!');
           return  redirect()->route('discounts.index');
        }
    }

    public function destroy($id){
        $discount=discount::find($id);
        try{
        $discount->delete();
       session()->flash('success', 'Discount Deleted Successfully!');
        return redirect()->back();
    }
        catch(\Exception $e){
            session()->flash('error', 'Error While Deleting');
           return redirect()->back();
        }
    }

}

