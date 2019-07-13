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
    <p class="text-justify text-muted">ディスクリプション</p>
    <h2>{{ $menu -> item_name }}</h2>
    <div class="row">
        <div class="col-10">
            <div class="row">
                <div class="col-auto">
                    <p class="text-justify text-mute font-weight-bold">¥{{ $menu -> price }}</p>
                </div>
                <div class="col-auto">
                    お星様
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="row">
                <div class="col-auto">
                    はぁと
                </div>
                <div class="col-auto">
                    <sold-out-button :base-route="'{{ url("") }}'" :menu-id="{{ $menu -> id }}" :sold-out={{ $menu -> sold_out ? 'true' : 'false' }} />
                </div>
            </div>
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

    @if ($reviews_list)
        @foreach ($reviews_list as $review)
            <div class="container mt-20">
                <review-card :review="{{ $review }}" :base-route="'{{ url("") }}'" :menu-id="'{{ $menu -> id }}'" :review-id="'{{ $review -> id }}'" />
            </div>
        @endforeach
    @else
        <p>レビューはありません</p>
    @endif
</div>
@endsection
