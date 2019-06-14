<div class="card ph-15 pv-10">
    <div class="card-body">
        @if (! $menu)
        <h4 class="card-title">未定</h4>
        <p class="card-text">なんかメッセージが入るやで</p>
        @else
        <div class="row">
            <div class="col-10">
                <h4 class="card-title">{{ $menu['menu'] -> item_name }}</h4>
            </div>
            <div class="col-2">
                はぁと
            </div>
        </div>

        <div class="row">
            <div class="col-2">
                <p class="card-text">¥{{ $menu['menu'] -> price }}</p>
            </div>
            <div class="col-2">
                お星様
            </div>
        </div>

        <div class="row flex-row flex-nowrap mt-2">
            <div class="col-3">
                <img src="https://park.ajinomoto.co.jp/wp-content/uploads/2018/03/710131.jpeg" width="180" height="120" />
            </div>
            <div class="col-3">
                <img src="https://park.ajinomoto.co.jp/wp-content/uploads/2018/03/710131.jpeg" width="180" height="120" />
            </div>
            <div class="col-3">
                <img src="https://park.ajinomoto.co.jp/wp-content/uploads/2018/03/710131.jpeg" width="180" height="120" />
            </div>
        </div>

        <div class="row mt-15">
            <div class="col-10">
                <div class="row">
                    <div class="col-auto card-text font-weight-bold">エネルギー</div>
                    <div class="col-2 card-text">{{ $menu['menu'] -> energy }} kcal</div>
                    <div class="col-auto card-text font-weight-bold">脂質</div>
                    <div class="col-2 card-text">{{ sprintf('%.1f', $menu['menu'] -> lipid) }} g</div>
                </div>
                <div class="row">
                    <div class="col-auto card-text font-weight-bold">タンパク質</div>
                    <div class="col-2 card-text">{{ sprintf('%.1f', $menu['menu'] -> protein) }} g</div>
                    <div class="col-auto card-text font-weight-bold">塩分</div>
                    <div class="col-2 card-text">{{ sprintf('%.1f', $menu['menu'] -> salt) }} g</div>
                </div>
            </div>
            @if ($valid_sold_button)
            <div class="col-2">
                <button type="button" class="btn btn-success" id="button-sold-out">提供中</button>
            </div>
            @endif
        </div>
        @endif
    </div>
</div>
