<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates = [
        'startTime'
    ];

    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
