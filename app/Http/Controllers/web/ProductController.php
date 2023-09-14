<?php

namespace App\Http\Controllers\web;

use App\Http\Requests\ProductValidation;
use App\Models\Attribute;
use App\Models\AttributeOption;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index(){
        $products=Product::orderBy('id', 'desc')->paginate(5);
        return view('products.index',['title' => 'Products','subtitle'=>'List of Products','products'=>$products]);

    }
    public function add(){
        $categories=Category::get();
        return view('products.add',['categories'=>$categories,'title' => 'Products','subtitle'=>'Add Product']);

    }
    public function store(ProductValidation $productValidation){


        if(!$productValidation){
            return redirect()->back()->withErrors($productValidation)->withInput();

        }
        else{

         Product::create($productValidation->all());

         session()->flash('success',"Product Created Successfully !");
        return redirect('web/products');
        }
    }
    public function edit($id){
    $product=product::find($id);
    $categories=Category::get();
    return view('products.edit',['categories'=>$categories,'product'=>$product,'title' => 'Products','subtitle'=>'Add Product']);

      }
     public function update_product(ProductValidation $productValidation,$id){
         if(!$productValidation){
            return redirect()->back()->withErrors($productValidation)->withInput();

                   }
             $product=Product::find($id);
             $product->update($productValidation->all());
              session()->flash('success',"Product Updated Successfully !");
             return redirect('web/products');
              }
    public function destroy($id){
      $product=product::find($id);

        try{
       $product->delete();
       session()->flash('success','Product Deleted Successfuly');
       return redirect()->back();
        }
        catch(\Exception $e){
        session()->flash('error','Error While Deleting');
        return redirect()->back();
        }

    }

    public function attributes_product($id){
     // $product=ProductAttribute::where('product_id','=',$id)->get();
     $product_attributes=product::find($id)->attribute_options()->orderBy('id','DESC')->paginate(10);
     $product=product::find($id);
      return view('products.product_attributes',
      ['product_attributes'=>$product_attributes,
      'product_id'=>$id,
      'product'=>$product,
      'title' => 'Product Variations',
      'subtitle'=>'product  Variations']);

    }

    public function add_product_attribute($id,Request $request){

        $attributes=Attribute::get();
        if ($request->isMethod('GET')) {

        return view('products.add_product_attribute',
        ['attributes'=>$attributes,
        'product_id'=>$id,
        'title' => 'Product Variation',
        'subtitle'=>'Add Product Variation']);
        }
        elseif($request->isMethod('POST')){
            $validatedData =$request->validate([
                'options' => ['required'],
                'attribute_id'=>'required',

            ]);
            foreach ($request->options as  $value) {
            $pa=    ProductAttribute::where('product_id',$id)
                ->where('attribute_options_id',$value)->get();
                if(!$pa->isEmpty()){

                    $values=AttributeOption::where('attribute_id',$request->attribute)->get();

                return redirect()->back()->with(
                    [ 'exists'=> 'select only variations that doesnt exists already',
                      'values'=> $values,
                      'values_selected'=> $request->options,
                      'attribute_id'=>$request->attribute]
            );
                }
            }
            if (!$validatedData) {
                return redirect()->back()
                            ->withErrors($validatedData)
                            ->withInput();
            }

          foreach ($request->options as  $value) {

              $productAttribute=new ProductAttribute;
               $productAttribute->product_id=$id;
              $productAttribute->attribute_options_id=$value;
               $productAttribute->save();
              }
              session()->flash('success',"Product Variation Created Successfully !");
              return redirect('web/attributes_product/'.$id);

        }





    }

    public function get_attribute_values($id){

          $values=AttributeOption::where('attribute_id',$id)->get();
       return redirect()->back()->with(['values'=> $values,'attribute_id'=>$id]);
    }
    public function destroy_product_attribute($id){
        $attribute_option=AttributeOption::find($id);

          try{
         $attribute_option->delete();
         session()->flash('success','Product Variation Deleted Successfuly');
         return redirect()->back();
          }
          catch(\Exception $e){
          session()->flash('error','Error While Deleting');
          return redirect()->back();
          }

      }

      public function product_images($id,Request $request){

        $product= Product::find($id);

         if($request->isMethod('GET')){
           $images=$product->get_product_images();
          return view('products.images',[
           'title'=>'images',
           'subtitle'=>'List of Images',
            'images'=>$images,
              'id'=> $id
          ]);
         }

         elseif($request->isMethod('POST')){



             if ($images = $request->file('images')) {
                 foreach ($images as $image) {
                     $product->addMedia($image)->toMediaCollection('product_images');
                 }
             }
             session()->flash('success','Image Added Successfuly');

             return redirect()->back();

       }
 }

        public function delete_product_image(Request $request){
            $imagename=$request->imagename;
           $pr = Product::find($request->id);
            $images= $pr->media;
           foreach ($images as $productImage){
               if ($productImage->file_name==$imagename) {
                   $pr->deleteMedia($productImage);
               }
           }


         session()->flash('success', 'successfully Deleted Product Image ');
         return redirect()->back();
           }
}
