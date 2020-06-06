<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Match extends Model
{
    protected $fillable = array('scores', 'player_id', 'team_id', 'goal_time', 'schedule_id');

    public function player()
    {
        return $this->belongsTo('\App\Player');
    }

    public function schedule()
    {
        return $this->belongsTo('\App\Schedule');
    }
}
