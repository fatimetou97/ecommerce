<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{



    public function index(){

        $data=City::with('shippings')->get();
        return response()->json($data, 200);
    }

}
