<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $fillable=['id','code','type','discount','expired_date'];



    public function setCodeAttribute($value){

        $this->attributes['code']="#".rand(0, 99999).$value;

    }
}
