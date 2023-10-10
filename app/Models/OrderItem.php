<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable=['price','quantity','product_id','order_id'];
    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
    public function product(){

        return $this->belongsTo(Product::class);
    }

    public function order_options(){
        return $this->hasMany(OrderOption::class);
    }
}
