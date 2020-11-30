require('./bootstrap');

window.Vue = require('vue');

Vue.config.productionTip = false

import vMainWrapper from './components/v-main-wrapper.vue'
import store from './store.js'
import router from './router/router'

new Vue({
    render: h => h(vMainWrapper),
    store,
    router
}).$mount('#app')