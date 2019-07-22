<template>
    <div class="container">
        <h2 class="text-justify">メニューを検索する</h2>
        <div class="input-group mt-15 col-6">
            <input v-on:input="searchInterval" type="text" id="input-area" class="form-control" placeholder="メニュー名を入力してください">
        </div>
        <div class="container mt-20 ph-0">
            <div v-for="menu in menus">
                <menu-card :is-liked="false" :menu="menu" :base-route="baseRoute" :have-image="true" :valid-sold-button="false" :valid-favorite-button="false" />
            </div>
        </div>
    </div>
</template>

<script>
import { debounce } from 'lodash'
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
    created () {
        this.searchInterval = debounce(this.searchMenu, 250)
        this.searchWord = ' '
        this.fetchFilter('')
    },
    methods: {
        searchMenu(e) {
            this.searchWord = document.getElementById("input-area").value
            this.fetchFilter(this.searchWord)
        },
        fetchFilter(word) {
            var params = {
                params: {
                    'item_name': word
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
