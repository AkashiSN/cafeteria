@extends('layouts.default')

@section('content')
    <create-review :item_name="'{{$item_name}}'" :back_route="'{{route('menus.reviews.index', ['menu_id' => $menu_id])}}'" :store_route="'{{route('menus.reviews.store', ['menu_id' => $menu_id])}}'" />
@endsection
