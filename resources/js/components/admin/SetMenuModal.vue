<template>
  <transition name="modal" appear>
    <div class="modal" tabindex="-1" @click.self="$emit('close')">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ title }}</h5>
                    <button type="button" class="btn btn-light" @click="$emit('close')">閉じる</button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <input v-model="searchWord" v-on:input="searchInterval" type="text" id="input-area" class="form-control">
                    </div>
                    <div class="list-group">
                        <button v-for="menu in menus" type="button" @click="selectMenu(menu)" class="list-group-item list-group-item-action" tabindex="0" >
                            {{ menu.item_name }}
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="createMenu(searchWord)">この名前のメニューを作成</button>
                    <button type="button" class="btn btn-primary" @click="$emit('update', newMenu)">変更する</button>
                </div>
            </div>
        </div>
    </div>
    </transition>
</template>

<script>
import { debounce } from 'lodash'

export default {
    props: {
        menu: {
            type: Object,
            required: true
        },
        date: {
            type: String,
            required: true
        },
        baseRoute: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            searchWord: this.menu ? this.menu.item_name : '',
            menus: [],
            newMenu: {}
        }
    },
    computed: {
        title() {
            var category = this.menu.category === 'a_set_menu' ? 'Aセット' : 'Bセット'
            return this.date + ' ' + category
        }
    },
    created () {
        this.searchInterval = debounce(this.searchMenu, 250)
    },
    methods: {
        searchMenu() {
            this.newMenu = {}
            this.searchWord = document.getElementById("input-area").value

            var params = {
                params: {
                    'item_name': this.searchWord,
                    'category': this.menu.category
                }
            }

            axios.get(this.baseRoute + '/api/menus/filter', params).then(res => {
                if(res.data.status == 200) {
                    this.menus = res.data.menus.slice(0, 9)
                }
            })
        },
        selectMenu(menu) {
            this.newMenu = menu
            this.searchWord = menu.item_name
            this.menus = []
        },
        createMenu(word) {
            location.href = this.baseRoute + '/admin/menus/create?item_name=' + word
        }
    }
}
</script>

<style lang="scss">
.modal {
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 30;
    background: rgba(0, 0, 0, 0.5);
}

.modal-enter-active, .modal-leave-active {
    transition: opacity 0.4s;

    .modal-dialog {
        transition: opacity 0.4s, transform 0.4s;
    }
}

.modal-leave-active {
    transition: opacity 0.6s ease 0.4s;
}

.modal-enter, .modal-leave-to {
    opacity: 0;

    .modal-dialog {
        opacity: 0;
        transform: translateY(-20px);
    }
}
</style>
