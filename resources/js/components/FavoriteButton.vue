<template>
    <div class="heart" v-on:click.stop="updateFavorite">
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
                liked: this.isLiked,
                favoriteRoute: this.baseRoute + '/api/favorites'
            }
        },
        computed: {
            imgSrc: function() {
                return this.baseRoute + '/images/heart_' + (this.liked ? 'red' : 'white') + '.svg'
            }
        },
        methods: {
            updateFavorite: function() {
                if(this.liked) {
                    axios.delete(this.favoriteRoute + "/" + this.menuId).then(res => {
                        console.log(res.data)
                        if(res.data.status == 200) {
                            this.liked = !this.liked
                        }
                    })
                } else {
                    axios.post(this.favoriteRoute + "/" + this.menuId).then(res => {
                        console.log(res.data)
                        if(res.data.status == 200) {
                            this.liked = !this.liked
                        }
                    })
                }
            }
        }
    }
</script>
