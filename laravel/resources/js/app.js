window.Vue = require('vue');

import Buefy from 'buefy'
Vue.use(Buefy)

import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios)

Vue.component('flipcard', require('./components/Card.vue').default);
Vue.component('shoppingcard', require('./components/Shoppingcard.vue').default);
Vue.component('addcard', require('./components/Addcard.vue').default);
Vue.component('list', require('./components/List.vue').default);

const app = new Vue({
    el: '#app',
    data() {
        return {
        }
    },
    methods: {
    }
});
