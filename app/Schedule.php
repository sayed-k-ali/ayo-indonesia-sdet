<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    protected $fillable =array('date','time','home','away');

    public function home()
    {
        return $this->belongsTo('\App\Team', 'home');
    }
}
