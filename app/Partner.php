<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Partner extends Model
{
    protected $table = 'partner';
    public $timestamps = false;


    public function concert(){
        return $this->belongsTo('App\Concert');
    }



    public static function partnerCheck( $id, Request $request)
    {
        $partnerQuery = Partner::where('id', $id)->where('concert_id', $request->session()->get("concertId"));
        $partnerNum = $partnerQuery->count();

        if ($partnerNum == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
