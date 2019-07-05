@foreach($permanent_list as $menus)
    <div class="container mt-20 ph-70">
        <p class="text-justify text-muted">{{ $menus['description'] }}</p>
        @foreach($menus['menus'] as $menu)
            <div class="container mt-20 ph-70">
            <menu-card :menu="{{ $menu }}" :menu-route="'{{ route('menus.detail', ['menu_id' => $menu->id]) }}'" :sold-out-route="'{{ route('menus.sold_out.store', ['menu_id' => $menu->id]) }}'" :image-route="'{{ route('menus.images', ['menu_id' => $menu->id]) }}'" />
            </div>
        @endforeach
    </div>
@endforeach
