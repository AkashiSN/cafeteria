@extends('layouts.default')

@section('content')
{{ $message }}
<form method="POST" action="{{ route('menu.review.post', ['menu_id' => $menu_id]) }}">
        {{ csrf_field() }}
    <input type="text" name="evaluation" /><br />
    <input type="text" name="comment" /><br />
    <input type="submit" value="送信" />
</form>
@endsection
