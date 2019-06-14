@extends('layouts.default')

@section('content')
<ul class="nav nav-tabs nav-fill">
    @if ($mode == "daily")
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('menu.daily') }}">日替わりメニュー</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('menu.permanent') }}">常設メニュー</a>
    </li>
    @elseif ($mode == "permanent")
    <li class="nav-item">
        <a class="nav-link" href="{{ route('menu.daily') }}">日替わりメニュー</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('menu.permanent') }}">常設メニュー</a>
    </li>
    @endif
</ul>

<div class="container mt-10 ph-70">
    <div class="row">
        <div class="col-4">
            <select class="custom-select custom-select-sm">
                @foreach($select_options as $option)
                <option>{{ $option }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <p class="mt-10">7月1日</p>
    <div class="container mt-10 ph-70">
        @foreach ($menus as $menu)
        <p class="text-justify text-muted mt-3">{{ $menu['description'] }}</p>
        @include('components.menu_card', ['valid_sold_button' => true])
        @endforeach
    </div>
</div>
@endsection
