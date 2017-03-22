<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Client extends Model
{
    protected $table = 'client';
    public $timestamps = false;


    public function concert(){
        return $this->belongsTo('App\Concert');
    }



    public static function clientCheck( $id, Request $request)
    {
        $clientQuery = client::where('id', $id)->where('concert_id', $request->session()->get("concertId"));
        $clientNum = $clientQuery->count();

        if ($clientNum == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}
