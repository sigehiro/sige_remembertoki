<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\GroupPosted;
use App\Group;
use App\GroupChatMessage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class GroupMessageController extends Controller
{
    public function create(Request $request)
    {
        $post = new GroupChatMessage();
        $post->group_id = $request->group_id;
        $post->text = $request->text;
        $post->user_id = Auth::user()->id;
        $post->sent_time = Carbon::now();



        $post->save();
        // $a = GroupChatMessage::where('id', $post->id)->with('user')->first();
        // $a->user = null;
        // event(new GroupPosted($a));
        event(new GroupPosted($post));

        return response()->json(['message' => '投稿しました。']);
    }
    public function getDetail(Request $request)
    {
        $userDetail = GroupChatMessage::where('id', $request->id)->with('user')->first();

        return response()->json([$userDetail]);

    }
}
