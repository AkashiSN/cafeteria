<template>
    <div class="card mv-15 ph-15 pv-10">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h5 class="card-text">{{ user_name }}</h5>
                </div>
                <div class="col-3">
                    <p class="card-text text-muted">{{ review.created_at }}</p>
                </div>
                <div class="col-1">
                    <p class="card-text">{{ review.evaluation }}</p>
                </div>
            </div>

            <div class="row mt-15">
                <div class="col-auto">
                    <p class="card-text">{{ review.comment }}</p>
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
            user_name: {
                type: String,
                required: true
            }
        }
    }
</script>
