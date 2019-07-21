@extends('layouts.default')

@section('content')
<div class="container mt-20 ph-70">
    <h2 class="text-justify">レビュー一覧</h2>

    @if (count($reviews_list) > 0)
        @foreach ($reviews_list as $review)
        <div>
            <review-card-my-page :review="{{ json_encode($review) }}" :base-route="'{{ url("") }}'" :user="{{ $user }}" />
        </div>
        @endforeach
    @else
        <div class="container mt-20">
            <div class="card">
                <div class="card-body">
                    <p>レビューはまだありません</p>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
