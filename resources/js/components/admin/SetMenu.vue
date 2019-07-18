<template>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Aセット</th>
                    <th scope="col">Bセット</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(menus, date) in weeklyList">
                    <th scope="col">{{ date }}</th>
                    <td v-for="(menu, category) in menus" scope="col" @click="$emit('open', menu, date)">
                        {{ itemText(menu) }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        weeklyList: {
            type: Object,
            required: true
        }
    },
    methods: {
        itemText: function(menu) {
            return menu ? menu.item_name : '選択してください'
        }
    }
}
</script>
