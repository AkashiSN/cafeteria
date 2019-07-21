@extends('layouts.default')

@section('content')
<div style="text-align: center;">
    <img src="{{ route('home') }}/images/karameru.jpg" style="border-radius: 50%; width: 40%;" />
    <p class="text-center">Copyright &copy; からめる, @purinharumaki</p>

    <h2 class="text-center">{{ $user -> name }}</h2>

    <a class="btn btn-primary" href="{{ route('my_page.reviews') }}" role="button">レビューをみる</a>
    <a class="btn btn-primary" href="{{ route('my_page.favorites') }}" role="button">お気に入りをみる</a>
</div>
@endsection
