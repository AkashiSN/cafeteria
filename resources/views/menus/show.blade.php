@extends('layouts.default')

@section('content')
<div class="container-fluid">
    <div class="row flex-row flex-nowrap">
        <div class="col-2">
            <img src="https://park.ajinomoto.co.jp/wp-content/uploads/2018/03/710131.jpeg" width="150" height="100" />
        </div>
        <div class="col-2">
            <img src="https://park.ajinomoto.co.jp/wp-content/uploads/2018/03/710131.jpeg" width="150" height="100" />
        </div>
        <div class="col-2">
            <img src="https://park.ajinomoto.co.jp/wp-content/uploads/2018/03/710131.jpeg" width="150" height="100" />
        </div>
    </div>
</div>

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
                    <span class="evaluation" style="--rate:{{ $average_evaluation }}%"></span><br/>
                @else
                    <p class="text-justify text-muted">レビューはありません</p>
                @endif
            </div>
        </div>
        <div class="col-1">
            <favorite-button :menu-id="{{ $menu -> id }}" :base-route="'{{ url("") }}'" :is-liked="{{ $menu -> isLiked() ? 'true' : 'false' }}" />
        </div>
        <div class="col-2">
            <sold-out-button :base-route="'{{ url("") }}'" :menu-id="{{ $menu -> id }}" :sold-out={{ $menu -> sold_out ? 'true' : 'false' }} />
        </div>
    </div>

    <h4>栄養表示</h4>
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
        <div class="card">
            <div class="card-body">
                <p>レビューはありません</p>
            </div>
        </div>
    @endif
</div>
@endsection
