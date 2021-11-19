<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Time;
use App\Models\User;
use App\Models\Rest;

class AtteController extends Controller
{   
    //register
    public function register(Request $request){
        $form = $request -> all();
        Users::create($form);
        return view('login');
    }

    //login
    public function login(Request $request){
        $text = Auth::user()->name ;
        $ses = $request->session()->get('txt');
        if($ses != null){
            return view('stamp', ['text' => $text]);
        } else {
            return view('login');
        }
    }
    
    //stamp
    public function stamp(Request $request){
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

    public function work_start(Request $request){
        $form = $request -> all();
        Time::create($form);
        return redirect('/');
    }

    public function work_finish(Request $request){
        $form = $request -> all();
        Time::create($form);
        return redirect('/');
    }

    public function rest_start(Request $request){
        $form = $request -> all();
        Rest::create($form);
        return redirect('/');
    }

    public function rest_finish(Request $request){
        $form = $request -> all();
        Rest::create($form);
        return redirect('/');
    }

    //date
    public function date(){
        $items = Time::simplePaginate(1);
        return view('date', ['items' => $items]);
    }
}
