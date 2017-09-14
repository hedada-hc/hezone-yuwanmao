<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LotterUser extends Model
{
    protected $fillable = ["user_id","lotters_id","game_type","lotter_num"];
}
