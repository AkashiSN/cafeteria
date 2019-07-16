@extends('layouts.default')

@section('content')
<ul class="nav nav-tabs nav-fill">
    <li class="nav-item" v-on:click="change('1')">
        <a class="nav-link" v-bind:class="{'active': tabContent === '1'}">日替わりメニュー</a>
    </li>
    <li class="nav-item" v-on:click="change('2')">
        <a class="nav-link" v-bind:class="{'active': tabContent === '2'}">常設メニュー</a>
    </li>
</ul>

<div class="container mt-10 ph-70">
    <div class="tab-content" v-bind:class="{ active: tabContent === '1' }">
        @include('menus._daily')
    </div>
    <div class="tab-content" v-bind:class="{ active: tabContent === '2' }">
        @include('menus._permanent')
    </div>
</div>
@endsection
