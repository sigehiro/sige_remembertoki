@extends('layouts.app')

@section('title', 'makeEvent')

@section('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr" defer></script>
    <script src="{{ asset('js/croppie.js') }}" defer></script>
    <script src="{{ asset('js/event-cropper.js') }}" defer></script>
    <script src="{{ asset('js/date-picker.js') }}" defer></script>
@endsection

@section('custom_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="{{ asset('css/croppie.css') }}" rel="stylesheet">
    <link href="{{ asset('css/event-cropper.css') }}" rel="stylesheet">
    <link href="{{ asset('css/event.makeevent.css') }}" rel="stylesheet">
@endsection

@section('content')

@include('components.header')

<div class="container">
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $message)
                <li class="alert alert-danger">{{$message}}</li>
            @endforeach
        </ul>
    @endif
    <div class="py-5 text-center">
        <h1 class="card-header text-white bg-primary">イベントを作成しよう!</h1>
    </div>

    <div class="row">

        <div class="col-md-4 order-md-2 mb-4">
            <div class="custom-file mb-5">
                <input type="file" class="input-file custom-file-input" id="picture" name="picture">
                <label class="custom-file-label" for="picture">イベント画像</label>
            </div>

            <img id="cropped-img" src="{{ old('base64') }}" alt="" style="width: 100%">

            <div class="modal fade" id="cropper-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <label aria-hidden="true">&times;</label>
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
            <form action="{{ route('event.confirm') }}" method="POST" class="form-horizontal">
                @csrf
                <textarea id="base64" name="base64" style="display: none"></textarea>

                <div class="input-group mb-4">
                    <div class="input-group-prepend col-3 px-0">
                        <label class="input-group-text col-12" for="name">イベント名</label>
                    </div>
                    <input type="text" name="name" class="form-control col-9 {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" value="{{ old('name') }}" autofocus required placeholder='イベント名'>
                </div>

                <div class="input-group mb-4">
                    <div class="input-group-prepend col-3 px-0">
                        <label class="input-group-text col-12" for="inputState">ジャンル</label>
                    </div>
                    <select id="inputState" class="form-control col-9" name="genre_id">
                        @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ old('genre') ? 'selected' : '' }}>{{ $genre->name }}</option>
                            @endforeach
                    </select>
                </div>

                <div class="input-group mb-4">
                    <div class="input-group-prepend col-3 px-0">
                        <label class="input-group-text col-12" for="start_date">開始時間</label>
                    </div>
                    <input id="start_date" type="date" name="start_date_time" class="form-control col-9 date-time-picker" value="{{ old('start_date_time') }}" style="background: white" placeholder="開始時間" required>
                </div>

                <div class="input-group mb-4">
                    <div class="input-group-prepend col-3 px-0">
                        <label class="input-group-text col-12"  for="end_date">終了時間</label>
                    </div>
                    <input id="end_date" type="date" name="end_date_time" class="form-control col-9 date-time-picker" value="{{ old('end_date_ime') }}" style="background: white" placeholder="終了時間" required>
                </div>

                <div class="input-group mb-5">
                    <div class="input-group-prepend col-3 px-0">
                        <label class="input-group-text col-12" for="intro">イベント紹介文</label>
                    </div>
                    <textarea name="intro" rows="4" cols="120" class="col-9 p-2 d-flex flex-column position-static" id="intro">{{ old('intro') }}</textarea>
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