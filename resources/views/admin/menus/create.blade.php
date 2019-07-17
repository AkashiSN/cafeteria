@extends('layouts.default')

@section('content')
    <a href="{{ route('menuset') }}">メニューセット</a>

    {{ Form::model($menu, ['route' => 'admin.menus.store', 'class' => 'form-horizontal']) }}

    <div class="form-group">
        <label for="ItemName">メニュー名</label>
        {{ Form::text('item_name', '', ['class' => 'form-control',  'placeholder' => 'メニュー名を入力してください']) }}
    </div>

    <label for="Price">価格</label>
    <div class="row">
        <div class="col-11">
            {{ Form::text('price', '', ['class' => 'form-control',  'placeholder' => '100']) }}
        </div>
        <div class="col-1">
            円
        </div>
    </div>

    <div class="form-group mt-1">
        <label for="Category">メニューの種類</label>
        {{Form::select('select', $categories, null, ['class' => 'form-control'])}}
    </div>

    <label for="Ingredients mb-8">栄養素表示</label>
    <div class="row mt-2">
        <label for="Energy" class="mt-2">エネルギー</label>
        <div class="col-9">
            {{ Form::text('energy', '', ['class' => 'form-control',  'placeholder' => '100']) }}
        </div>
        <div class="col-1">
            kcal
        </div>
    </div>

    <div class="row mt-2">
        <label for="Protein" class="mt-2">たんぱく質</label>
        <div class="col-9">
            {{ Form::text('protein', '', ['class' => 'form-control',  'placeholder' => '100.0']) }}
        </div>
        <div class="col-1">
            g
        </div>
    </div>

    <div class="row mt-2">
        <label for="Lipid" class="mt-2">脂質</label>
        <div class="col-9">
            {{ Form::text('lipid', '', ['class' => 'form-control',  'placeholder' => '100.0']) }}
        </div>
        <div class="col-1">
            g
        </div>
    </div>

    <div class="row mt-2">
        <label for="Salt" class="mt-2">塩分</label>
        <div class="col-9">
            {{ Form::text('salt', '', ['class' => 'form-control',  'placeholder' => '100.0']) }}
        </div>
        <div class="col-1">
            g
        </div>
    </div>

    {{Form::submit('', ['class' => 'btn btn-primary btn-lg btn-block mt-5'])}}

    {{Form::close()}}
@endsection
