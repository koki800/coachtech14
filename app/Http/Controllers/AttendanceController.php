<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Time;
use App\Models\User;

class AttendanceController extends Controller
{   
    //ログインフォーム入力後
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
    //出勤時間打刻
    public function work_start(Request $request){
        $form = $request -> all();
        Time::create($form);
        return redirect('/');
    }
    //退勤時間打刻
    public function work_finish(Request $request){
        $form = $request -> all();
        Time::create($form);
        return redirect('/');
    }

    //date
    public function date(){
        $items = Time::simplePaginate(1);
        return view('date', ['items' => $items]);
    }
}
