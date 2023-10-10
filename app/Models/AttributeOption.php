<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeOption extends Model
{
    use HasFactory;
    protected $fillable=['name','attribute_id','order_options_id'];
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function order_options(){
        return $this->hasMany(OrderOption::class);
    }
}
