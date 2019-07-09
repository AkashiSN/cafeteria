@extends('layouts.default')

@section('content')
<a href="{{ route('my_page.reviews') }}">reviews</a>
<a href="{{ route('my_page.favorites') }}">favorites</a>
@endsection
