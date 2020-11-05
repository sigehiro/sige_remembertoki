@extends('layouts.app')

@section('title', 'confirm')

@section('content')

@include('components.header')

<div class="container">
    <div class="py-5 text-center">
        <h1 class="card-header text-white bg-primary">以下の内容でよろしいですか？</h1><br>
    </div>
    <div class="row">

        <div class="col-md-4 order-md-2 mb-4">
            <img  src="{{ $user->img }}" width="100%" alt="groupIcon">
        </div>

        <div class="col-md-8 order-md-1">
            <form action="{{ route('setting.changeProfile') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <span class="input-group-text col-12">氏名</span>
                    </div>
                    <input type="text" name="name" autofocus class="form-control  col-9" id="name" value="{{ $user->name }}" readonly>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <span class="input-group-text col-12">メールアドレス</span>
                    </div>
                    <input type="text" name="email" class="form-control  col-9" id="email" value="{{ $user->email }}" readonly>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <span class="input-group-text col-12">パスワード</span>
                    </div>
                    <input type="text" name="password" class="form-control  col-9" id="password" placeholder="新しいパスワードを入力" readonly>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <span class="input-group-text col-12">性別</span>
                    </div>
                    <div class="input-group col-9 px-0">
                        <div class="input-group-prepend">
                            <div class="input-group-text col-12">
                                <input type="radio" name="gender" id="man" {{ $user->gender==1 ? 'checked' : '' }} value='1' disabled>
                            </div>
                        </div>
                        <input class="form-control" for="man" value="男性" readonly>
                        <div class="input-group-prepend">
                            <div class="input-group-text col-12">
                                <input type="radio" name="gender" id="woman" {{ $user->gender==2 ? 'checked' : '' }} value='2' disabled>
                            </div>
                        </div>
                        <input class="form-control" for="woman" value="女性" readonly>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <span class="input-group-text col-12">年齢</span>
                    </div>
                    <input type="number" name="age" class="form-control col-9" id="age" value="{{ $user->age }}" readonly>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <span class="input-group-text col-12">住所</span>
                    </div>
                    <input type="text" name="address" class="form-control col-9" id="address" value="{{ $user->address }}" readonly>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <span class="input-group-text col-12">職業</span>
                    </div>
                    <input type="text" name="occupation" class="form-control col-9" id="occupation" value="{{ $user->occupation }}" readonly>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <span class="input-group-text col-12">紹介文</span>
                    </div>
                    <textarea name="intro" rows="4" cols="120" class="form-control col-9" readonly>{{ $user->intro }}</textarea>
                </div>
                <div class="input-group mb-3 d-flex justify-content-center">
                    <a class="btn btn-primary btn-lg text-white mr-5" href="javascript:history.back()">戻る</a>
                    <input class="btn btn-primary btn-lg text-white" type='submit' value='OK'>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection