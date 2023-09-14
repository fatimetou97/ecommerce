<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
     public function index(){
       $customers=Customer::orderBy('id','DESC')->paginate(5);
        return view('customer.index',
        ['customers'=>$customers,'title'=>'Customers','subtitle'=>'List of Cusotmers']);
      }
    public function add(Request $request){
        if($request->isMethod('GET')){
        return view('customer.add',['title' => 'Customers','subtitle'=>'Add Customer']);
        }
        elseif($request->isMethod('POST')){
            $validatedData =$request->validate([
                'first_name' => ['required'],
                'last_name' => ['required'],
                'email'=>['email','nullable','unique:customers'],
                'phone' => ['required','unique:customers'],
                'password' => ['required','min:8'],

            ]);
            if (!$validatedData) {
                return redirect()->back()
                            ->withErrors($validatedData)
                            ->withInput();
            }
           Customer::create($validatedData);
           session()->flash('success', 'Customer Created Successfully!');
          return  redirect()->route('customers.index');
        }
    }
    public function edit(Request $request){
        $customer=  Customer::find($request->id);
        if($request->isMethod('GET')){

        return view('customer.edit',['customer'=>$customer,'title' => 'customers','subtitle'=>'Edit Ctegory']);
        }
        elseif($request->isMethod('POST')){
            $validator =$request->validate([
                'first_name' => ['required'],
                'last_name' => ['required'],
                'email'=>['email','nullable','unique:customers,email,'.$customer->id],
                'phone' => ['required','unique:customers,phone,'.$customer->id],
                'password' => ['required','min:8']

            ]);
           if(!$validator){
                 return redirect()->back()->withErrors($validator)->withInput();

                         }

            $customer->update($validator);
           session()->flash('success', 'Customer Updated Successfully!');
           return  redirect()->route('customers.index');
        }
    }

    public function destroy($id){
        $customer=Customer::find($id);
        try{
        $customer->delete();
       session()->flash('success', 'customer Deleted Successfully!');
        return redirect()->back();
    }
        catch(\Exception $e){
            session()->flash('error', 'Error While Deleting');
           return redirect()->back();
        }
    }

    public function orders_by_customer($id){
        $orders=Order::where('customer_id',$id)->orderBy('id', 'desc')->paginate(10);
        return view('customer.orders_by_customer',
        ['orders'=>$orders,
        'title'=>'customer','subtitle'=>' Orders']);

        }
}

