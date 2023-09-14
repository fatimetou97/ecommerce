<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable=['name'];

    public function shippings(){
        return $this->hasMany(Shipping::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
