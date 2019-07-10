<template>
  <transition name="modal" appear>
    <div class="modal" tabindex="-1" @click.self="$emit('close')">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ menu.item_name }}</h5>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes hereeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="$emit('close')">Close</button>
                    <button type="button" class="btn btn-primary" @click="update">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    </transition>
</template>

<script>
export default {
    model: {
        prop: 'menu',
        event: 'change'
    },
    props: {
        menu: {
            type: Object,
            required: true
        }
    },
    methods: {
        update() {
            console.log(this.menu)
        }
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
