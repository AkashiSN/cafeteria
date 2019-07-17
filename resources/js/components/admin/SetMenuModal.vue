<template>
  <transition name="modal" appear>
    <div class="modal" tabindex="-1" @click.self="$emit('close')">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ title }}</h5>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <input type="text" class="form-control" v-model="searchWord">
                    </div>
                    <ul>
                        <li v-for="result in results">
                            {{ result.item_name }}
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="$emit('close')">Close</button>
                    <button type="button" class="btn btn-danger" @click="$emit('delete')">Delete</button>
                    <button type="button" class="btn btn-primary" @click="$emit('update', newMenu)">{{ saveButtonText }}</button>
                </div>
            </div>
        </div>
    </div>
    </transition>
</template>

<script>
export default {
    props: {
        menu: {
            type: Object,
            required: true
        },
        title: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            searchWord: this.menu ? this.menu.item_name : '',
            results: [],
            newMenu: {'item_name': 'hoge', 'id': 12, 'category': 'unti'}
        }
    },
    computed: {
        saveButtonText() {
            return 'Change save'
        }
    },
    methods: {
    }
}
</script>

<style>
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
