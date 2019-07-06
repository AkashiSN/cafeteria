<template>
    <div class="card mv-15 ph-15 pv-10">
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <h5 class="card-text">{{ review.name }}</h5>
                </div>
                <div class="col-4">
                    <span class="evaluation" v-bind:style="{ '--rate': evaluation }"></span><br/>
                </div>
                <div class="col-6">
                    <p class="card-text text-muted">{{ review.created_at }}</p>
                </div>
            </div>

            <div class="row mt-15">
                <div class="col-auto">
                    <p class="card-text">{{ review.comment }}</p>
                </div>
            </div>

            <div class="row flex-row flex-nowrap mt-2">
                <div class="col-auto" v-for='(url, index) in url_list' :key='index'>
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
            image_api_url: {
                type: String,
                required: true
            }
        },
        data: function() {
            return {
                // for now
                evaluation: this.review.evaluation * 20 + "%",
                url_list: []
            }
        },
        mounted () {
            axios.get(this.image_api_url).then(res => {
                this.url_list = res.data.url_list
            })
        }
    }
</script>
