<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    protected $fillable =array('date','time','home_team_id','away_team_id', 'is_finish');

    public function home_team()
    {
        return $this->belongsTo('\App\Team', 'home_team_id');
    }

    public function away_team()
    {
        return $this->belongsTo('\App\Team', 'away_team_id');
    }

    public function match()
    {
        return $this->hasMany('\App\Match');
    }
}