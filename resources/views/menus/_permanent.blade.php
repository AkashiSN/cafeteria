@foreach($permanent_list as $menus)
    <div class="container mt-20 ph-70">
        <p class="text-justify text-muted">{{ $menus['description'] }}</p>
        @foreach($menus['menus'] as $menu)
            <div class="container mt-20 ph-70">
            <menu-card :menu="{{ $menu }}" :valid_sold_button="true" :route="'{{ route('menus.detail', ['menu_id' => $menu->id]) }}'" :sold_out_api_url="'{{ route('menus.sold_out.store', ['menu_id' => $menu->id]) }}'" :image_api_url="'{{ route('menus.images', ['menu_id' => $menu->id]) }}'" />
            </div>
        @endforeach
    </div>
@endforeach
