@extends('layouts.default')

@section('content')
<a href="{{ route('admin.menus.create') }}">メニューを登録する</a>

<admin-page :menu-tables="{{ json_encode($menu_tables) }}" :options="{{ json_encode($options) }}" :base-route="'{{ url("") }}'" />
@endsection
