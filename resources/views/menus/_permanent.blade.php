@foreach($permanent_list as $menus)
    <div class="container mt-20 ph-70">
        <p class="text-justify text-muted">{{ $menus['description'] }}</p>
        @foreach($menus['menus'] as $menu)
            <div>
                <menu-card :menu="{{ $menu }}" :base-route="'{{ url("") }}'" :is-liked="{{ var_export($menu -> isLiked(), true) }}" :have-image="{{ var_export($menu -> haveImage(), true) }}" :valid-favorite-button="{{ var_export(Auth::check(), true) }}" />
            </div>
        @endforeach
    </div>
@endforeach
