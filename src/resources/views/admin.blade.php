@extends('layouts.app')

@section('css')
<link rel="stylesheet" href=" {{ asset('css/admin.css') }} " />
@endsection

@section('header')
<div class="header__button">
    <form class="header__button" action="/logout" method="post">
        @csrf
        <button class="header__button-logout">logout</button>
    </form>
</div>
@endsection

@section('content')
<div class="admin__content">
    <div class="admin__heading">
        <h2 class="admin__heading--item">Admin</h2>
    </div>
    <div class="admin__form">
        <form action="admin" method="post">
            @csrf
            <div class="form__search-text">
                <input type="text" name="input_search" placeholder="名前やメールアドレスを入力してください"/>
            </div>
            <div class="form__search-gender">
                <select name="search_gender">
                    <option value="">性別</option>
                    <option value="all">全て</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>
            </div>
            <div class="form__search-category">
                <select name="search_category">
                    <option value="">お問い合わせの種類</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->content }}</option>
                        @endforeach
                </select>
            </div>
            <div class="form__search-date">
                <input type="date" name="search_date" />
            </div>
            <div class="form__button">
                <button class="form__button-search" type="submit">検索</button>
                <button class="form__button-reset" type="submit">リセット</button> {{-- <a></a>?  --}}
            </div>
        </form>
    </div>
    {{ $contacts->links() }}
    <div class="admin-table">
        @if (@isset($data))
        <table class="admin-table__inner">
            <tr class="admin-table__row">
                <th class="admin-table__header">お名前</th>
                <th class="admin-table__header">性別</th>
                <th class="admin-table__header">メールアドレス</th>
                <th class="admin-table__header">お問い合わせの種類</th>
                <th class="admin-table__header"></th>
            </tr>

            <tr class="admin-table__row">
                <td>{{ $data->name }}</td>
                <td>{{ $data->gender }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->categori_id }}</td>
                <td><a href="">詳細</a></td>
            </tr>
        </table>
        @else
        <table class="admin-table__inner">
            <tr class="admin-table__row">
                <th class="admin-table__header">お名前</th>
                <th class="admin-table__header">性別</th>
                <th class="admin-table__header">メールアドレス</th>
                <th class="admin-table__header">お問い合わせの種類</th>
                <th class="admin-table__header"></th>
            </tr>
            @foreach ($contacts as $contact)
            <tr class="admin-table__row">
                <td> {{ $contact->last_name }} {{ $contact->first_name }} </td>
                <td>
                    @if ($contact['gender'] == '1')
                        男性
                    @elseif ($contact['gender'] == '2')
                        女性
                    @else
                        その他
                    @endif
                </td>
                <td> {{ $contact->email }} </td>
                @foreach ($categories as $category)
                <td>
                </td>
                @endforeach
                <td><a href="">詳細</a></td>
            </tr>
            @endforeach
        </table>
        @endif
    </div>
</div>
@endsection