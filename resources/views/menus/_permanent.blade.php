@foreach($permanent_list as $menus)
    <div class="container my-3">
        <p class="text-justify text-muted">{{ $menus['description'] }}</p>
        @foreach($menus['menus'] as $menu)
            <div class="my-4">
                <menu-card :menu="{{ $menu }}" :base-route="'{{ url("") }}'" :is-liked="{{ var_export($menu -> isLiked(), true) }}" :have-image="{{ var_export($menu -> haveImage(), true) }}" :valid-favorite-button="{{ var_export(Auth::check(), true) }}" />
            </div>
        @endforeach
    </div>
@endforeach
