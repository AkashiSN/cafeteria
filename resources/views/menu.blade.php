@extends('layouts.default')

@section('content')
<div class="container mt-10">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="card-title">{{ $menu -> item_name }}</h4>
                    </div>
                    <div class="col-sm-2">
                        はぁと
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                        <h4 class="text-in-card">{{ $menu -> price}} Yen</h4>
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
                            <div class="col-sm-2 text-in-card">{{ $menu -> energy }} kcal</div>
                            <div class="col-sm-2 font-weight-bold text-in-card">脂質</div>
                            <div class="col-sm-2 text-in-card">{{ sprintf('%.1f', $menu -> lipid) }} g</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 font-weight-bold text-in-card">タンパク質</div>
                            <div class="col-sm-2 text-in-card">{{ sprintf('%.1f', $menu -> protein) }} g</div>
                            <div class="col-sm-2 font-weight-bold text-in-card">塩分</div>
                            <div class="col-sm-2 text-in-card">{{ sprintf('%.1f', $menu -> salt) }} g</div>
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
