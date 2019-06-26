@extends('layouts.default')

@section('content')
<div class="container mt-20 ph-70">
    <div class="row">
        <div class="col">
            <h2 class="text-justify text-muted">レビュー一覧</h2>
        </div>
        <div class="col-2">
            <a class="col align-self-end" href="{{route("menu.review", ['menu_id' => $menu -> menu_id])}}">レビューする</a>
        </div>
    </div>
    @if ($reviews -> all())
    @foreach ($reviews as $review)
    <div class="container mt-20">
    <review-card :review="{{$review["review"]}}" :user_name="'{{$review["user_name"]}}'" />
    </div>
    @endforeach
    @else
    <p>レビューはありません</p>
    @endif
</div>
@endsection
