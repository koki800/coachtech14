<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Time;

class WorkController extends Controller
{   
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

    //日付勤怠ページ表示
    public function date(){
        $items = Time::simplePaginate(1,["*"], 'datepage');
        $users = User::paginate(5,["*"], 'userpage');
        $work_times = Time::paginate(5,["*"], 'timepage');
        $rest_times = Rest::paginate(5,["*"], 'restpage');
        $param = ['items' => $items,'users' => $users,'work_times' => $work_times,'rest_times' => $rest_times];
        return view('date',$param);
    }
}
