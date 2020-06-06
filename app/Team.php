<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \App\Schedule;

class Team extends Model{
    use SoftDeletes;
    protected $fillable = ['name', 'logo', 'year', 'address', 'city'];

    public function home()
    {
        return $this->hasMany(Schedule::class,'home');
    }

    public function away()
    {
        return $this->hasMany(Schedule::class,'away');
    }

    public function otherTeam()
    {
        if($this->home->id == $this->id) {
            return $this->home;

        }
        return $this->away;
    }
}