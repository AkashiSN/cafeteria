<div class="row">
    <div class="col-4">
        <select class="custom-select custom-select-sm mv-3" v-model="activeContent">
            @foreach($select_options as $index => $option)
            <option value="{{ $index }}">
                {{ $option }}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="container ph-5">
@foreach($daily_schedule as $index => $weekly_list)
    <div v-if="activeContent === '{{ $index }}'">
        @foreach($weekly_list as $menus)
            @foreach($menus as $date => $todays_menu)
                <p class="mt-3">{{ $date }}</p>
                <div class="container mt-20 ph-65">
                    @foreach ($todays_menu as $menu)
                        <p class="text-justify text-muted">{{ $menu['description'] }}</p>
                        <menu-card :menu="{{ $menu['menu'] }}" :menu-route="'{{ route('menus.detail', ['menu_id' => $menu['menu']->id]) }}'" :sold-out-route="'{{ route('menus.sold_out.store', ['menu_id' => $menu['menu']->id]) }}'" :image-route="'{{ route('menus.images', ['menu_id' => $menu['menu']->id]) }}'" />
                    @endforeach
                </div>
            @endforeach
        @endforeach
    </div>
@endforeach
</div>
