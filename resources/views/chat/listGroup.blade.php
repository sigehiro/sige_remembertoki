@extends('layouts.app')

@section('title', 'グループ一覧')

@section('content')

@include('components.header')

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="heading">参加したいグループを見つけよう</h1><br>
        <div class="row justify-content-end my-5">
            <div class="col-4">
                <form method='get' class="form-inline" action='{{ route('group.search') }}'>
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
                <a class="btn btn-success text-white" href="{{ route('chat.makeGroup') }}" role="button">グループ作成画面</a>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($groups as $group)
            <div class="col-md-3 mb-3">
                <div class="card" id="highreliability">
                    <img src="{{ $group->img }}" alt="business city" class='img-fluid card-img-top'>
                    <div class="card-body">
                        <h5 class="title">{{ $group->name }}</h5>
                        <p class="card-text">{{ str_limit($group->intro, $limit = 20, $end = '…') }}</p>
                    <!-- 切り替えボタンの設定 -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-{{$group->id}}">詳細</button>
                    <!-- モーダルの設定 -->
                        <div class="modal fade" id="myModal-{{$group->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="title">{{ $group->name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <img src="{{ $group->img }}" alt="" class='img-fluid card-img-top'>
                                    <div class="modal-body">
                                        <p class="card-text">{{ $group->intro }}</p>
                                        <p class="representative">イベント代表者：{{ $group->user->name }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                        @if( in_array($group->id, $attendGroupsId) )
                                            <form method='post' action='{{ route('group.leave') }}'>
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $group->id }}">
                                                <button type="submit" class="btn btn-danger">このグループから退会</button>
                                            </form>
                                        @else
                                            <form method='post' action='{{ route('group.attend') }}'>
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $group->id }}">
                                                <button type="submit" class="btn btn-success">このグループに参加</button>
                                            </form>
                                        @endif
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