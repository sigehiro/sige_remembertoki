<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Group;
use App\Event;
use App\UserGroup;
use Carbon\Carbon;

// use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $groups = Group::with('user')->get();
        $events = Event::with('genre')->with('user')->get();
        // $userNum = UserGroup::where('group_id', $id)->count();

        return view('home.index', compact('events', 'groups'));
    }
    public function thanks()
    {
        return view('home.thanks', ['id' => 0]);
    }

    public function storeDefaultImg(){

        $user = Auth::user();
        $Num = rand(1,3);
         $img = Storage::disk('local')->get('public/icons/irasutoya' . $user->gender * $Num . '.png');
        $data = base64_encode($img);
        $user->img = "data:image/png;base64," . $data;

        $user->save();

        return redirect()->route('get.chat.index',[
            'id' => 0
        ]);
    }

    public function storeDetail(Request $request)
    {
        $user = Auth::user();
        $user->img = $request->base64;
        $user->intro = $request->intro;


        //DBに保存
        $user->save();

        //chat.index.phpに帰る
        $groups = Group::all();
        return redirect()->route('post.chat.index');
    }

}
