@extends('layouts.default')

@section('content')
<a class="btn btn-link" href="{{ route('admin.menus.set_menu') }}">メニュー設定へ</a>

@include('errors._alert')

<h2>メニューを登録する</h2>

<div class="container mt-10 ph-0">
    {{ Form::model($menu, ['route' => 'admin.menus.store', 'class' => 'form-horizontal']) }}

    <div class="form-group">
        {{ Form::label('item_name', 'メニュー名') }}
        {{ Form::text('item_name', old('item_name'), ['class' => 'form-control',  'placeholder' => 'メニュー名', 'required']) }}
    </div>

    <div class="form-group">
        {{ Form::label('price', '価格') }}
        <div class="row">
            <div class="col-11">
                {{ Form::number('price', old('price'), ['class' => 'form-control',  'placeholder' => '100', 'required']) }}
            </div>
            <div class="col-1">
                円
            </div>
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('category', 'メニューの種類') }}
        {{ Form::select('category', $descriptions, old('category'), ['class' => 'form-control', 'placeholder' => '選択してください', 'required']) }}
    </div>

    <h3 class="mb-10">栄養素表示</h3>

    <div class="form-group">
        <div class="row mt-2">
            {{ Form::label('energy', 'エネルギー', ['class' => 'col-2']) }}
            <div class="col-9">
                {{ Form::number('energy', old('energy'), ['class' => 'form-control',  'placeholder' => '100', 'required']) }}
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
                {{ Form::number('protein', old('protein'), ['class' => 'form-control',  'placeholder' => '100.0', 'required']) }}
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
                {{ Form::number('lipid', old('lipid'), ['class' => 'form-control',  'placeholder' => '100.0', 'required']) }}
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
                {{ Form::number('salt', old('salt'), ['class' => 'form-control',  'placeholder' => '100.0', 'required']) }}
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
