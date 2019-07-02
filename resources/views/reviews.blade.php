@extends('layouts.default')

@section('content')
<div class="container mt-10">
    @foreach ($reviews as $review)
    {{ $review["user_name"] }}
    {{ $review["create_date"] }}
    {{ $review["evaluation"] }}
    {{ $review["comment"] }}
    <br>
    @endforeach
</div>
@endsection
