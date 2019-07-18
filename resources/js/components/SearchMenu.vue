<template>
    <div class="container">
        <h2 class="text-justify text-muted mb-10">メニュー検索</h2>
        <div class="input-group">
            <input v-on:input="searchMenu" type="text" id="input-area" class="form-control" placeholder="メニュー名を入力してください">
        </div>
        <div v-for="menu in menus">
            <menu-card :is-liked="false" :menu="menu" :valid-sold-button="false" :base-route="baseRoute" />
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
