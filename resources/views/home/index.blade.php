@extends('layouts.app')

@section('custom_js')
<script src="https://code.jquery.com/jquery-2.2.4.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" defer></script>
<script src="{{ asset('js/slider.js') }}" defer></script>
@endsection

@section('custom_css')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection

@section('content')
<!-- ここからホームページのメイン画面 -->

@include('components.header')


<div class="main">
    <div class="bg-image row" style="background-image: url({{ asset('image/homebackground7.jpg') }})">
        <div class="title-container col-sm-12 col-md-6 d-flex flex-column pl-4 text-light comment-con text-center">
            <div class="title">
                <h3 class="display-4-1 text-light"><strong>最高に『ワクワクする出会い』を</strong></h3>
                <h1 class="display-4-2 text-light"><strong>Connect People In Cebu</strong></h1>
            </div>
        </div>
        <div class="message-container col-sm-12 col-md-6 offset-md-6 d-flex text-light text-center">
            <div class="comment1">
                <p>セブで『仲間』を見つけよう</p>
                <p>同じ趣味、関心を持った仲間たちとチャットを始めよう</p>
                <p>仲良くなって一緒にイベントを開催しよう</p>
                <p>CPICをはじめよう</p>
                <div class="mypage">
                    {{-- ログインしてないときは アカウント作成/ログインボタン を表示 --}}
                    @guest
                        <a class="btn btn-primary btn-lg text-white mr-1" href="{{ route('register') }}" role="button">アカウント作成</a>
                        <a class="btn btn-primary btn-lg text-white" href="{{ route('login') }}" role="button">ログイン</a>
                    @endguest
                    @if(Auth::check())
                        <a class="btn btn-primary btn-lg text-white" href="{{ route('get.chat.index',['id' => 0]) }}" role="button">My Page へ</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="event container-fluid">
        <div class="contents">
            <h2><strong>もうすぐ開催のイベント</strong></h2>
            <p>セブでもうすぐ開催のイベントを見てみよう。</p>
        </div>
        {{-- イベント一覧表示 --}}
        <div class="container mt-3 mb-3">
            <div class="slider">
                @foreach($events as $event)
                    <div class="card" style="width: 20rem; margin-left: 15px; margin-right: 15px;">
                        <div class="card-body">
                            <p class="card-text"><small class="text-primary">{{ date('Y/m/d h:i', strtotime($event->finishTime)) }} - {{ date('h:i', strtotime($event->finishTime)) }}</small></p>
                            <h5 class="card-title"><strong>{{ $event->name }}</strong></h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $event->user->name }}</h6>
                            <p class="card-text">{{ str_limit($event->intro, $limit = 20, $end = '…') }}</p>
                        <p class="card-text"><small class="text-muted">参加者 何人？</small></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- グループ一覧表示 --}}
    <div class="group container-fluid">
        <div class="contents">
            <h2><strong>人気のグループ</strong></h2>
            <p>セブで人気のグループを見てみよう。</p>
        </div>
        <div class="container mt-3 mb-3">
            <div class="row slider2">
                @foreach($groups as $group)
                    <div class="card" style="width: 12rem; margin-left: 15px; margin-right: 15px;">
                        <img src="{{ $group->img }}" class="img-fluid card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{ $group->name}}</strong></h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $group->user->name }}</h6>
                            <p class="card-text">{{ str_limit($group->intro, $limit = 20, $end = '…') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- CPICの仕組み --}}
    <div class="container-fluid">
        <div class="description-wrapper text-light">
            <div class="heading">
                <h2><strong>CPICの仕組み</strong></h2>
            </div>
            <div class="row">
                <div class="description col-sm-12 col-md-4 d-flex">
                    <div>
                        <h3>グループ<i class="fas fa-users align-self-center fa-2x text-primary icon"></i></h3>
                        <ul class="txt-contents">
                            <li>気になるグループに入ってセブに関する役立つ情報を交換しよう。</li>
                            <li>みんなが参加したくなるグループを自分で作ってみよう。</li>
                        </ul>
                    </div>
                </div>
                <div class="description col-sm-12 col-md-4 d-flex">
                    <div>
                        <h3>チャット<i class="fas fa-comments align-self-center fa-2x text-primary icon"></i>
                        </h3>
                        <ul class="txt-contents">
                            <li>同じグループの仲間たちとチャットをしよう。</li>
                            <li>グループで仲良くなった人とは個人でチャットをしよう。</li>
                        </ul>
                    </div>
                </div>
                <div class="description col-sm-12 col-md-4 d-flex">
                    <div>
                        <h3>イベント<i class="fas fa-handshake align-self-center fa-2x text-primary icon"></i>
                        </h3>
                        <ul class="txt-contents">
                            <li>あなたが楽しめるいろいろなイベントに参加しよう。</li>
                            <li>慣れてきたら自分でイベントを開催してみよう。</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- news一覧表示 --}}
    <div class="news container-fluid container">
        <h2><strong>最新情報</strong></h2>
        <ul class="msr_newslist02">
            <li>
                <a href="#">
                <div>
                <time datetime="2019-12-20">2019.12.20</time>
                <p class="cpic01">CPIC</p>
                </div>
                <p>56期生卒業</p>
                </a>
            </li>
            <li>
                <a href="#">
                <div>
                <time datetime="2019-12-19">2019.12.19</time>
                <p class="cpic02">Nexseed</p>
                </div>
                <p>チーム開発最終プレゼンまでの軌跡</p>
                </a>
            </li>
            <li>
                <a href="#">
                <div>
                <time datetime="2019-12-13">2019.12.13</time>
                <p class="cpic01">CPIC</p>
                </div>
                <p>ダブルゆうき生誕祭！カジノで豪遊</p>
                </a>
            </li>
            <li>
                <a href="#">
                <div>
                <time datetime="2019-12-11">2019.12.11</time>
                <p class="cpic02">Neseed</p>
                </div>
                <p>シゲさんが語るセブの良いところ</p>
                </a>
            </li>
        </ul>
    </div>
</div>

{{-- サブビューでfooterを読み込んでいます(views/components/footer) --}}
@include('components.footer', ['a' => 'なんか持ってきたい値あれば', 'b' => 'こんな感じで'])






@endsection