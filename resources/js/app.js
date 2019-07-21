
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('create-review', require('./components/CreateReview.vue').default);
Vue.component('review-card', require('./components/ReviewCard.vue').default);
Vue.component('review-card-my-page', require('./components/ReviewCardMyPage.vue').default);
Vue.component('menu-card', require('./components/MenuCard.vue').default);
Vue.component('sold-out-button', require('./components/SoldOutButton.vue').default);
Vue.component('favorite-button', require('./components/FavoriteButton.vue').default);
Vue.component('search-menu', require('./components/SearchMenu.vue').default);

Vue.component('edit-menu-settings', require('./components/admin/EditMenuSettings.vue').default);
Vue.component('set-menu', require('./components/admin/SetMenu.vue').default);
Vue.component('set-menu-modal', require('./components/admin/SetMenuModal.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        activeContent: '0',
        tabContent: '1'
    },
    methods: {
        change: function (num){
            this.tabContent = num
        }
    }
});
