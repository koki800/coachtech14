<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //register
    public function register(Request $request){
        $form = $request -> all();
        User::create($form);
        return view('login');
    }
}
