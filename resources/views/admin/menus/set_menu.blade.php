@extends('layouts.default')

@section('content')
<a class="btn btn-link" href="{{ route('admin.menus.create') }}">メニュー登録へ</a>

@include('errors._alert')

<h2>メニューを設定する</h2>

<edit-menu-settings :menu-tables="{{ json_encode($menu_tables) }}" :options="{{ json_encode($options) }}" :base-route="'{{ url("") }}'" />
@endsection
