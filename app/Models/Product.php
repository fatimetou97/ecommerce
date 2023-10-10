<?php

namespace App\Models;

use App\Models\OrderItem;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
     use  HasFactory,InteractsWithMedia;
    protected $fillable=['name','price','currency','description','category_id','ar_name','fr_name','en_name'];

    public function get_product_images()
    {
        $images = [];

        foreach($this->getMedia('product_images') as $file){
            $images[] = $file->getFullUrl();
        }
        if (count($images)==0) {
            $images[] ="https://rindiar.in/images/blogs/7730e2c247394eea61ef2e88d9777741.jpg";
        }
//https://e-commerce.mr/public/assets/img/shopping.jpg

        return $images;


    }
    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function attribute_options()
    {
        return $this->belongsToMany(AttributeOption::class,'product_attributes','product_id','attribute_options_id');
    }
    public function orderItem()
    {
        return $this->hasOne(OrderItem::class);
    }



}
