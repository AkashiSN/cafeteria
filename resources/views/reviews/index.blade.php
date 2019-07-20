@extends('layouts.default')

@section('content')
<div class="container mt-20 ph-70">
    <div class="row">
        <div class="col-10">
            <h2 class="text-justify">レビュー一覧</h2>
        </div>
        @if (Auth::check())
            <div class="col-2">
                <a href="{{route("menus.reviews.create", ['menu_id' => $menu_id])}}">レビューする</a>
            </div>
        @endif
    </div>

    <p class="text-justify font-weight-bold">{{ $menu_name }}</p>

    @if (count($reviews_list))
        @foreach ($reviews_list as $review)
        <div class="container mt-20">
        <review-card :review="{{ json_encode($review) }}" :base-route="'{{ url("") }}'" :menu-id="'{{ $menu_id }}'" />
        </div>
        @endforeach
    @else
        <div class="container mt-20">
            <div class="card">
                <div class="card-body">
                    <p>レビューはまだありません</p>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
