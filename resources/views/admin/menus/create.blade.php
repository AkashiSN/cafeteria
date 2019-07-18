@extends('layouts.default')

@section('content')
<a href="{{ route('admin.daily_menus.set_menu') }}">メニューセット</a>

<div class="container mt-10">
    {{ Form::model($menu, ['route' => 'admin.menus.store', 'class' => 'form-horizontal']) }}

    <div class="form-group">
        {{ Form::label('item_name', 'メニュー名') }}
        {{ Form::text('item_name', '', ['class' => 'form-control',  'placeholder' => 'メニュー名を入力してください']) }}
    </div>

    <div class="form-group">
        {{ Form::label('price', '価格') }}
        <div class="row">
            <div class="col-11">
                {{ Form::text('price', '', ['class' => 'form-control',  'placeholder' => '100']) }}
            </div>
            <div class="col-1">
                円
            </div>
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('category', 'メニューの種類') }}
        {{ Form::select('category', $descriptions, null, ['class' => 'form-control']) }}
    </div>

    <h3>栄養素表示</h3>

    <div class="form-group">
        <div class="row mt-2">
            {{ Form::label('energy', 'エネルギー', ['class' => 'col-2']) }}
            <div class="col-9">
                {{ Form::text('energy', '', ['class' => 'form-control',  'placeholder' => '100']) }}
            </div>
            <div class="col-1">
                kcal
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row mt-2">
            {{ Form::label('protein', 'たんぱく質', ['class' => 'col-2']) }}
            <div class="col-9">
                {{ Form::text('protein', '', ['class' => 'form-control',  'placeholder' => '100.0']) }}
            </div>
            <div class="col-1">
                g
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row mt-2">
            {{ Form::label('lipid', '脂質', ['class' => 'col-2']) }}
            <div class="col-9">
                {{ Form::text('lipid', '', ['class' => 'form-control',  'placeholder' => '100.0']) }}
            </div>
            <div class="col-1">
                g
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row mt-2">
            {{ Form::label('salt', '塩分', ['class' => 'col-2']) }}
            <div class="col-9">
                {{ Form::text('salt', '', ['class' => 'form-control',  'placeholder' => '100.0']) }}
            </div>
            <div class="col-1">
                g
            </div>
        </div>
    </div>

    {{ Form::submit('登録', ['class' => 'btn btn-primary btn-lg btn-block mt-5']) }}

    {{ Form::close() }}
</div>
@endsection
