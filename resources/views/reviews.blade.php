@extends('layouts.default')

@section('content')
<div class="row mt-3">
    <h2 class="col">レビュー</h2>
    <a class="col align-self-end" href="{{ route('menu.review', ['menu_id' => $menu -> menu_id]) }}">レビューを書く</a>
</div>

<div class="container mt-10">
    @foreach ($reviews as $review)
    {{ $review["user_name"] }}
    {{ $review["create_date"] }}
    {{ $review["evaluation"] }}
    {{ $review["comment"] }}
    <br>
    @endforeach
</div>
@endsection
