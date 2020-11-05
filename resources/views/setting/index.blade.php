@extends('layouts.app')

@section('title', 'setting')

@section('custom_js')
    <script src="{{ asset('js/croppie.js') }}" defer></script>
    <script src="{{ asset('js/event-cropper.js') }}" defer></script>
@endsection

@section('custom_css')
    <link href="{{ asset('css/croppie.css') }}" rel="stylesheet">
    <link href="{{ asset('css/event-cropper.css') }}" rel="stylesheet">
@endsection

@section('content')

@include('components.header')

<a class="btn btn-secondary btn-lg text-white d-flex justify-content-center my-4" style="width: 200px; margin: 0 auto" href="{{ route('setting.help') }}" role="button">Do you need any help?</a>


<div class="container">
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $message)
                <li class="alert alert-danger">{{$message}}</li>
            @endforeach
        </ul>
    @endif
    <div class="pb-3 text-center">
        <h1 class="card-header text-white bg-primary">プロフィールを変更する</h1><br>
    </div>

    <div class="row">

        <div class="col-md-4 order-md-2 mb-4">
            <div class="custom-file mb-5">
                <input type="file" class="input-file custom-file-input" id="picture" name="picture">
                <label class="custom-file-label" for="picture">プロフィール画像</label>
            </div>

            <img id="cropped-img" src="{{ old('base64', $user->img) }}" alt="" style="width: 100%">

            <div class="modal fade" id="cropper-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel"></h4>
                        </div>
                        <div class="modal-body">
                            <div id="upload-demo" class="js-croppie center-block">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                            <button type="button" id="cropImageBtn" class="btn btn-primary crop">切り取る</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8 order-md-1">
            <form action="{{ route('setting.confirmProfile') }}" method="POST" class="form-horizontal">
                @csrf
            <textarea id="base64" name="base64" style="display: none">{{ $user->img }}</textarea>

                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <label class="input-group-text col-12" for="name">氏名</label>
                    </div>
                    <input type="text" name="name" autofocus class="form-control  col-9" id="name" value="{{ $user->name }}">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <label class="input-group-text col-12" for="email">メールアドレス</label>
                    </div>
                    <input type="text" name="email" class="form-control  col-9" id="email" value="{{ $user->email }}">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <label class="input-group-text col-12" for="password">パスワード</label>
                    </div>
                    <input type="text" name="password" class="form-control  col-9" id="password" placeholder="新しいパスワードを入力" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <label class="input-group-text col-12">性別</label>
                    </div>
                    <div class="input-group col-9 px-0">
                        <div class="input-group-prepend">
                            <div class="input-group-text col-12">
                                <input type="radio" name="gender" id="man" {{ $user->gender==1 ? 'checked' : '' }} value='1'>
                            </div>
                        </div>
                        <label class="form-control" for="man">男性</label>
                        <div class="input-group-prepend">
                            <div class="input-group-text col-12">
                                <input type="radio" name="gender" id="woman" {{ $user->gender==2 ? 'checked' : '' }} value='2'>
                            </div>
                        </div>
                        <label class="form-control" for="woman">女性</label>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <label class="input-group-text col-12" for="age">年齢</label>
                    </div>
                    <input type="number" name="age" class="form-control col-9" id="age" value="{{ $user->age }}">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <label class="input-group-text col-12" for="address">住所</label>
                    </div>
                    <input type="text" name="address" class="form-control col-9" id="address" value="{{ $user->address }}">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <label class="input-group-text col-12" for="occupation">職業</label>
                    </div>
                    <input type="text" name="occupation" class="form-control col-9" id="occupation" value="{{ $user->occupation }}">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <label class="input-group-text col-12" for="intro">紹介文</label>
                    </div>
                    <textarea name="intro" rows="4" cols="120" class="col-9 p-2 d-flex flex-column position-static" id="intro">{{ $user->intro }}</textarea>
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