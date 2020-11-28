<template>
    <div class="v-top-menu">
        <ul>
            <li
                v-for="menu in menuItems"
                v-if="isShowMenuItem(menu)"
            >
                <a
                    :href="menu.href"
                    v-if="!isCurrentPage(menu)"
                >{{ menu.title }}</a>

                <span
                    v-if="isCurrentPage(menu)"
                >{{ menu.title }}</span>
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
            page: {
                type: String
            }
        },
        data() {
            return {
                menuItems: [
                    {
                        href: '/',
                        title: 'Main'
                    }, {
                        href: '/profile',
                        title: 'Profile',
                        requireAuth: true
                    }, {
                        href: '/about',
                        title: 'About'
                    }, {
                        href: '/login',
                        title: 'Login',
                        requireAuth: false
                    }, {
                        href: '/logout',
                        title: 'Logout',
                        requireAuth: true
                    }, {
                        href: '/register',
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
            },
            isCurrentPage(menu) {
                if (this.page == 'index' && menu.href == '/') {
                    return true;
                }

                return ('/' + this.page == menu.href);
            }
        },
        watch: {
            page() {
                console.log('watch page', this.page);
            }
        },
        mounted() {
        }
    }
</script>

<style>
    .v-top-menu {
        padding: 10px 40px;
        background-color: rgb(29, 67, 84);
        font-size: 24px;
    }
    .v-top-menu > ul{
        list-style: none;
        display: flex;
        justify-content: space-around;
        margin: 0;
        padding: 0;
    }

    .v-top-menu > ul > li > a{
        color: lightyellow;
    }
    .v-top-menu > ul > li > span{
        color: greenyellow;
    }
</style>
