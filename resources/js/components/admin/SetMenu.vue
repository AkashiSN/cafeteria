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
                <tr v-for="(menus, date) in weeklyList" :key="date">
                    <th scope="col">{{ date }}</th>
                    <td scope="col" @click="$emit('open', menus[0])">{{ menus[0] ? menus[0].item_name : emptyText }}</td>
                    <td scope="col" @click="$emit('open', menus[1])">{{ menus[1] ? menus[1].item_name : emptyText }}</td>
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
    data() {
        return {
            emptyText: '選択してください',
        }
    }
}
</script>
