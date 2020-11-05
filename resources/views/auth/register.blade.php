@extends('layouts.app')

@section('content')

@include('components.header')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- 新規アカウント作成画面 --}}
            <div class="card">
                <div class="card-header">{{ __('アカウント作成') }}</div>

                @if($errors->any())
                    <ul>
                    @foreach($errors->all() as $message)
                        <li class="alert alert-danger">{{$message}}</li>
                    @endforeach
                    </ul>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- ユーザー名 --}}
                        <div class="form-group row justify-content-center">
                            {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('') }}</label> --}}

                            <div class="col-md-6 ">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder='氏名'>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- メールアドレス --}}
                        <div class="form-group row justify-content-center">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('') }}</label> --}}

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder='メールアドレス'>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- パスワード --}}
                        <div class="form-group row justify-content-center">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('') }}</label> --}}

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autofocus placeholder='パスワード'>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- 性別 --}}
                        <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" {{ old('gender') ? 'checked' : '' }} value='1'>

                                        <label class="form-check-label mr-5" for="gender">
                                            {{ __('男性') }}
                                        </label>

                                        <input class="form-check-input" type="radio" name="gender" id="gender-woman" {{ old('gender') ? 'checked' : '' }} value='2'>

                                        <label class="form-check-label" for="gender-woman">
                                            {{ __('女性') }}
                                        </label>
                                    </div>
                                </div>
                        </div>

                        {{-- 年齢 --}}
                        <div class="form-group row justify-content-center">
                                {{-- <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('') }}</label> --}}

                                <div class="col-md-6">
                                    <input id="age" type="age" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ old('age') }}" required autofocus placeholder='年齢'>

                                    @if ($errors->has('age'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('age') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        {{-- 職業 --}}
                        <div class="form-group row justify-content-center">
                                {{-- <label for="occupation" class="col-md-4 col-form-label text-md-right">{{ __('') }}</label> --}}
                                <div class="col-md-6">
                                    <input id="occupation" type="occupation" class="form-control{{ $errors->has('occupation') ? ' is-invalid' : '' }}" name="occupation" value="{{ old('occupation') }}"required autofocus placeholder='職業'>

                                    @if ($errors->has('occupation'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('occupation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        {{-- 興味関心 --}}
                        <div class="form-group row justify-content-center">
                            {{-- <label for="genre" class="col-md-4 col-form-label text-md-right">{{ __('') }}</label> --}}

                            <div class="col-md-6">
                                <input id="genre" type="genre" class="form-control{{ $errors->has('genre') ? ' is-invalid' : '' }}" name="genre" value="{{ old('genre') }}"required autofocus placeholder='あなたの興味・関心'>

                                @if ($errors->has('genre'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('genre') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                           {{-- 住所--}}
                           <div class="form-group row justify-content-center">
                                {{-- <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('') }}</label> --}}
                                <div class="col-md-6">
                                    <input id="address" type="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}"required autofocus placeholder='住所' >

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>




                        {{-- 登録ボタン --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('登録') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
