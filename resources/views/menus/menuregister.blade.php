@extends('layouts.default')

@section('content')

<a href="{{ route('menuset') }}">メニューセット</a>
{{Form::open(['route' => 'confirm', 'class' => 'form-horizontal'])}}
<div class="form-group">
    <label for="InputMenu">メニュー名</label>
    {{ Form::text('menuname', '', ['class' => 'form-control',  'placeholder' => 'メニュー名を入力してください']) }}
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
  <label for="Inputkind">メニューの種類</label>
  {{Form::select('select', $categories, null, ['class' => 'form-control'])}}     
  </div>
<label for="Ingredient"><strong>栄養素表示</strong></label>
  <div class="row mt-10">
    <div class="col-2">
      エネルギー
    </div>
    <div class="col-9">
    {{ Form::text('energy', '', ['class' => 'form-control',  'placeholder' => '100']) }}    </div>
    <div class="col-1">
    kcal
    </div>
  </div>
  <div class="row mt-2">
    <div class="col-2">
      蛋白質
    </div>
    <div class="col-9">
    {{ Form::text('protein', '', ['class' => 'form-control',  'placeholder' => '100.0']) }}
    </div>
    <div class="col-1">
    g
    </div>
  </div>
  <div class="row mt-2">
    <div class="col-2">
        脂質
    </div>
    <div class="col-9">
    {{ Form::text('lipid', '', ['class' => 'form-control',  'placeholder' => '100.0']) }}
    </div>
    <div class="col-1">
    g
    </div>
  </div>
  <div class="row mt-2">
    <div class="col-2">
        塩分
    </div>
    <div class="col-9">
    {{ Form::text('salt', '', ['class' => 'form-control',  'placeholder' => '100.0']) }}
    </div>
    <div class="col-1">
    g
    </div>
  </div>
    
    <button type="submit" class="btn btn-primary btn-lg btn-block mt-5">Submit</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {{Form::close()}}


<form>
 </form>
@endsection