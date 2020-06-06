<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    protected $fillable = ['name', 'tall', 'weight', 'role', 'back_num', 'team_id'];

    public function team(){
        return $this->belongsTo('\App\Team');
    }
}
