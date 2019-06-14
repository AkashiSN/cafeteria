@extends('layouts.default')

@section('content')
<!-- main content -->
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
            <select class="form-control">
                <option>7/1〜7/5</option>
                <option>7/15〜7/12</option>
                <option>7/15〜7/19</option>
                <option>7/22〜7/26</option>
                <option>7/29〜7/31</option>
            </select>
        </div>
    </div>

        <p class="mt-10">7月1日</p>
        <div class="container mt-10 ph-70">
            @foreach ($menus as $menu)
            <p class="text-justify text-muted mt-3">{{ $menu['description'] }}</p>
            @include('components.menu_card', ['is_served' => true])
            @endforeach
        </div>
</div>
@endsection
