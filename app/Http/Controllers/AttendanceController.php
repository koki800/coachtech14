<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Time;
use App\Models\User;

class AttendanceController extends Controller
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

    //date
    public function date(){
        $items = Time::simplePaginate(1);
        return view('date', ['items' => $items]);
    }
}
