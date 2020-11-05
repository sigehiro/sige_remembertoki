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
            <img  src="{{ $group->img }}" width="100%" alt="groupIcon">
        </div>
        <div class="col-md-8 order-md-1">
            <form action="{{ route('chat.make') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="input-group mb-5">
                    <div class="input-group-prepend col-3 px-0">
                        <span class="input-group-text col-12">グループ名</span>
                    </div>
                    <input type="text" name="name" autofocus class="form-control  col-9" value="{{ $group->name }}" readonly>
                </div>
                <div class="input-group mb-5">
                    <div class="input-group-prepend col-3 px-0">
                        <span class="input-group-text col-12">ジャンル</span>
                    </div>
                    <input type="text" name="genre" class="form-control  col-9" value="{{ $genre->name }}" readonly>
                </div>
                <div class="input-group mb-5">
                    <div class="input-group-prepend col-3 px-0">
                        <span class="input-group-text col-12">作成者</span>
                    </div>
                    <input type="text" class="form-control  col-9" value="{{ Auth::user()->name }}" readonly>
                </div>
                <div class="input-group mb-5">
                    <div class="input-group-prepend col-3 px-0">
                        <span class="input-group-text col-12">紹介文</span>
                    </div>
                    <textarea name="intro" rows="4" cols="120" class="form-control col-9" readonly>{{ $group->intro }}</textarea>
                </div>
                <div class="input-group mb-4 d-flex justify-content-center">
                    <a class="btn btn-primary btn-lg text-white mr-5" href="javascript:history.back()">戻る</a>
                    <input class="btn btn-primary btn-lg text-white" type='submit' value='OK'>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection