<template>
    <div class="card mv-15 ph-15 pv-10" v-on:click="jump()">
        <div class="card-body">
            <div class="row">
                <div class="col-10">
                    <h4 class="card-title">{{ menu.item_name }}</h4>
                </div>
                <div class="col-2">
                    <favorite-button :menu-id="menu.id" :base-route="this.baseRoute" :is-liked="isLiked" />
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
                    <sold-out-button :menu-id="menu.id" :base-route="this.baseRoute" :sold-out="menu.sold_out" />
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
            isLiked: {
                type: Boolean,
                required: true
            },
            validSoldButton: {
                type: Boolean,
                default: true
            },
            baseRoute: {
                type: String,
                required: true
            }
        },
        data: function() {
            return {
                menuRoute: this.baseRoute + '/menus/' + this.menu.id,
                imageRoute: this.baseRoute +  '/api/menus/' + this.menu.id + '/images',
                urlList: []
            }
        },
        methods: {
            updateFavorite: function() {
                this.isLiked = !this.isLiked
            },
            jump: function() {
                location.href = this.menuRoute
            }
        },
        mounted () {
            axios.get(this.imageRoute).then(res => {
                if(res.data.status == 200) {
                    this.urlList = res.data.url_list
                }
            })
        }
    }
</script>
