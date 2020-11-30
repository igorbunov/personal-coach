import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router);

import vHome from '../components/home/v-home'
import vAbout from '../components/about/v-about'
import vProfile from '../components/profile/v-profile'
import vLogin from '../components/auth/v-login'
import vRegister from '../components/auth/v-register'
import vLogout from '../components/auth/v-logout'

let router = new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: vHome
        }, {
            path: '/about',
            name: 'about',
            component: vAbout
        }, {
            path: '/profile',
            name: 'profile',
            component: vProfile
        }, {
            path: '/register',
            name: 'register',
            component: vRegister
        }, {
            path: '/login',
            name: 'login',
            component: vLogin
        }, {
            path: '/logout',
            name: 'logout',
            component: vLogout
        }
    ]
});

export default router;