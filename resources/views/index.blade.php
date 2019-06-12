<!DOCTYPE html>
<html lang="en">

<head>
    <title>NITAC Cafeteria</title>
</head>

@extends('layouts.default')

<!-- main content -->
@section('content')
<ul class="nav nav-tabs nav-fill">
  <li class="nav-item">
    <a class="nav-link active" href="#">日替わりメニュー</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">常設メニュー</a>
  </li>
</ul>

<div class="container ph-20 mt-10">
    <div class="row">
        <div class="col-4">
            <select class="form-control" id="exampleFormControlSelect1">
                <option>7/1〜7/5</option>
                <option>7/15〜7/12</option>
                <option>7/15〜7/19</option>
                <option>7/22〜7/26</option>
                <option>7/29〜7/31</option>
            </select>
        </div>
    </div>

    <div class="container mt-10">
        <p>7月1日</p>

        <p class="text-justify text-muted">Aセット (みそ汁、ご飯付)</p>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="card-title">焼肉定食</h4>
                    </div>
                    <div class="col-sm-2">
                        はぁと
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                        <h4 class="text-in-card">500 Yen</h4>
                    </div>
                    <div class="col-sm-2">
                        お星様
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row flex-row flex-nowrap">
                        <div class="col-2">
                            <img src="https://park.ajinomoto.co.jp/wp-content/uploads/2018/03/710131.jpeg" width="150" height="100" />
                        </div>
                        <div class="col-2">
                            <img src="https://park.ajinomoto.co.jp/wp-content/uploads/2018/03/710131.jpeg" width="150" height="100" />
                        </div>
                        <div class="col-2">
                            <img src="https://park.ajinomoto.co.jp/wp-content/uploads/2018/03/710131.jpeg" width="150" height="100" />
                        </div>
                    </div>
                </div>

                <div class="row mt-15">
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-2 font-weight-bold text-in-card">エネルギー</div>
                            <div class="col-sm-2 text-in-card">100 kcal</div>
                            <div class="col-sm-2 font-weight-bold text-in-card">脂質</div>
                            <div class="col-sm-2 text-in-card">100.0 g</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 font-weight-bold text-in-card">タンパク質</div>
                            <div class="col-sm-2 text-in-card">100.0 g</div>
                            <div class="col-sm-2 font-weight-bold text-in-card">塩分</div>
                            <div class="col-sm-2 text-in-card">100.0 g</div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-success btn-lg">提供中</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

</html>
