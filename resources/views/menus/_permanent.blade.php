@foreach($permanent_list as $menus)
    <div class="container mt-20 ph-75">
        <p class="text-justify text-muted">{{ $menus['description'] }}</p>
        @foreach($menus['menus'] as $menu)
            <menu-card :menu="{{ $menu }}" :base-route="'{{ url("") }}'" :is-liked="{{ var_export($menu -> isLiked(), true) }}" :valid-favorite-button="{{ var_export(Auth::check(), true) }}" />
        @endforeach
    </div>
@endforeach
