<div class="card ph-10 pv-10">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-10">
                <h4 class="card-title">{{ $menu['menu'] -> item_name }}</h4>
            </div>
            <div class="col-sm-2">
                はぁと
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-sm-2">
                <p class="card-text">¥{{ $menu['menu'] -> price }}</p>
            </div>
            <div class="col-sm-3">
                お星様
            </div>
        </div>

        <div class="container-fluid">
            <div class="row flex-row flex-nowrap">
                <div class="col-3">
                    <img src="https://park.ajinomoto.co.jp/wp-content/uploads/2018/03/710131.jpeg" width="150" height="100" />
                </div>
                <div class="col-3">
                    <img src="https://park.ajinomoto.co.jp/wp-content/uploads/2018/03/710131.jpeg" width="150" height="100" />
                </div>
                <div class="col-3">
                    <img src="https://park.ajinomoto.co.jp/wp-content/uploads/2018/03/710131.jpeg" width="150" height="100" />
                </div>
            </div>
        </div>

        <div class="row mt-15">
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-2 font-weight-bold card-text">エネルギー</div>
                    <div class="col-sm-2 card-text">{{ $menu['menu'] -> energy }} kcal</div>
                    <div class="col-sm-2 font-weight-bold card-text">脂質</div>
                    <div class="col-sm-2 card-text">{{ sprintf('%.1f', $menu['menu'] -> lipid) }} g</div>
                </div>
                <div class="row">
                    <div class="col-sm-2 font-weight-bold card-text">タンパク質</div>
                    <div class="col-sm-2 card-text">{{ sprintf('%.1f', $menu['menu'] -> protein) }} g</div>
                    <div class="col-sm-2 font-weight-bold card-text">塩分</div>
                    <div class="col-sm-2 card-text">{{ sprintf('%.1f', $menu['menu'] -> salt) }} g</div>
                </div>
            </div>
            @if ($is_served)
            <div class="col-sm-2">
                <button type="button" class="btn btn-success" id="button-sold-out">提供中</button>
            </div>
            @endif
        </div>
    </div>
</div>
