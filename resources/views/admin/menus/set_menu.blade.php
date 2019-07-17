@extends('layouts.default')

@section('content')
<a href="{{ route('admin.menus.create') }}">メニュー追加</a>

<admin-page :menu-table="{{ json_encode($menu_table) }}" :options="{{ json_encode($options) }}" />
@endsection
