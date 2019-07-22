@extends('layouts.default')

@section('content')
<div class="container mt-10 ph-20">
    <p class="text-justify text-muted">{{ $menu -> description }}</p>
    <h2>{{ $menu -> item_name }}</h2>
    <div class="row">
        <div class="col-9">
            <div class="row">
                <div class="col-auto">
                    <p class="text-justify font-weight-bold">¥{{ $menu -> price }}</p>
                </div>
                @if (count($reviews_list))
                    <span class="evaluation" style="--rate:{{ $average_evaluation }}%"></span>
                @else
                    <span class="text-justify text-muted">レビューはまだありません</span>
                @endif
                <br/>
            </div>
        </div>
        <div class="col-1">
            @if (Auth::check() && !Auth::user() -> is_admin)
            <favorite-button :menu-id="{{ $menu -> id }}" :base-route="'{{ url("") }}'" :is-liked="{{ var_export($menu -> isLiked(), true) }}" />
            @endif
        </div>
        <div class="col-2">
            <sold-out-button :base-route="'{{ url("") }}'" :menu-id="{{ $menu -> id }}" :sold-out={{ var_export($menu -> sold_out, true) }} />
        </div>
    </div>

    <h4>栄養表示</h4>
    <div class="container mt-20">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-auto card-text font-weight-bold">エネルギー</div>
                    <div class="col-2 card-text">{{ $menu -> energy }} kcal</div>
                    <div class="col-auto card-text font-weight-bold">脂質</div>
                    <div class="col-2 card-text">{{ $menu -> lipid }} g</div>
                </div>
                <div class="row">
                    <div class="col-auto card-text font-weight-bold">タンパク質</div>
                    <div class="col-2 card-text">{{ $menu -> protein }} g</div>
                    <div class="col-auto card-text font-weight-bold">塩分</div>
                    <div class="col-2 card-text">{{ $menu -> salt }} g</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <h4 class="col-10">レビュー</h4>
        <a class="col-2" href="{{ route('menus.reviews.index', ['menu_id' => $menu -> id]) }}">もっとみる</a>
    </div>

    @if (count($reviews_list))
        @foreach ($reviews_list as $review)
            <div class="container mt-20">
                <review-card :review="{{ json_encode($review) }}" :base-route="'{{ url("") }}'" :menu-id="'{{ $menu -> id }}'"/>
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
