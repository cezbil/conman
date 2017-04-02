<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Ticket extends Model
{
    protected $table = 'ticket';
    public $timestamps = false;

    public function concert(){
        return $this->belongsTo('App\Concert');
    }



    public static function ticketCheck( $id, Request $request)
    {
        $ticketQuery = Ticket::where('id', $id)->where('concert_id', $request->session()->get("concertId"));
        $ticketNum = $ticketQuery->count();

        if ($ticketNum == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}
