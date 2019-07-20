@extends('layouts.default')

@section('content')
<a class="btn btn-link" href="{{ route('admin.menus.create') }}">メニューを登録する</a>

@include('errors._alert')

<edit-menu-settings :menu-tables="{{ json_encode($menu_tables) }}" :options="{{ json_encode($options) }}" :base-route="'{{ url("") }}'" />
@endsection
