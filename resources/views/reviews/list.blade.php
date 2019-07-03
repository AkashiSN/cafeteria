@extends('layouts.default')

@section('content')
<div class="container mt-20 ph-70">
    <div class="row">
        <div class="col-10">
            <p class="text-justify text-muted">レビュー一覧</p>
        </div>
        <div class="col-2">
            <a class="text-justify text" href="{{route("menu.review", ['menu_id' => $menu->menu_id])}}">レビューする</a>
        </div>
    </div>
    @foreach ($reviews as $review)
    <div class="container mt-20">
    <review-card :review="{{$review}}" />
    </div>
    @endforeach
</div>
@endsection
