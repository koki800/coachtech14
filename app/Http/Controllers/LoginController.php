<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Time;
use App\Models\User;
use App\Models\Rest;
use Carbon\Carbon;

class LoginController extends Controller
{
    //ログインしていなければ、ログイン画面表示
    public function login(Request $request){
        $ses = $request->session()->get('txt');
        if($ses != null){
            $user_name = Auth::user()->name ;

            $user_id = User::where('name',$user_name)->get('id');

            $time_id = Time::where('user_id',$user_id)->get('id');

            $rest_id = Rest::where('time_id',$time_id)->get('id');

            $param = [
            'user_name' => $user_name,
            'time_id' => $time_id,
            'rest_id' => $rest_id,
            ];

            return view('index', $param);
        } else {
            return redirect('/login');
        }
    }

    //リンクまたは会員登録後にログイン画面表示
    public function login_view(){
        $text1 = '';
        $text2 = '';
        $param = [
            'text1' => $text1,
            'text2' => $text2,
        ];
        return view('login', $param);
    }

    //ログインフォーム入力後
    public function index_view(LoginRequest $request){
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email,
            'password' => $password])) {
        //認証成功
        $txt = $request->input;
        $request->session()->put('txt',$txt);

        $user_name = Auth::user()->name ;
        
        //users(id)取得
        $user_id = User::where('name',$user_name)->get('id');


        $date = Carbon::now()->format("Y-m-d");
        //time(id)取得
        $time_id = Time::where('user_id',$user_id)->where('date',$date)->get('id');

        if($time_id != null){
            //rest(id)取得
            $rest_id = Rest::where('time_id',$time_id)->get('id');
        }else{
            $rest_id = null;
        }

        $param = [
            'user_name' => $user_name,
            'time_id' => $time_id,
            'rest_id' => $rest_id,
        ];

        //勤怠画面表示
        return view('index', $param);
        } else {
        //認証失敗
        $text1 = 'ログインに失敗しました';
        $text2 = 'メールアドレスまたはパスワードが間違っています';
        $param = [
            'text1' => $text1,
            'text2' => $text2,
        ];
        return view('login',$param);
        }
    }
}
