<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Shipping;
use Illuminate\Http\Request;

class CityController extends Controller
{
    //

    public function index(){
        $Cities=City::orderBy('id','DESC')->paginate(5);
        return view('city.index',
        ['Cities'=>$Cities,'title'=>'Cities','subtitle'=>'List of Cities']);
      }

      public function add(Request $request){
        if($request->isMethod('GET')){
        return view('city.add',['title' => 'Cities','subtitle'=>'Add Cities']);
        }
        elseif($request->isMethod('POST')){
            $validatedData =$request->validate([
                'name' => ['required', 'unique:cities'],

            ]);
            if (!$validatedData) {
                return redirect()->back()
                            ->withErrors($validatedData)
                            ->withInput();
            }
           City::create($validatedData);
           session()->flash('success', 'City Created Successfully!');
          return  redirect()->route('cities.index');
        }
    }
    public function edit(Request $request){
        $city=  City::find($request->id);
        if($request->isMethod('GET')){

        return view('city.edit',['city'=>$city,'title' => 'Cities','subtitle'=>'Edit City']);
        }
        elseif($request->isMethod('POST')){
          $validator=$request->validate([
           'name'=>['required','unique:cities,name,'.$city->id]
                              ]);
           if(!$validator){
                 return redirect()->back()->withErrors($validator)->withInput();

                         }

            $city->update($validator);
           session()->flash('success', 'City Updated Successfully!');
           return  redirect()->route('cities.index');
        }
    }
    public function destroy($id){
        $city=City::find($id);
        try{
        $city->delete();
       session()->flash('success', 'City Deleted Successfully!');
        return redirect()->back();
    }
        catch(\Exception $e){
            session()->flash('error', 'Error While Deleting');
           return redirect()->back();
        }
    }
    public function shipping_by_city($id){
        $shippings=Shipping::where('city_id',$id)->paginate(10);
        return view('city.city_shippings',['title' => 'City','subtitle'=>'shippings','shippings'=>$shippings]);

        }



}
