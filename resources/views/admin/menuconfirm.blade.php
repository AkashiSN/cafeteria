@extends('layouts.default')

@section('content')
<a href="{{ route('menuset') }}">メニューセット</a>
{{Form::open(['class' => 'form-horizontal'])}}
<div class="form-group">
    <label for="InputMenu">メニュー名</label>
    <div class="col-sm-10">{{$menuname}}</div>
    <div>
  <label for="Cost">価格</label>
  <div class="row">
    <div class="col-11">
    <div class="col-sm-10">{{$price}}</div>
    </div>
    <div class="col-1">
    円
    </div>
  </div>
  <div class="form-group mt-1">
  <label for="Inputkind">メニューの種類</label>
  <div class="col-sm-10">{{$categories[$select]}}</div>
  </div>
<label for="Ingredient"><strong>栄養素表示</strong></label>
  <div class="row mt-10">
    <div class="col-2">
      エネルギー
    </div>
    <div class="col-9">
    <div class="col-sm-10">{{$energy}}</div>
    <div class="col-1">
    kcal
    </div>
  </div>
  <div class="row mt-2">
    <div class="col-2">
      蛋白質
    </div>
    <div class="col-9">
    <div class="col-sm-10">{{$protein}}</div>
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
    <div class="col-sm-10">{{$lipid}}</div>
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
    <div class="col-sm-10">{{$salt}}</div>
      </div>
    <div class="col-1">
    g
    </div>
  </div>
    
    <button type="submit" class="btn btn-primary btn-lg btn-block mt-5">確認</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {{Form::close()}}


<form>
 </form>
@endsection