<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Artist extends Model
{
    protected $table = 'artist';
    public $timestamps = false;

public function concert(){
    return $this->belongsTo('App\Concert');
}



    public static function artistCheck( $id, Request $request)
    {
        $artistQuery = Artist::where('id', $id)->where('concert_id', $request->session()->get("concertId"));
        $artistNum = $artistQuery->count();

        if ($artistNum == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}
