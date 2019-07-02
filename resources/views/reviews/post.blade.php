@extends('layouts.default')

@section('content')
    <div class="card mv-15 ph-15 pv-10">
        <div class="row">
            <div class="col-11">
                <h4 class="card-title">{{ $menu['item_name'] }}</h4>
            </div>
            <div class="col-1">
                <a href="{{ route('menu.reviews', ['menu_id' => $menu_id]) }}">戻る</a>
            </div>
        </div>
    {!! Form::open(['route' => array('menu.review.post','menu_id' => $menu_id), 'method' => 'post']) !!}
        <div class="form-group">
            {!! Form::label('evaluation', '評価:') !!}
            {!! Form::text('evaluation', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('comment', 'コメント:') !!}
            {!! Form::text('comment', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('image', '写真:') !!}
            {!! Form::file('image', null, ['class' => 'form-control']) !!}
            </div>
        <div class="form-group">
            {!! Form::submit('送信', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}
    </div>
@endsection