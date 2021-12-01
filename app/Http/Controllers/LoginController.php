<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
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

    public function login_view(){
        return view('login', ['text' => ""]);
    }

    //ログインフォーム入力後
    public function stamp_view(LoginRequest $request){
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email,
            'password' => $password])) {
        $text = Auth::user()->name ;

        $txt = $request->input;
        $request->session()->put('txt',$txt);

        return view('stamp', ['text' => $text]);
        } else {
        $text = 'ログインに失敗しました';
        return view('login',['text' => $text]);
        }
    }
}
