@extends('layouts.default')

@section('content')
<a href="{{ route('admin.menus.set_menu') }}">メニューセット</a>

<admin-page :menu-table="{{ json_encode($menu_table) }}" :options="{{ json_encode($options) }}" />
@endsection
