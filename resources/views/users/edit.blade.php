@extends('layouts.default')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-11">
                <h4 class="card-title">ユーザー情報を変更する</h4>
            </div>
            <div class="col-md-1">
                <a href="{{ url()->previous() }}">戻る</a>
            </div>
        </div>
    </div>

@include('errors._alert')

    <div class="container my-2 px-2">
        {{ Form::model($user, ['method' => 'put', 'route' => 'my_page.store', 'class' => 'form-horizontal', 'files' => true]) }}

        <div class="form-group">
            {{ Form::label('name', 'ユーザー名') }}
            {{ Form::text('name', old('name'), ['class' => 'form-control']) }}
        </div>

        <img src="{{ $user['avatar'] }}" style="border-radius: 50%;"  width="100"/>
        {{Form::file('file', ['class' => 'form'])}}

        {{ Form::submit('登録', ['class' => 'btn btn-primary btn-lg btn-block mt-5']) }}
        {{ Form::close() }}
    </div>
</div>
@endsection
