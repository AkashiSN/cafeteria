<template>
    <div class="card mv-15 ph-15 pv-10">
        <div class="card-body">
            <div class="row">
                <div class="col-9">
                    <div class="row">
                        <div class="col-auto">
                            <img :src="user.avatar" style="border-radius: 50%;" width="40">
                        </div>
                        <div class="col-auto">
                            <h5 class="card-text" style="display: flex;">{{ review.menu.item_name }}</h5>
                        </div>
                        <div class="col-auto">
                            <span class="evaluation" v-bind:style="{ '--rate': evaluation }"></span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <p class="card-text text-muted">{{ review.created_at }}</p>
                </div>
            </div>

            <div class="row mt-15">
                <div class="col-auto">
                    <p class="card-text">{{ review.comment }}</p>
                </div>
            </div>

            <div class="row flex-row flex-nowrap mt-2">
                <div class="col-auto" v-for='(url, index) in urlList' :key='index'>
                    <img :src="url" height="140" >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            review: {
                type: Object,
                required: true,
            },
            baseRoute: {
                type: String,
                required: true
            },
            user: {
                type: Object,
                required: true
            }
        },
        data: function() {
            return {
                // for now
                evaluation: this.review.evaluation * 20 + "%",
                imageRoute: this.baseRoute + "/api/menus/" + this.review.menu.id + "/reviews/" + this.review.review_id + "/images",
                urlList: []
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
