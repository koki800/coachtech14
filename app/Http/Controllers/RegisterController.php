<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    //register
    public function register(RegisterRequest $request){
        $form = $request -> all();
        User::create($form);
        return view('login', ['text' => ""]);
    }
}
