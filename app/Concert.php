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
    public function agenda()
    {
        return $this->hasMany('App\Agenda');
    }
    public function advertisement()
    {
        return $this->hasMany('App\Advertisement');
    }
    public function contractor()
    {
        return $this->hasMany('App\Contractor');
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

    protected static function boot() {
        parent::boot();

        static::deleting(function($concert) { // before delete() method call this
            $concert->artist()->delete();
            $concert->client()->delete();
            // do the rest of the cleanup...
        });

    }
}
