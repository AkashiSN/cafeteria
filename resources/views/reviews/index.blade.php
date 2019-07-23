@extends('layouts.default')

@section('content')
<div class="container my-3">
    <div class="row my-2">
        <div class="col-md-10">
            <h3 class="text-justify">{{ $menu_name }}のレビュー</h3>
        </div>
        @if (Auth::check())
            <div class="col-md-2">
                <a href="{{route("menus.reviews.create", ['menu_id' => $menu_id])}}">レビューする</a>
            </div>
        @endif
    </div>

    @if (count($reviews_list))
        @foreach ($reviews_list as $review)
        <div class="container mt-3">
        <review-card :review="{{ json_encode($review) }}" :base-route="'{{ url("") }}'" :menu-id="'{{ $menu_id }}'" />
        </div>
        @endforeach
    @else
        <div class="container mt-3">
            <div class="card">
                <div class="card-body">
                    <p>レビューはまだありません</p>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
