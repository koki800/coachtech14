<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rest;

class RestController extends Controller
{   
    //休憩開始
    public function rest_start(Request $request){
        $form = $request -> all();
        Rest::create($form);
        return redirect('/');
    }
    //休憩終了
    public function rest_finish(Request $request){
        $form = $request -> all();
        Rest::create($form);
        return redirect('/');
    }
}
