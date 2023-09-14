<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $fillable=['name','ar_name','fr_name','en_name'];
    public function products(){
       return $this->hasMany(Product::class);
    }
    public function image()
    {
        $image = "";

        foreach($file=$this->getMedia('category_images') as $file) {
            $image= $file->getFullUrl();
        }
        if ($image=="") {
            $image ="https://rindiar.in/images/blogs/7730e2c247394eea61ef2e88d9777741.jpg";
        }

        return $image;


    }
}
