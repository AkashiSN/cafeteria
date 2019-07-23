@extends('layouts.default')

@section('content')
<div class="container my-3 px-4">
    <h2 class="text-justify">お気に入り一覧</h2>
    @if (count($menus))
        @foreach($menus as $menu)
            <div class="mt-3">
                <menu-card :menu="{{ $menu }}" :base-route="'{{ url("") }}'" :is-liked="{{ var_export($menu -> isLiked(), true) }}" :valid-sold-button="false" :have-image="{{ var_export($menu -> haveImage(), true) }}" />
            </div>
        @endforeach
    @else
        <div class="container mt-3">
            <div class="card">
                <div class="card-body">
                    <p>お気に入りメニューはまだありません</p>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
