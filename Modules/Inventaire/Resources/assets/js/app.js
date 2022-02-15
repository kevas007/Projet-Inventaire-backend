window.Vue = require('vue').default;
Vue.component('inventaire', require('../components/Inventaire.vue').default);
const app = new Vue({
    el: '#app',
});
