<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    use HasFactory;
    protected $table = 'rest';

    public function getRestSumAttribute()
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
