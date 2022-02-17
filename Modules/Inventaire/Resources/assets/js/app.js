window.Vue = require('vue').default;
import vuetify from './vuetify';

import VueChartkick from 'vue-chartkick';
import Chart from 'chart.js';
import fullCalendar from 'vue-fullcalendar';

Vue.use(VueChartkick, { adapter: Chart });
Vue.component('full-calendar', fullCalendar);   

Vue.component('inventaire', require('./components/Inventaire.vue').default);
//Materiel
Vue.component('index-component', require('./components/materiel/Index.vue').default);
Vue.component('show-component', require('./components/materiel/Show.vue').default);
const app = new Vue({
    el: '#app',
    vuetify
});
