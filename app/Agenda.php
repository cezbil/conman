<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Agenda extends Model
{
    protected $table = 'agenda';
    public $timestamps = false;

    const DONE = 1;
    const TODO = 2; //not yet started
    const INPROG = 0; // in progress


    public function concert(){
        return $this->belongsTo('App\Concert');
    }

    public static function agendaCheck($id, Request $request)
    {
        $agendaQuery = Agenda::where('id', $id)->where('concert_id', $request->session()->get("concertId"));
        $agendaNum = $agendaQuery->count();

        if ($agendaNum == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
