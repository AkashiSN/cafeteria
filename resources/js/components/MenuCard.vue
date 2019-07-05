<template>
    <div class="card mv-15 ph-15 pv-10" v-on:click="jump()">
        <div class="card-body">
            <div class="row">
                <div class="col-10">
                    <h4 class="card-title">{{ menu.item_name }}</h4>
                </div>
                <div class="col-2">
                    <button type="button" v-on:click.stop="updateFavorite()" class="btn" v-bind:class="{ 'btn-danger': isLiked }">
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

            <div class="row row-scrollable mt-2">
                <div class="col-auto" v-for='(url, index) in url_list' :key='index'>
                    <img :src="url" height="140" >
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
                <div v-if="validSoldButton" class="col-2">
                    <button type="button" v-on:click.stop="updateIsSold()" class="btn" v-bind:class="[soldOut ? 'btn-danger' : 'btn-success']">
                        {{ soldOut ? '売り切れ' : '提供中' }}
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
                required: true
            },
            validSoldButton: {
                type: Boolean,
                default: true
            },
            menuRoute: {
                type: String,
                required: true
            },
            soldOutRoute: {
                type: String,
                required: true
            },
            imageRoute: {
                type: String,
                required: true
            }
        },
        data: function() {
            return {
                // for now
                isLiked: true,
                soldOut: this.menu.sold_out,
                url_list: []
            }
        },
        methods: {
            updateIsSold: function() {
                var newSoldOut = !this.soldOut
                var req = { 'sold_out': newSoldOut }

                axios.post(this.soldOutRoute, req).then(res => {
                    if(res.status == 200) {
                        this.soldOut = newSoldOut
                    }
                })
            },
            updateFavorite: function() {
                this.isLiked = !this.isLiked
            },
            jump: function() {
                location.href = this.menuRoute
            }
        },
        watch: {
            'menu.menu_id': function() {
                this.soldOut = this.menu.sold_out
            }
        },
        mounted () {
            axios.get(this.imageRoute).then(res => {
                this.url_list = res.data.url_list
            })
        }
    }
</script>
