@extends('layouts.app')

@section('css')
<link rel="stylesheet" href=" {{ asset('css/register.css') }} " />
@endsection

@section('header')
<div class="header__button">
    <form class="header__button" action="/login" method="get">
        @csrf
        <button class="header__button-login">login</button>
    </form>
</div>
@endsection

@section('content')
<div class="register__content">
    <div class="register__heading">
        <h2 class="register__heading--item">Register</h2>
    </div>
    <form class="register-form" action="/register" method="post">
        @csrf
        <div class="register-form__group">
            <div class="register-form__label">
                <label for="name">お名前</label>
            </div>
            <div class="register-form__group-content">
                <div class="register-form__input">
                    <input type="text" name="name" placeholder="例: 山田 太郎" value="{{ old('name') }}" />
                </div>
                <div class="register-form__error">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="register-form__group">
            <div class="register-form__label">
                <label for="email">メールアドレス</label>
            </div>
            <div class="register-form__group-content">
                <div class="register-form__input">
                    <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}"/>
                </div>
                <div class="register-form__error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="register-form__group">
            <div class="register-form__label">
                <label for="password">パスワード</label>
            </div>
            <div class="register-form__group-content">
                <div class="register-form__input">
                    <input type="password" name="password" placeholder="例: coachtech1106">
                </div>
                <div class="register-form__input">
                    <input type="password" name="password_confirmation" placeholder="再">
                </div>
                <div class="register-form__error">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="register-form__button">
            <button class="register-form__button-submit" type="submit">登録</button>
        </div>
    </form>
</div>
@endsection