<template>
    <div class="card mv-15 ph-15 pv-10">
        <div v-if="menu == null" class="card-body">
            <h4 class="card-title">未定</h4>
            <p class="card-text">なんかメッセージが入るやで</p>
        </div>
        <div v-else class="card-body">
            <div class="row">
                <div class="col-10">
                    <h4 class="card-title">{{ menu.item_name }}</h4>
                </div>
                <div class="col-2">
                    <button type="button" v-on:click="updateFavorite()" class="btn" v-bind:class="{ 'btn-danger': isLiked }">
                        はぁと
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p class="card-text">¥{{ menu.price }}</p>
                </div>
                <div class="col-2">
                    お星様
                </div>
            </div>

            <div class="row flex-row flex-nowrap mt-2">
                <div class="col-auto">
                    <img src="https://park.ajinomoto.co.jp/wp-content/uploads/2018/03/710131.jpeg" height="140" />
                </div>
                <div class="col-auto">
                    <img src="https://park.ajinomoto.co.jp/wp-content/uploads/2018/03/710131.jpeg" height="140" />
                </div>
                <div class="col-auto">
                    <img src="https://park.ajinomoto.co.jp/wp-content/uploads/2018/03/710131.jpeg" height="140" />
                </div>
            </div>

            <div class="row mt-15">
                <div class="col-10">
                    <div class="row">
                        <div class="col-auto card-text font-weight-bold">エネルギー</div>
                        <div class="col-2 card-text">{{ menu.energy }} kcal</div>
                        <div class="col-auto card-text font-weight-bold">脂質</div>
                        <div class="col-2 card-text">{{ menu.lipid }} g</div>
                    </div>
                    <div class="row">
                        <div class="col-auto card-text font-weight-bold">タンパク質</div>
                        <div class="col-2 card-text">{{ menu.protein }} g</div>
                        <div class="col-auto card-text font-weight-bold">塩分</div>
                        <div class="col-2 card-text">{{ menu.salt }} g</div>
                    </div>
                </div>
                <div v-if="valid_sold_button" class="col-2">
                    <button type="button" v-on:click="updateIsSold()" class="btn" v-bind:class="{ 'btn-success': isSold, 'btn-danger': !isSold }">
                        {{ isSold ? '提供中' : '売り切れ' }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            menu: {
                type: Object,
                required: true,
            },
            valid_sold_button: {
                type: Boolean,
                default: true
            }
        },
        data: function() {
            return {
                // for now
                isSold: true,
                isLiked: true
            }
        },
        methods: {
            updateIsSold: function() {
                this.isSold = !this.isSold
            },
            updateFavorite: function() {
                this.isLiked = !this.isLiked
            }
        },
    }
</script>
