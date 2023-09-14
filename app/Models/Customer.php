<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable=['first_name','phone','email','password','last_name'];

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function setPasswordAttribute($value): void
{
    $this->attributes['password'] = Hash::make($value);
}
}
