<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dm extends Model
{

    //引数と同じidのユーザーの、DM相手を取ってくる
    public static function getDm(int $user_id)
    {

        $dms = Dm::where('user1_id', $user_id)->orWhere('user2_id', $user_id);

        return $dms;
    }
}
