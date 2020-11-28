require('./bootstrap');

window.Vue = require('vue');

Vue.use(require('vue-cookies'))


Vue.config.productionTip = false

import vMainWrapper from './components/v-main-wrapper.vue'
import store from './store.js'

new Vue({
    render: h => h(vMainWrapper),
    store
}).$mount('#app')