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
        $items = Time::simplePaginate(1);
        $pages = Time::paginate(5);
        $param = ['items' => $items,'pages' => $pages];
        return view('date',$param);
    }
}


