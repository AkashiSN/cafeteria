<template>
    <div class="container ph-0">
        <h2>提供メニューを設定する</h2>

        <label for="daily-menu" class="mt-10">日替わりメニュー</label>

        <div class="row mt-10 mb-15">
            <div class="col-4">
                <select class="custom-select custom-select-sm" v-model="activeContent">
                    <option v-for="(option, index) in options" :key="index" v-bind:value="index">
                    {{ option }}
                    </option>
                </select>
            </div>
        </div>

        <div v-for="(weeklyList, index) in tables" :key="index" id="daily-menu">
            <div class="select-content ph-10" v-bind:class="{ active: activeContent === index }">
                <set-menu :weekly-list="weeklyList" :table-index="index" v-on:open="openModal" />
            </div>
        </div>

        <label for="ramen">提供ラーメン</label>
        <select v-model="selectedRamenId" class="custom-select" id="ramen" v-on:change="updateRamen">
            <option v-for="ramen in ramens" v-bind:value="ramen.id">{{ ramen.item_name }}</option>
        </select>

        <div class="form-check mt-10">
            <input type="checkbox" class="form-check-input" id="summer">
            <label for="summer" class="form-check-label">夏メニューにする</label>
        </div>

        <set-menu-modal v-if="modalAvailable" :menu="selectedMenu" :date="selectedDate" :base-route="baseRoute" v-on:update="updateMenu" v-on:delete="deleteMenu" v-on:close="closeModal" />
    </div>
</template>

<script>
export default {
    props: {
        menuTables: {
            type: Array,
            required: true
        },
        options: {
            type: Array,
            required: true
        },
        baseRoute: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            tables: this.menuTables,
            modalAvailable: false,
            activeContent: 0,
            ramens: [],
            selectedRamenId: 0
        }
    },
    methods: {
        openModal(menu, date) {
            this.selectedMenu = menu
            this.selectedDate = date
            this.modalAvailable = true
        },
        closeModal() {
            this.modalAvailable = false
        },
        deleteMenu() {
            this.closeModal()
        },
        updateMenu(newMenu) {
            if(Object.keys(newMenu).length === 0) {
                return
            }

            var req = {
                'menu_id': newMenu.id,
                'category': newMenu.category,
                'date': this.selectedDate
            }

            axios.put(this.baseRoute + '/api/admin/set_menu', req).then(res => {
                if(res.data.status == 200) {
                    var table = this.tables[this.activeContent]
                    table[this.selectedDate][this.selectedMenu.category] = newMenu
                }
            })
            this.closeModal()
        },
        updateRamen() {
            var req = { 'id': this.selectedRamenId }
            axios.put(this.baseRoute + '/api/admin/update_ramen', req).then(res => {
                if(res.data.status == 200) {
                    console.log('Changed!')
                }
            })
        }
    },
    mounted () {
        axios.get(this.baseRoute + '/api/admin/ramens').then(res => {
            if(res.data.status == 200) {
                this.ramens = res.data.ramens
                this.selectedRamenId = res.data.now_ramen_id
            }
        })
    }
}
</script>
