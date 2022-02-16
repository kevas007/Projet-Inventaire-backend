window.Vue = require('vue').default;
import vuetify from './vuetify';
Vue.component('inventaire', require('../components/Inventaire.vue').default);
const app = new Vue({
    el: '#app',
    vuetify
});
