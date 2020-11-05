@extends('layouts.app')

@section('title', 'イベント一覧')

@section('custom_css')
<link href="{{ asset('css/event.css') }}" rel="stylesheet">
@endsection

@section('content')

@include('components.header')

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="heading">参加したいイベントを見つけよう</h1><br>
        <div class="row justify-content-end my-5">
            <div class="col-4">
                <form method='get' class="form-inline" action='{{ route('event.search') }}'>
                    <select class="custom-select col-10" name="selected_genre">
                        <option value='0'>all</option>
                        @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" {{ isset($_GET['selected_genre']) && $_GET['selected_genre'] == $genre->id ? 'selected' : ''  }}>{{ $genre->name }}
                        </option>
                        @endforeach
                    </select>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary text-white text-align-center">検索</button>
                    </span>
                </form>
            </div>
            <div class="col-4">
                <a class="btn btn-success text-white" href="{{ route('event.makeEvent') }}" role="button">イベント作成画面</a>
            </div>
        </div>
    </div>

{{-- 現在進行中のイベント表示 --}}
    <div class="row">
        @foreach($events as $event)
            <div class="col-md-3 mb-3">
                <div class="card" id="highreliability">
                    <img src="{{ $event->img }}" alt="business city" class='img-fluid card-img-top'>
                    <div class="card-body">
                        <h5 class="title">{{ $event->name }}</h5>
                        <p class="card-text">{{ str_limit($event->intro, $limit = 40, $end = '…') }}</p>
                        <!-- 切り替えボタンの設定 -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-{{$event->id}}">詳細</button>
                    </div>
                </div>
                </div>

        <!-- モーダルの設定 -->
        <div class="modal fade" id="myModal-{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                    <div class="row">
                                        {{-- 左上にイベントタイトル表示 --}}
                                        <div class="col-sm-7 modal-header-tittle">
                                            <h5 class="tittle">{{$event->name}}</h5>
                                        </div>
                                         {{-- 右上にイベントタイトル表示 --}}
                                        <div class="col-sm-3 modal-header-genre">
                                            <h5 class="genre text-center">{{$event->genre->name}}
                                            </div>
                                            <div class="col-sm-2 modal-header-delete">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </h5>
                                        </div>
                                    </div>
                                {{-- 左側中央に写真を表示 --}}
                                <div class="row">
                                    <div class="col-4 col-sm-6 img-left">
                                        <img src="{{ $event->img }}" alt="business city" class='img-fluid card-img-top'>
                                    </div>
                                    {{-- イベントタイトル,内容 --}}
                                    <div class="col-8 col-sm-6">
                                        <div class="modal-body">
                                            {{-- <p class="card-text">{{ $event->intro }}</p> --}}
                                            <p class="title">{{ $event->name }}</p>
                                            <p>
                                                <textarea name="message" cols="45" rows="15" class="textlines">{{ $event->intro }}</textarea>
                                                  </p>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                            <div class="modal-footer text-right">
                                                {{-- 開始、終了時間、イベント作成者 --}}
                                                <P class="start_date">{{ $event->startTime }}</P>
                                                <P class="finish_date">〜&ensp;{{$event->finishTime}}</P>
                                                <p class="representative">イベント代表者：{{ $event->user->name }}</p>
                                            </div>
                                        <div class="modal-footer text-right">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                            @if( in_array($event->id, $attendEventsId))
                                            <form method='post' action='{{ route('event.leave') }}'>
                                            @csrf
                                                <input type="hidden" name="id" value="{{ $event->id }}">
                                                    <button type="submit" class="btn btn-danger">このイベントから退会</button>
                                            </form>
                                            @else
                                            <form method='post' action='{{ route('event.attend') }}'>
                                            @csrf
                                                <input type="hidden" name="id" value="{{ $event->id }}">
                                                <button type="submit" class="btn btn-success">このイベントに参加</button>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection
