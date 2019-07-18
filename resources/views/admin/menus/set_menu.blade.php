@extends('layouts.default')

@section('content')
<a href="{{ route('admin.menus.create') }}">メニュー登録</a>

<admin-page :menu-tables="{{ json_encode($menu_table) }}" :options="{{ json_encode($options) }}" :base-route="'{{ url("") }}'" />
@endsection
