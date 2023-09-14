<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
     public function index(){
       $categories=Category::orderBy('id','DESC')->paginate(5);
        return view('category.index',
        ['categories'=>$categories,'title'=>'Categories','subtitle'=>'List of Categories']);
      }
    public function add(Request $request){
        if($request->isMethod('GET')){
        return view('category.add',['title' => 'categories','subtitle'=>'Add Ctegory']);
        }
        elseif($request->isMethod('POST')){
            $validatedData =$request->validate([
                'name' => ['required', 'unique:categories'],
                'image'=>['required','file','mimes:jpeg,jpg,png'],
                'ar_name'=>'required',
                'fr_name'=>'required',
                'en_name'=>'required',

            ]);
            if (!$validatedData) {
                return redirect()->back()
                            ->withErrors($validatedData)
                            ->withInput();
            }

         $category=  category::create($validatedData);
           if ($image = $request->file('image')) {

            $category->addMedia($image)->toMediaCollection('category_images');

    }
           session()->flash('success', 'Category Created Successfully!');
          return  redirect()->route('categories.index');

        }
    }
    public function edit(Request $request){
        $category=  Category::find($request->id);
        if($request->isMethod('GET')){

        return view('category.edit',['category'=>$category,'title' => 'categories','subtitle'=>'Edit Category']);
        }
        elseif($request->isMethod('POST')){
          $validator=$request->validate([
           'name'=>['required','unique:categories,name,'.$category->id,
           'ar_name'=>'required',
           'fr_name'=>'required',
           'en_name'=>'required',


           ] ]);

           if(!$validator){
                 return redirect()->back()->withErrors($validator)->withInput();

                         }

            $category->update($validator);
            if ($image = $request->file('image')) {
                $category ->clearMediaCollection('category_images');
                $category->addMedia($image)->toMediaCollection('category_images');

        }
           session()->flash('success', 'Category Updated Successfully!');
           return  redirect()->route('categories.index');
        }
    }

    public function destroy($id){
        $category=Category::find($id);
        try{
        $category->delete();
       session()->flash('success', 'Category Deleted Successfully!');
        return redirect()->back();
    }
        catch(\Exception $e){
            session()->flash('error', 'Error While Deleting');
           return redirect()->back();
        }
    }

    public function products_by_category($id){
        $products=Product::where('category_id',$id)->orderBy('id', 'desc')->paginate(10);
        return view('category.products_by_category',['title' => 'Products','subtitle'=>'List of Products','products'=>$products]);

        }
}

