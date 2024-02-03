@extends('layouts.app')

@section('css')
<link rel="stylesheet" href=" {{ asset('css/login.css') }} ">
@endsection

@section('header')
<div class="header__button">
    <form class="header__button" action="/register" method="get">
        @csrf
        <button class="header__button-register">register</button>
    </form>
</div>
@endsection

@section('content')
<div class="login__content">
    <div class="login__heading">
        <h2 class="login__heading--item">Login</h2>
    </div>
    <form class="login-form" action="/login" method="post">
        @csrf
        <div class="login-form__group">
            <div class="login-form__label">
                <label for="email">メールアドレス</label><br />
            </div>
            <div class="login-form__group-content">
                <div class="login-form__input">
                    <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('name') }}">
                </div>
                <div class="login-form__error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="login-form__group">
            <div class="login-form__label">
                <label for="password">パスワード</label>
            </div>
            <div class="login-form__group-content">
                <div class="login-form__input">
                    <input type="password" name="password" placeholder="例: coachtech1106">
                </div>
                <div class="login-form__error">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="login-form__button">
            <button class="login-form__button-submit" type="submit">ログイン</button>
        </div>
    </form>
</div>
@endsection