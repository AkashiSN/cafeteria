<template>
    <div class="container">
        <h2 class="text-justify">メニューを検索する</h2>
        <div class="input-group mt-15 col-6">
            <input v-on:input="searchMenu" type="text" id="input-area" class="form-control" placeholder="メニュー名を入力してください">
        </div>
        <div class="container mt-20 ph-0">
            <div v-for="menu in menus">
                <menu-card :is-liked="false" :menu="menu" :base-route="baseRoute" :valid-sold-button="false" :valid-favorite-button="false" />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        baseRoute: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            searchWord: '',
            menus: []
        }
    },
    methods: {
        searchMenu(e) {
            this.searchWord = document.getElementById("input-area").value

            var params = {
                params: {
                    'item_name': this.searchWord
                }
            }

            axios.get(this.baseRoute + '/api/menus/filter', params).then(res => {
                if(res.data.status == 200) {
                    this.menus = res.data.menus
                }
            })
        }
    }
}
</script>
