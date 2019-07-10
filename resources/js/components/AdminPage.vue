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
            <div v-for="(weeklyList, index) in menuTable">
                <div class="select-content" v-bind:class="{ active: activeContent === index }">
                    <set-menu :weekly-list="weeklyList" v-on:open="openModal" />
                </div>
            </div>
        </div>

        <set-menu-modal v-if="modalAvailable" v-on:close="closeModal" v-model="selectedMenu"/>
    </div>
</template>

<script>
export default {
    props: {
        menuTable: {
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
            modalAvailable: false,
            selectedMenu: {},
            activeContent: 0
        }
    },
    methods: {
        openModal(menu) {
            this.selectedMenu = menu
            this.modalAvailable = true
        },
        closeModal() {
            this.modalAvailable = false
        },
        doSend() {
            if (this.message.length > 0) {
                alert(this.message)
                this.message = ''
                this.closeModal()
            } else {
                alert('メッセージを入力してください')
            }
        }
    }
}
</script>
