@extends('layouts.default')

@section('content')

@include('errors._alert')

<div class="mv-15 ph-15 pv-10">
    <div class="row">
        <div class="col-10">
            <h4 class="card-title">メニューを設定する</h4>
        </div>
        <div class="col-2">
            <a href="{{ route('admin.menus.create') }}">メニュー登録へ</a>
        </div>
    </div>

    <edit-menu-settings :menu-tables="{{ json_encode($menu_tables) }}" :options="{{ json_encode($options) }}" :base-route="'{{ url("") }}'" />
</div>
@endsection
