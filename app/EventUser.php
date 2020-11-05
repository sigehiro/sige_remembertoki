<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    public static function getAttendEvent(int $user_id)
    {

        $attendEvents = EventUser::where('user_id', $user_id)->get();

        return $attendEvents;
    }

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
