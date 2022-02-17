window.Vue = require('vue').default;
import vuetify from './vuetify';
Vue.component('inventaire', require('./components/Inventaire.vue').default);
Vue.component('index-component', require('./components/materiel/Index.vue').default);
const app = new Vue({
    el: '#app',
    vuetify
});
