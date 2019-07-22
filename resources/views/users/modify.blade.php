@extends('layouts.default')

@section('content')
<h2>ユーザー情報を変更する</h2>
@include('errors._alert')

<div class="container mt-10 ph-0">

{{ Form::model($user, ['method' => 'put', 'route' => 'my_page.store', 'class' => 'form-horizontal']) }}

<div class="form-group">
    {{ Form::label('user_name', 'ユーザー名') }}
    {{ Form::text('user_name', old('user_name'), ['class' => 'form-control',  'placeholder' => $user['name']]) }}
</div>

<img src="{{ $user['avatar'] }}" style="border-radius: 50%;"  width="100"/>
<input name="files[][image]" type="file" id="files[][image]" class="col-9" data-filesize="5000">


{{ Form::submit('登録', ['class' => 'btn btn-primary btn-lg btn-block mt-5']) }}
{{ Form::close() }}
</div>
@endsection
