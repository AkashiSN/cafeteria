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
                <div v-if="valid_sold_button" class="col-2">
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
            valid_sold_button: {
                type: Boolean,
                default: true
            },
            route: {
                type: String,
                required: true
            },
            sold_out_api_url: {
                type: String,
                required: true
            },
            image_api_url: {
                type: String,
                required: true
            }
        },
        data: function() {
            return {
                // for now
                soldOut: this.menu.sold_out,
                isLiked: true,
                url_list: []
            }
        },
        methods: {
            updateIsSold: function() {
                this.soldOut = !this.soldOut
                var req = { 'sold_out': this.soldOut }
                axios.post(this.sold_out_api_url, req).then(res => {
                    console.log(res)
                })
            },
            updateFavorite: function() {
                this.isLiked = !this.isLiked
            },
            jump: function() {
                location.href = this.route
            }
        },
        mounted () {
            axios.get(this.image_api_url).then(res => {
                this.url_list = res.data.url_list
            })
        }
    }
</script>
