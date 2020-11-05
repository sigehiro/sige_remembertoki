@extends('layouts.app')

@section('title', 'mypage')

@section('custom_css')
<link href="{{ asset('css/chat.css') }}" rel="stylesheet">
@endsection

@section('content')

<script>
window.Laravel = {};
window.Laravel.user_id = {{ Auth::user()->id }}

</script>

    <div class="sidebar-container">
        <div class="sidebar-logo">
                <a class="btn btn-blac text-white" href="{{ route('get.chat.index', ['id' => 0]) }}" role="button">MY PAGE</a>
        </div>
        <ul class="sidebar-navigation">
            <li class="header">GROUPS</li>
            @foreach($attendGroups as $attendGroup)
            <li>
            <a class="nav-link active text-light" id="v-pills-home-tab" href="{{ route('get.chat.index', ['id' => $attendGroup->group->id]) }}"  aria-controls="v-pills-home" aria-selected="true">{{ $attendGroup->group->name }}</a>
            </li>
            @endforeach
            <li>
                <a class="btn btn-black text-white text-right pr-4" href="{{ route('chat.listGroup') }}" role="button">＋ more</a>
            </li>
            <li class="header">DMs</li>
            <li>
                <a class="nav-link active text-light" id="v-pills-home-tab"  href="#yoneeeeeedakaaaaan" role="tab" aria-controls="v-pills-home" aria-selected="true">○ Mom</a>
            </li>
            <li>
                    <a class="nav-link active text-light" id="v-pills-home-tab"  href="#yoneeeeeedakaaaaan" role="tab" aria-controls="v-pills-home" aria-selected="true">○ Grandma</a>
                </li>
            <li>
                <a class="btn btn-black text-white text-right pr-4" href="#" role="button">＋ more</a>
            </li>
            </li>
            <li class="header">EVENTS</li>
            </li>
            @foreach($attendEvents as $attendEvent)
            <li>
                <a class="nav-link active text-light" id="v-pills-home-tab" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">{{ $attendEvent->event->name }}</a>
            </li>
            @endforeach
            <li>
                <a class="btn btn-black text-white text-right pr-4" href="{{ route('event.index') }}">
                    {{-- <i class="fa fa-tachometer" aria-hidden="true"></i> --}}+ more
                </a>
            <li>
                <a href="{{ url('/setting/index') }}">
                    <i class="fa fa-cog" aria-hidden="true"></i> SETTING
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-info-circle" aria-hidden="true"></i> ABOUT US
                </a>
            </li>
            <li>
                <a href="http://remember-toki.herokuapp.com/logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>Logout
                </a>
            </li>
        </ul>
    </div>

{{-- 中央・チャット --}}
@if(!empty($group))
    <div class="chat-container">
        <div class="line__container">
           <div class="line__title">
                    <div class="ham">
                            <span class="ham_line ham_line1"></span>
                            <span class="ham_line ham_line2"></span>
                            <span class="ham_line ham_line3"></span>
                    </div>
                    <div class="item">
                        <div id="title">{{ $group->name }}</div>
                        <div id="member">
                            {{ $userNum }}人
                            <i class="fas fa-users fa-lg"></i>
                        </div>
                    </div>
           </div>
            <!-- ▼会話エリア scrollを外すと高さ固定解除 -->
            <div class="line__contents scroll">
                @foreach($posts as $post)
                    @if($post->user_id != Auth::user()->id)
                        <div class="line__left">
                            <figure>
                                <img  src="{{ $post->user->img }}" alt="userIcon">
                            </figure>
                            <div class="line__left-text">
                            <div class="name">{{$post->user->name }}</div>
                            <div class="left-text-date">
                                <div class="text">{!! nl2br($post->text) !!}</div>
                                <span class="date">{{ date('h:m', strtotime($post->sent_time)) }}</span>
                            </div>
                            </div>
                        </div>
                    @else
                        <div class="line__right">
                            <div class="text">{!! nl2br($post->text) !!}</div>
                            <span class="date">{{ date('h:m', strtotime($post->sent_time)) }}</span>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div >
            <div class="inputFiles text-right">
                <i class="fas fa-camera fa-2x"></i>
                <i class="fas fa-images fa-2x"></i>
            </div>
            <div id="bms_send">
                <textarea id="bms_send_message" placeholder="Shift+Enterで送信はまだできませんので右のボタン押してくださいごめんなさい" autofocus></textarea>
                <input type="hidden" id="group_id" value="{{ $group->id }}">
                <input type="submit" value="送信" id="bms_send_btn">
            </div>
        </div>
    </div>
    <div id="overlay"></div>
