<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeOption;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index(){
        $attributes=Attribute::orderBy('id','DESC')->paginate(5);
         return view('attribute.index',['attributes'=>$attributes,'title'=>'Attributes','subtitle'=>'List of Attributes']);
       }
     public function add(Request $request){
         if($request->isMethod('GET')){
         return view('attribute.add',['title' => 'Attributes','subtitle'=>'Add Attribute']);
         }
         elseif($request->isMethod('POST')){
             $validatedData =$request->validate([
                 'name' => ['required', 'unique:attributes'],

             ]);
             if (!$validatedData) {
                 return redirect()->back()
                             ->withErrors($validatedData)
                             ->withInput();
             }
            Attribute::create($validatedData);
            session()->flash('success', 'Attribute Created Successfully!');
           return  redirect()->route('attributes.index');
         }
     }
     public function edit(Request $request){
         $attribute=  Attribute::find($request->id);
         if($request->isMethod('GET')){

         return view('attribute.edit',['attribute'=>$attribute,'title' => 'Attributes','subtitle'=>'Edit Attribute']);
         }
         elseif($request->isMethod('POST')){
           $validator=$request->validate([
            'name'=>['required','unique:Attributes,name,'.$attribute->id]
                               ]);
            if(!$validator){
                  return redirect()->back()->withErrors($validator)->withInput();

                          }

             $attribute->update($validator);
            session()->flash('success', 'Attribute Updated Successfully!');
            return  redirect()->route('attributes.index');
         }
     }

     public function destroy($id){
         $Attribute=Attribute::find($id);
         try{
         $Attribute->delete();
        session()->flash('success', 'Attribute Deleted Successfully!');
         return redirect()->back();
     }
         catch(\Exception $e){
             session()->flash('error', 'Error While Deleting');
            return redirect()->back();
         }
     }

     public function attribute_options($id){
        //  $products=Product::where('Attribute_id',$id)->orderBy('id', 'desc')->paginate(10);
         $attribute_options=Attribute::find($id)->attribute_options()->orderBy('id','DESC')->paginate(10);
         return view('attribute.attribute_options',
         ['title' => 'Attribute Options','subtitle'=>'List of Attribute Options',
         'attribute_options'=>$attribute_options,
        'id_attribute'=>$id
        ]);

         }



     public function add_attribute_option(Request $request,$id){
            if($request->isMethod('GET')){
                $attributes=Attribute::get();
            return view('attribute.add_attribute_option',
            ['title' => 'Attribute Option','subtitle'=>'Add Attribute Option'
            ,'attributes'=>$attributes,
            'id_attribute'=>$id

        ]);
            }
            elseif($request->isMethod('POST')){
                $validatedData =$request->validate([
                    'name' => ['required'],
                    'attribute_id'=>'required'

                ]);
                if (!$validatedData) {
                    return redirect()->back()
                                ->withErrors($validatedData)
                                ->withInput();
                }
               AttributeOption::create($validatedData);
               session()->flash('success', 'Attribute Option Created Successfully!');

              return redirect('/web/attribute_options/'.$id);
            }
        }

     public function edit_attribute_option(Request $request,$attribute_id,$id){
            $attributes=  Attribute::get();
            $attribute_option=  AttributeOption::find($id);
            if($request->isMethod('GET')){

            return view('attribute.edit_attribute_option',
            ['attribute_option'=>$attribute_option,
            'attributes'=>$attributes,
            'attribute_id'=>$attribute_id,
            'title' => 'Attribute Option','subtitle'=>'Edit Attribute Option']);
            }
            elseif($request->isMethod('POST')){
              $validator=$request->validate([
               'name'=>['required'],
               'attribute_id'=>'required'
                                  ]);
               if(!$validator){
                     return redirect()->back()->withErrors($validator)->withInput();

                             }

                $attribute_option->update($validator);
               session()->flash('success', 'Attribute Updated Successfully!');
               return  redirect()->route('attribute_options', ['id' => $attribute_id]);
            }
        }
        public function destroy_attribute_option($id){
            $Attribute=AttributeOption::find($id);
            try{
            $Attribute->delete();
           session()->flash('success', 'Attribute Option Deleted Successfully!');
            return redirect()->back();
        }
            catch(\Exception $e){
                session()->flash('error', 'Error While Deleting');
               return redirect()->back();
            }
        }


 }

