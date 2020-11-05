<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserGroup extends Model
{

    use softDeletes;

    public static function getAttendGroup(int $user_id)
    {

        $attendGroups = UserGroup::where('user_id', $user_id)->get();

        return $attendGroups;
    }

    //user_group は group に依存してますよ って書いてる
    public function group()
    {
        return $this->belongsTo('App\Group');
    }
}
