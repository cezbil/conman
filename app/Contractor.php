<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    protected $table = 'contractor';
    public $timestamps = false;


    public function concert(){
        return $this->belongsTo('App\Concert');
    }



    public static function contractorCheck( $id, Request $request)
    {
        $contractorQuery = contractor::where('id', $id)->where('concert_id', $request->session()->get("concertId"));
        $contractorNum = $contractorQuery->count();

        if ($contractorNum == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
