@extends('layouts.default')

@section('content')
<div class="container mt-20 ph-70">
    <div class="row">
        <div class="col-10">
            <h2 class="text-justify text-muted">レビュー一覧</h2>
        </div>
        @if (Auth::check())
            <div class="col-2">
                <a href="{{route("menu.reviews.create", ['menu_id' => $menu->menu_id])}}">レビューする</a>
            </div>
        @endif
    </div>
    @if ($reviews_list)
        @foreach ($reviews_list as $review)
        <div class="container mt-20">
            <review-card :review="{{$review}}" />
        </div>
        @endforeach
    @else
    <p>レビューはありません</p>
    @endif
</div>
@endsection
