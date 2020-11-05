<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);

        // dd($user);
        return view('setting.index', compact('user'));
    }

    public function confirmProfile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->address = $request->address;
        $user->occupation = $request->occupation;
        $user->intro = $request->intro;
        if($request->base64==''){
            $user->img ='';
        }else{
            $user->img = $request->base64;
        }

        $request->session()->put('user', $user);

        return view('setting.confirmProfile', compact('user'));
    }

    public function changeProfile(Request $request)
    {
        $user = $request->session()->get('user');

        $user->save();

        $request->session()->forget('user');

        return redirect()->route('get.chat.index',[
            'id' => 0
        ]);
    }

    public function help()
    {
        return view('setting.help');
    }

    public function confirmHelp()
    {
        //お問い合わせ内容をrequestで受け取る

        //setting/confirmHelpを返す
        return view('setting.confirmHelp');
    }

    public function sendHelp()
    {
        //お問い合わせ内容をrequestで受け取る

        //my pageへ
        return redirect()->route('chat.index');
    }
}
