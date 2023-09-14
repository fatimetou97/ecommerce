<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    //

    public function index(){
        $shippings=Shipping::orderBy('id','DESC')->paginate(5);
        return view('shipping.index',
        ['shippings'=>$shippings,'title'=>'Shippings','subtitle'=>'List of Shippings']);
      }

      public function add(Request $request){
        $Cities=City::get();
        if($request->isMethod('GET')){
        return view('shipping.add',
        [
            'cities'=>$Cities,
            'title' => 'Shipping','subtitle'=>'Add Shipping']);
        }
        elseif($request->isMethod('POST')){
            $validatedData =$request->validate([
                'name' => ['required'],
                'price' => ['required'],
                'city_id' => ['required'],

            ]);
            if (!$validatedData) {
                return redirect()->back()
                            ->withErrors($validatedData)
                            ->withInput();
            }

           Shipping::create($validatedData);
           session()->flash('success', 'Shipping Created Successfully!');
          return  redirect()->route('shippings.index');
        }
    }
    public function edit(Request $request){
        $shipping=Shipping::find($request->id);
        $cities=City::get();
        if($request->isMethod('GET')){

        return view('shipping.edit',

        [ 'shipping'=>$shipping,
        'cities'=>$cities,
        'title' => 'Shipping',

        'subtitle'=>'Edit Shipping']);
        }
        elseif($request->isMethod('POST')){
          $validator=$request->validate([

           'name'=>['required'],
           'price' => ['required'],
           'city_id' => ['required'],
                              ]);
           if(!$validator){
                 return redirect()->back()->withErrors($validator)->withInput();

                         }

            $shipping->update($validator);
           session()->flash('success', 'Shipping Updated Successfully!');
           return  redirect()->route('shippings.index');
        }
    }
    public function destroy($id){
        $city=Shipping::find($id);
        try{
        $city->delete();
       session()->flash('success', 'Shipping Deleted Successfully!');
        return redirect()->back();
    }
        catch(\Exception $e){
            session()->flash('error', 'Error While Deleting');
           return redirect()->back();
        }
    }


}
