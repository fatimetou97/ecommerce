<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Hash;
use Illuminate\Http\Request;
use Validator;

class CustomerController extends Controller
{


public function register(Request $request){
    $rules = array(
        'first_name' => ['required'],
        'last_name' => ['required'],
        'email'=>['email','nullable','unique:customers'],
        'phone' => ['required','unique:customers'],
        'password' => ['required','min:8'],
    );
    $messages = array(
        'required'            => ':attribute is required.',
        'unique'              => ':attribute is unique.',
    );
    $validator = Validator::make($request->all(), $rules,$messages);
    if ($validator->fails()) {
        return response()->json(['success'=>false,'message'=>"Validator Errors",'error'=>$validator->errors()], 200);

    }

    else {

           $customer= Customer::create($request->all());
           $token=$customer->createToken($request->phone)->plainTextToken;
            return response()->json(
                ['success'=>true,'message'=>"You Are Successfully Registered",
                'first_name'=>$customer->first_name,
                'last_name'=>$customer->last_name,
                     'mobile'=>$customer->phone,
                        'token'=>$token], 200);





    }




}
public function login(Request $request){
    $customer=Customer::where('email',$request->user)->orWhere('phone',$request->user)->first();

    if($customer && Hash::check($request->password,$customer->password)){
        $token=$customer->createToken($request->token)->plainTextToken;
        return response()->json(
            ['success'=>true,
            'message'=>"Successfully Logged In",
            'first_name'=>$customer->first_name,
            'last_name'=>$customer->last_name,
            'mobile'=>$customer->phone,
            'token'=>$token], 200);
    }
    else{
        return response()->json(['success'=>false], 200);
    }


}

}
