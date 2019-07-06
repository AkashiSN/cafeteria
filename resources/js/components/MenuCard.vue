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
                <div class="col-auto" v-for='(url, index) in urlList' :key='index'>
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
            }
        },
        data: function() {
            return {
                isLiked: true,
                menuRoute: '/menus/' + this.menu.id,
                soldOutRoute: '/api/menus/' + this.menu.id + '/sold_out',
                imageRoute: '/api/menus/' + this.menu.id + '/images',
                soldOut: this.menu.sold_out,
                urlList: []
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
            'menu.id': function() {
                this.menuRoute = '/menus/' + this.menu.id,
                this.soldOutRoute = '/api/menus/' + this.menu.id + '/sold_out',
                this.imageRoute = '/api/menus/' + this.menu.id + '/images',

                axios.get(this.soldOutRoute).then(res => {
                    this.soldOut = res.data.sold_out
                })
                axios.get(this.imageRoute).then(res => {
                    this.urlList = res.data.url_list
                })
            }
        }
    }
</script>
