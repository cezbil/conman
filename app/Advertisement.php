<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Advertisement extends Model
{
    protected $table = 'advertisement';
    public $timestamps = false;

    public function concert(){
        return $this->belongsTo('App\Concert');
    }



    public static function advertisementCheck( $id, Request $request)
    {
        $advertisementQuery = Advertisement::where('id', $id)->where('concert_id', $request->session()->get("concertId"));
        $advertisementNum = $advertisementQuery->count();

        if ($advertisementNum == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}
