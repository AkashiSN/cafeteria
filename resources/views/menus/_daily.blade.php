<div class="row">
    <div class="col-md-5 col-sm-7">
        <select class="custom-select custom-select-sm my-2" v-model="activeContent">
            @foreach($options as $index => $option)
            <option value="{{ $index }}">
                {{ $option }}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="container px-2">
@foreach($daily_schedule as $index => $weekly_list)
    <div class="select-content" v-bind:class="{ active: activeContent === '{{ $index }}' }">
        @foreach($weekly_list as $menus)
            @foreach($menus as $date => $todays_menu)
                <p class="my-3">{{ $date }}</p>
                @foreach ($todays_menu as $menu)
                    <div class="container my-3 px-3">
                        <p class="text-justify text-muted">{{ $menu['description'] }}</p>
                        <menu-card :menu="{{ $menu['menu'] }}" :base-route="'{{ url("") }}'" :is-liked="{{ var_export($menu['menu'] -> isLiked(), true) }}" :have-image="{{ var_export($menu['menu'] -> haveImage(), true) }}" :valid-favorite-button="{{ var_export(Auth::check() && !Auth::user() -> is_admin, true) }}" />
                    </div>
                @endforeach
            @endforeach
        @endforeach
    </div>
@endforeach
</div>
