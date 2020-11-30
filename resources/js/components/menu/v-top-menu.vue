<template>
    <div class="v-top-menu">
        <ul>
            <li
                v-for="menu in menuItems"
                v-if="isShowMenuItem(menu)"
            >
                <router-link
                    :to="{ name: menu.route }"
                >{{ menu.title }}</router-link>
            </li>
        </ul>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex'

    export default {
        name: 'v-top-menu',
        components: {},
        props: {
        },
        data() {
            return {
                menuItems: [
                    {
                        route: 'home',
                        title: 'Home'
                    }, {
                        route: 'profile',
                        title: 'Profile',
                        requireAuth: true
                    }, {
                        route: 'about',
                        title: 'About'
                    }, {
                        route: 'login',
                        title: 'Login',
                        requireAuth: false
                    }, {
                        route: 'logout',
                        title: 'Logout',
                        requireAuth: true
                    }, {
                        route: 'register',
                        title: 'Register',
                        requireAuth: false
                    }
                ]
            }
        },
        computed: {
            ...mapGetters([
                'ACCESS_TOKEN'
            ])
        },
        methods: {
            isShowMenuItem(menu) {
                if (typeof menu.requireAuth == 'undefined') {
                    return true;
                }

                if (this.ACCESS_TOKEN.length > 10) {
                    return menu.requireAuth;
                }

                return !menu.requireAuth;
            }
        },
        watch: {
        },
        mounted() {
        }
    }
</script>

<style>
    .v-top-menu {
        padding: 12px 40px;
        background-color: rgb(29, 67, 84);
        font-size: 20px;
        height: 60px;
    }
    .v-top-menu > ul{
        list-style: none;
        display: flex;
        justify-content: space-around;
        margin: 0;
        padding: 0;
    }

    .v-top-menu > ul > li > a.router-link-exact-active.router-link-active {
        color: yellow;
        font-weight: bold;
        font-size: 21px;
    }
    .v-top-menu > ul > li > a{
        color: greenyellow;
    }
</style>
