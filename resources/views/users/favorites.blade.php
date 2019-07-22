@extends('layouts.default')

@section('content')
<div class="container mt-20 ph-70">
    <h2 class="text-justify">お気に入り一覧</h2>
    @if (count($menus))
        @foreach($menus as $menu)
            <div>
                <menu-card :menu="{{ $menu }}" :base-route="'{{ url("") }}'" :is-liked="{{ var_export($menu -> isLiked(), true) }}" :have-image="{{ var_export($menu -> haveImage(), true) }}" />
            </div>
        @endforeach
    @else
        <div class="container mt-20">
            <div class="card">
                <div class="card-body">
                    <p>お気に入りメニューはまだありません</p>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
