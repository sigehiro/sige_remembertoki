<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Genre;
use App\User;
use App\EventUser;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Storage;
use File;
use Illuminate\Support\Str;

class EventController extends Controller
{   public function modal()
    {
        return view('event.modalTrial');
    }


    public function index()
    {
        $user_id = Auth::user()->id;
        $events = Event::with('genre')->with('user')->get();
        $genres = Genre::all();
        $attendEvents = EventUser::where('user_id', $user_id)->get(['event_id'])->toArray();
        if(!isset($attendEvents[0])) {
            $attendEvents[0] = [];
        }
        return view('event.index', ['events' => $events, 'genres' => $genres, 'attendEventsId' => $attendEvents[0]]);
    }

    public function searchEvent(Request $request)
    {
        if($request->selected_genre==0){
            $events = Event::all();
        }else{
            $events = Event::where('genre_id', $request->selected_genre)->get();
        }
        $genres = Genre::all();

        $user_id = Auth::user()->id;
        $attendEvents = EventUser::where('user_id', $user_id)->get(['event_id'])->toArray();
        if(!isset($attendEvents[0])) {
            $attendEvents[0] = [];
        }

        return view('event.index', ['events' => $events, 'genres' => $genres, 'attendEventsId' => $attendEvents[0]]);
    }

    public function toMakeEvent()
    {
        $genres = Genre::all();
        return view('event.makeEvent', ['genres' => $genres]);
    }

    public function confirmEvent(Request $request)
    {
        $request->session()->reflash();

        $event = new Event();
        $event->name = $request->name;
        $event->genre_id = $request->genre_id;
        $event->user_id = Auth::user()->id;
        $event->intro = $request->intro;
        $event->startTime = new DateTime($request->start_date_time);
        $event->finishTime = new DateTime($request->end_date_time);
        $event->img = $request->base64;

        $genre = Genre::find($event->genre_id);

        $request->session()->put('event', $event);

        return view('event.confirm', compact('event', 'genre'));
    }

    public function makeEvent(Request $request)
    {
        $event = $request->session()->get('event');

        $event->save();

        $request->session()->forget('event');

        return redirect()->route('get.chat.index',['id' => 0]);
    }

    public function attendEvent(Request $request)
    {
        $event_User = new EventUser();

        $event_User->event_id = $request->id;
        $event_User->user_id = Auth::user()->id;

        $event_User->save();

        return redirect()->route('get.chat.index',['id' => 0]);
    }

    public function leaveEvent(Request $request)
    {
        // 退会するボタンが押されたイベントのidとログイン中のユーザーidと一致するカラムを取ってくる
        $leaveEvent = EventUser::where('event_id', $request->id)->where('user_id', Auth::user()->id);

        $leaveEvent->delete();

        return redirect()->route('get.chat.index',['id' => 0]);
    }


}
