@extends('layouts.default')

@section('content')
    @include('errors._alert')

    <create-review :item-name="'{{ $item_name }}'" :base-route="'{{ url("") }}'" :menu-id="'{{ $menu_id }}'" />
@endsection
