<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderOption extends Model
{
    use HasFactory;

    protected $fillable=['order_item_id','attribute_options_id'];
    public function order_item()
    {
        return $this->belongsTo(OrderItem::class);
    }
    public function attribute_option(){

        return $this->belongsTo(AttributeOption::class);
    }
}
