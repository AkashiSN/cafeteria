@extends('layouts.default')

@section('content')

<form>
  <div class="form-group">
    <label for="InputMenu">メニュー名</label>
    <input type="text" class="form-control" id="menuname" aria-describedby="メニュー名" placeholder="メニュー名を入力してください">
  </div>
  <label for="Cost">価格</label>
  <div class="row">
    <div class="col-11">
      <input type="text" class="form-control" placeholder="100">
    </div>
    <div class="col-1">
    円
    </div>
  </div>
  <div class="form-group mt-1">
    <label for="Inputkind">メニューの種類</label>
    <select class="form-control">
       <option>常設メニュー</option>
       <option>日替わりメニュー</option>
    </select>
  </div>
<label for="Ingredient"><strong>栄養素表示</strong></label>
  <div class="row mt-10">
    <div class="col-2">
      エネルギー
    </div>
    <div class="col-9">
      <input type="text" class="form-control" placeholder="100">
    </div>
    <div class="col-1">
    kcal
    </div>
  </div>
  <div class="row mt-2">
    <div class="col-2">
      蛋白質
    </div>
    <div class="col-9">
      <input type="text" class="form-control" placeholder="100.0">
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
      <input type="text" class="form-control" placeholder="100.0">
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
      <input type="text" class="form-control" placeholder="100.0">
    </div>
    <div class="col-1">
    g
    </div>
  </div>
    
    <button type="submit" class="btn btn-primary btn-lg btn-block mt-5">Submit</button>
</form>
@endsection