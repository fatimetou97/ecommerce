<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index(){
        return view('users.index',['title' => 'users','subtitle'=>'List of Users']);
    }
}
