@foreach($permanent_list as $menus)
    <div class="container mt-20 ph-70">
        <p class="text-justify text-muted">{{ $menus['description'] }}</p>
        @foreach($menus['menus'] as $_ => $menu)
            <menu-card :menu="{{ $menu }}" :valid_sold_button="true" :route="'{{ route('menu.detail', ['menu_id' => $menu -> menu_id]) }}'"/>
        @endforeach
    </div>
@endforeach
