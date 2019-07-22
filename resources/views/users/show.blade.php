@extends('layouts.default')

@section('content')
<div style="text-align: center;">
    <img src="{{ $user['avatar'] }}" style="border-radius: 50%; width: 40%;" />

    <h2 class="text-center">{{ $user['name'] }}</h2>

    <a class="btn btn-primary" href="{{ route('my_page.reviews') }}" role="button">レビューをみる</a>
    <a class="btn btn-primary" href="{{ route('my_page.favorites') }}" role="button">お気に入りをみる</a>
    <a class="btn btn-primary" href="{{ route('my_page.modify') }}" role="button">ユーザー情報を変更する</a>
</div>
@endsection
