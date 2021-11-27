<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //ログインしていなければ、ログイン画面表示
    public function login(Request $request){
        $ses = $request->session()->get('txt');
        if($ses != null){
            $text = Auth::user()->name ;
            return view('stamp', ['text' => $text]);
        } else {
            return view('login', ['text' => ""]);
        }
    }

    public function loginview(){
        return view('login', ['text' => ""]);
    }
}
