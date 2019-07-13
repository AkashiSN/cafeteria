<template>
    <div class="heart" v-on:click.stop="updateFavorite()">
        <img :src="imgSrc" />
    </div>
</template>

<script>
    export default {
        props: {
            menuId: {
                type: Number,
                required: true
            },
            isLiked: {
                type: Boolean,
                required: true
            },
            baseRoute: {
                type: String,
                required: true
            }
        },
        data: function() {
            return {
                favoriteRoute: this.baseRoute + '/api/favorites/'
            }
        },
        computed: {
            imgSrc: function() {
                return this.baseRoute + '/images/heart_' + (this.isLiked ? 'red' : 'white') + '.svg'
            }
        },
        methods: {
            updateFavorite: function() {
                if(this.isLiked) {
                    axios.delete(this.favoriteRoute + this.menuId).then(res => {
                        if(res.status == 200) {
                            this.isLiked = !this.isLiked
                        }
                    })
                } else {
                    var req = { 'menu_id': this.menuId }
                    axios.post(this.favoriteRoute, req).then(res => {
                        if(res.status == 200) {
                            this.isLiked = !this.isLiked
                        }
                    })
                }
            }
        }
    }
</script>
