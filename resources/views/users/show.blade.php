@extends('layouts.default')

@section('content')
<div style="text-align: center;">

    <img src="{{ $user['avatar'] }}" style="border-radius: 50%; margin: 3em; width: 30%;" />

    <h2 class="text-center" style="margin-bottom: 1em;">{{ $user['name'] }}</h2>

    @if (! $user['is_admin'])
        <a class="btn btn-primary" href="{{ route('my_page.reviews') }}" role="button">レビューをみる</a>
        <a class="btn btn-primary" href="{{ route('my_page.favorites') }}" role="button">お気に入りをみる</a>
    @endif
    <a class="btn btn-primary" href="{{ route('my_page.edit') }}" role="button">ユーザー情報を変更する</a>
</div>
@endsection
