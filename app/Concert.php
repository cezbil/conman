<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    protected $table = 'concert';
    public $timestamps = false;

    public function client()
    {
        return $this->hasOne('App\Client');
    }
}
