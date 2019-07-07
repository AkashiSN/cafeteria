<template>
    <div class="row">
        <div class="col-4">
            <select class="custom-select custom-select-sm mv-3" v-model="activeContent">
                <option v-for="(option, index) in options" value="index">
                    {{ option }}
                </option>
            </select>
        </div>
    </div>

    <div class="container ph-5">
        <div v-for="(weekly_list, index) in dailySchedule">
            <div v-if="activeContent === '{{ $index }}'">
                <div v-for="menus in weekly_list">
                    <div v-for="(todays_menu, date) in menus">
                        <p class="mt-3">{{ date }}</p>
                        <div class="container mt-20 ph-65">
                            <div v-for="menu in todays_menu">
                                <p class="text-justify text-muted">{{ menu.description }}</p>
                                <menu-card :menu="menu" v-on:update-sold-out="updateStatus" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            dailySchedule: {
                type: Object,
                required: true
            },
            options: {
                type: object,
                required: true
            }
        },
        methods: {
            updateStatus: function(menu_id, newSoldOut) {
                dailySchedule.
            }
        }
    }
</script>
