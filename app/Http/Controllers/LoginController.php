<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Time;
use App\Models\User;
use App\Models\Rest;

class LoginController extends Controller
{
    //ログインしていなければ、ログイン画面表示
    public function login(Request $request){
        $ses = $request->session()->get('txt');
        if($ses != null){
            $text = Auth::user()->name ;

            $user_id = User::where('name',$text)->get('id');

            $time_id = Time::where('user_id',$user_id)->get('id');

            $rest_id = Rest::where('time_id',$time_id)->get('id');

            $param = [
            'text' => $text,
            'time_id' => $time_id,
            'rest_id' => $rest_id,
            ];

            return view('stamp', $param);
        } else {
            return view('login', ['text' => ""]);
        }
    }

    //リンクからログイン画面表示
    public function login_view(){
        return view('login', ['text' => ""]);
    }

    //ログインフォーム入力後
    public function stamp_view(LoginRequest $request){
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email,
            'password' => $password])) {
        //認証成功
        $text = Auth::user()->name ;

        //users(id)取得
        $user_id = User::where('name',$text)->get('id');

        //time(id)取得
        $time_id = Time::where('user_id',$user_id)->get('id');

        //rest(id)取得
        $rest_id = Rest::where('time_id',$time_id)->get('id');

        $txt = $request->input;
        $request->session()->put('txt',$txt);

        $param = [
            'text' => $text,
            'time_id' => $time_id,
            'rest_id' => $rest_id,
        ];

        //勤怠画面表示
        return view('stamp', $param);
        } else {
        //認証失敗
        $text = 'ログインに失敗しました';
        return view('login',['text' => $text]);
        }
    }
}
