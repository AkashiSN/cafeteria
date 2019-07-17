<template>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <select class="custom-select custom-select-sm mv-3" v-model="activeContent">
                    <option v-for="(option, index) in options" v-bind:value="index">
                    {{ option }}
                    </option>
                </select>
            </div>
        </div>

        <div class="container ph-5">
            <div v-for="(weeklyList, index) in tables">
                <div class="select-content" v-bind:class="{ active: activeContent === index }">
                    <set-menu :weekly-list="weeklyList" :table-index="index" v-on:open="openModal" />
                </div>
            </div>
        </div>

        <set-menu-modal v-if="modalAvailable" :menu="selectedMenu" :title="selectedDate" v-on:update="updateMenu" v-on:delete="deleteMenu" v-on:close="closeModal" />
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
        }
    },
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            tables: this.menuTables,
            modalAvailable: false,
            activeContent: 0
        }
    },
    methods: {
        openModal(menu, date, Index) {
            this.selectedMenu = menu
            this.selectedDate = date
            this.selectedIndex = Index

            this.modalAvailable = true
        },
        closeModal() {
            this.modalAvailable = false
        },
        deleteMenu() {
            this.closeModal()
        },
        updateMenu(newMenu) {
            var table = this.tables[this.selectedIndex]
            table[this.selectedDate][this.selectedMenu.category] = newMenu
            this.closeModal()
        }
    }
}
</script>
