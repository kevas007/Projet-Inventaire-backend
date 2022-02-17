window.Vue = require('vue').default;
import vuetify from './vuetify';

import VueChartkick from 'vue-chartkick';

import fullCalendar from 'vue-fullcalendar';


Vue.component('full-calendar', fullCalendar);

Vue.component('inventaire', require('./components/Inventaire.vue').default);
Vue.component('index-component', require('./components/materiel/Index.vue').default);
Vue.component('reservation-show', require('./components/reservation/Show.vue').default);
const app = new Vue({
    el: '#app',
    vuetify
});
