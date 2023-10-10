<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable=['subtotal','total','currency','mobile','customer_id','city_id','shipping_id','discount_id','status','firstname','lastname','email','note'];
    public function customer(){
        return $this->BelongsTo(Customer::class);
    }
    public function discount(){
        return $this->BelongsTo(Discount::class);
    }
    public function city(){
        return $this->BelongsTo(City::class);
    }
    public function shipping(){
        return $this->BelongsTo(Shipping::class);
    }
    // public function products()
    // {
    //     return $this->belongsToMany(Product::class);
    // }
    public function order_items(){
        return $this->hasMany(OrderItem::class);
     }
}
