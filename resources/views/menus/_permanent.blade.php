@foreach($permanent_list as $menus)
    <div class="container mt-20 ph-70">
        <p class="text-justify text-muted">{{ $menus['description'] }}</p>
        @foreach($menus['menus'] as $menu)
            <div class="container mt-20 ph-70">
            <menu-card :menu="{{ $menu }}" />
            </div>
        @endforeach
    </div>
@endforeach