@else
    <div class="chat-container">
        <div class="container">
            <div class="row p-5">
                <div class="sns d-block mx-auto">
                    <i class="mx-4 fab fa-facebook-square fa-3x"></i>
                    <i class="mx-4 fab fa-twitter-square fa-3x"></i>
                    <i class="mx-4 fab fa-instagram fa-3x"></i>
                    <i class="mx-4 fab fa-github-square fa-3x"></i>
                </div>
            </div>
            <div class="row">
                <div class="introduction col-md-6 mt-5">
                    <div class="maru-box4">
                        <img src="{{ $user->img }}" alt="maru" width="300" class="d-block mx-auto"/>
                    </div>
                    <h3 class="my-3 text-center" style="
                    font-size: 30px;">{{ $user->name }}</h3>
                    <p class="text-center mx-5" style="
                    font-size: 20px;">{{ $user->intro }}</p>
                </div>
                <div class="mine col-md-6 mt-5 pt-3">
                    <div class="favorite">
                        <h3>Your Favorite <i class="fas fa-heart"></i></h3>
                        <div class="accordion" id="accordion2" role="tablist">
                            <div class="card">
                                <div class="card-header" role="tab" id="heading1">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" class="text-body stretched-link text-decoration-none" href="#collapse1" aria-expanded="false" aria-controls="collapse1" disabled> FRIENDS </a>
                                    </h5>
                                </div>
                                <div id="collapse1" class="collapse show" role="tabpanel" aria-labelledby="heading1" data-parent="#accordion2">
                                    <div class="card-body">Haruka❤️</div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="heading2">
                                    <h5 class="mb-0">
                                        <a class="collapsed text-body stretched-link text-decoration-none" data-toggle="collapse" href="#collapse2" aria-expanded="false" aria-controls="collapse2"> GROUPS </a>
                                    </h5>
                                </div>
                                @foreach($attendGroups as $attendGroup)
                                    <div id="collapse2" class="collapse" role="tabpanel" aria-labelledby="heading2" data-parent="#accordion2">
                                        <div class="card-body">{{ $attendGroup->group->name }}</div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="heading3">
                                    <h5 class="mb-0">
                                        <a class="collapsed text-body stretched-link text-decoration-none" data-toggle="collapse" href="#collapse3" aria-expanded="false" aria-controls="collapse3"> EVENTS </a>
                                    </h5>
                                </div>
                                @foreach($attendEvents as $attendEvent)

                                    <div id="collapse3" class="collapse" role="tabpanel" aria-labelledby="heading3" data-parent="#accordion2">
                                        <div class="card-body">{{ $attendEvent->event->name }}</div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="blog mt-5">
                        <h3>VLOG</h3>
                        <ul class="msr_newslist02">
                            <li>
                                <a href="#">
                                    <div>
                                        <time datetime="2019-12-20">2019.12.21</time>
                                        <p class="cpic01">lifestyle</p>
                                    </div>
                                    <p>【OMG】The toilet is clogged!!!</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <time datetime="2019-12-19">2019.12.19</time>
                                        <p class="cpic02">Love</p>
                                    </div>
                                    <p>【BREAKING】 Haruka finally found her partner:)</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <time datetime="2019-12-13">2019.12.13</time>
                                        <p class="cpic01">IT</p>
                                    </div>
                                    <p>How to format Timestamps in laravel</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <time datetime="2019-12-11">2019.12.01</time>
                                        <p class="cpic02">Besty</p>
                                    </div>
                                    <p>Let's find a gift for your partner!! http://...</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<script>
    $('.line__contents').animate({scrollTop: $('.line__contents')[0].scrollHeight}, 1);
</script>



@endsection
