@extends('layouts.default')

@section('content')
<div class="container mt-20 ph-70">
    <div class="row">
        <div class="col-10">
            <h2 class="text-justify text-muted">レビュー一覧</h2>
        </div>
        @if (Auth::check())
            <div class="col-2">
                <a href="{{route("menus.reviews.create", ['menu_id' => $menu->id])}}">レビューする</a>
            </div>
        @endif
    </div>
    @if ($reviews_list)
        @foreach ($reviews_list as $review)
        <div class="container mt-20">
            <review-card :review="{{$review}}" :image_api_url="'{{route("menus.reviews.images", ['menu_id' => $menu->id, 'review_id' => $review->id])}}'" />
        </div>
        @endforeach
    @else
    <p>レビューはありません</p>
    @endif
</div>
@endsection
