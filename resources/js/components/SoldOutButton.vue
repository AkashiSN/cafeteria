<template>
    <button type="button" v-on:click.stop="updateIsSold()" class="btn" v-bind:class="[status ? 'btn-danger' : 'btn-success']">
        {{ buttonText }}
    </button>
</template>

<script>
    export default {
        props: {
            menuId: {
                type: Number,
                required: true
            },
            soldOut: {
                type: Boolean,
                required: true
            }
        },
        data: function() {
            return {
                soldOutRoute: '/api/menus/' + this.menuId + '/sold_out',
                status: this.soldOut
            }
        },
        computed: {
            buttonText: function() {
                return this.status ? '売り切れ' : '提供中'
            }
        },
        methods: {
            updateIsSold: function() {
                var newStatus = !this.status
                var req = { 'sold_out': newStatus }

                axios.post(this.soldOutRoute, req).then(res => {
                    if(res.status == 200) {
                        this.status = newStatus
                    }
                })
            }
        }
    }
</script>
