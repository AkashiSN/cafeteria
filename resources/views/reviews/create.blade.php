@extends('layouts.default')

@section('content')
    <div class="card mv-15 ph-15 pv-10">
        <div class="row">
            <div class="col-11">
                <h4 class="card-title">{{ $menu['item_name'] }}</h4>
            </div>
            <div class="col-1">
                <a href="{{ route('menu.reviews.index', ['menu_id' => $menu_id]) }}">戻る</a>
            </div>
        </div>
    {!! Form::open(['route' => array('menu.reviews.store','menu_id' => $menu_id), 'method' => 'post', "enctype"=>"multipart/form-data"]) !!}
        <div class="form-group">
            <div class="evaluation-submit">
                <input id="star1" type="radio" name="evaluation" value="5" />
                <label for="star1"><span class="text">最高</span>★</label>
                <input id="star2" type="radio" name="evaluation" value="4" />
                <label for="star2"><span class="text">良い</span>★</label>
                <input id="star3" type="radio" name="evaluation" value="3" />
                <label for="star3"><span class="text">普通</span>★</label>
                <input id="star4" type="radio" name="evaluation" value="2" />
                <label for="star4"><span class="text">悪い</span>★</label>
                <input id="star5" type="radio" name="evaluation" value="1" />
                <label for="star5"><span class="text">最悪</span>★</label>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('comment', 'コメント:') !!}
            {!! Form::text('comment', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('files[][image]', '写真:') !!}
            {!! Form::file('files[][image]', null, ['class' => 'form-control', 'multiple' => true]) !!}
            </div>
        <div class="form-group">
            {!! Form::submit('送信', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}
    </div>
@endsection
