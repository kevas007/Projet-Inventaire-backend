window.Vue = require('vue').default;
import vuetify from './vuetify';
import VueQrcodeReader from "vue-qrcode-reader";
import VueChartkick from 'vue-chartkick';
// import Chart from 'chart.js';
import fullCalendar from 'vue-fullcalendar';

// Vue.use(VueChartkick, { adapter: Chart });
Vue.component('full-calendar', fullCalendar);

Vue.component('inventaire-component', require('./components/Inventaire.vue').default);
//Materiel
Vue.component('index-component', require('./components/materiel/Index.vue').default);
Vue.component('reservation-create', require('./components/reservation/Create.vue').default);
Vue.component('emprunt-create', require('./components/emprunt/Create.vue').default);
Vue.component('restitution-index', require('./components/restitution/Index.vue').default);
Vue.component('create-component', require('./components/materiel/Create.vue').default);
Vue.component('show-component', require('./components/materiel/Show.vue').default);
Vue.component('search-component', require('./components/materiel/CodeQr.vue').default);

//contrat
Vue.component('contrat-edit', require('./components/Contrat/Edit.vue').default);
Vue.component('contrat-show', require('./components/Contrat/Show.vue').default);
Vue.component('contrat-index', require('./components/Contrat/Index.vue').default);
Vue.use(VueQrcodeReader);
const app = new Vue({
    el: '#app',
    vuetify,
});
