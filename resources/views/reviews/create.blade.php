@extends('layouts.default')

@section('content')
    <create-review :item_name="'{{$item_name}}'" :back_route="'{{route('menu.reviews.index', ['menu_id' => $menu_id])}}'" :store_route="'{{route('menu.reviews.store', ['menu_id' => $menu_id])}}'" />
@endsection
