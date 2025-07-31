<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view("auth.signup");
    }
    public function store(){
        $attributes = request()->validate([
            "name"=>["required","string","min:3,max:3"],
            "email"=> ["required","string","email"],
            "password"=> ['confirmed','required',]
        ]);
        User::create($attributes);
        return redirect('/login');
    }
}
