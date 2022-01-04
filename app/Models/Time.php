<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rest;

class Time extends Model
{
    use HasFactory;
    protected $table = 'time';

    public function getWorkSumAttribute()
    {   
        $start_at = "{this -> start_at}";
        $finish_at = "{this -> finish_at}";

        $fromTime = strtotime($start_at); 
        $toTime = strtotime($finish_at );

        $diff = $toTime - $fromTime; 
        $dif_time = date("H:i:s", $diff);

        return $dif_time;
    }
}

