<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function index()
    {
        return view("auth.login");
    }
    public function store()
    {
        $attributes = request()->validate([
            "email" => ["required", "string", "email"],
            "password" => ['required']
        ]);
        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages(['email' => "Sorry, Email does not exist", "password" => "This Password is inncorrect"]);
        }
        request()->session()->regenerate();
        return redirect('/todos');
    }
    public function destory(){
        Auth::logout();
        return redirect('/');
    }
}
