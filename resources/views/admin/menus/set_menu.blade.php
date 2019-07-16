@extends('layouts.default')

@section('content')
<admin-page :menu-table="{{ json_encode($menu_table) }}" :options="{{ json_encode($options) }}" />
@endsection
