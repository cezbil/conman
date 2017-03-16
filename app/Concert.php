<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Concert extends Model
{
    protected $table = 'concert';
    public $timestamps = false;

    public function client()
    {
        return $this->hasOne('App\Client');
    }

    public function artist()
    {
        return $this->hasMany('App\Artist');
    }

    public static function concertCheck($id)
    {
        $concertsQuery = Concert::where('id', $id)->where('user_id', Auth::id());
        $concertsNum = $concertsQuery->count();

        if ($concertsNum == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
