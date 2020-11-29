<template>
    <div class="v-main-wrapper">
        <v-top-menu
            :page="page"
        />

        <v-left-menu
            :page="page"
        />

        <v-about
            v-if="page == 'about'"
        />

        <v-index
            v-if="page == 'index'"
        />

        <v-login
            v-if="page == 'login'"
        />

        <v-register
            v-if="page == 'register'"
        />

        <v-profile
            v-if="page == 'profile'"
        />

        <v-logout
            v-if="page == 'logout'"
        />
    </div>
</template>

<script>
    import vTopMenu from "./menu/v-top-menu.vue";
    import vLeftMenu from "./menu/v-left-menu.vue";
    import vAbout from "./about/v-about.vue";
    import vIndex from "./index/v-index.vue";
    import vLogin from "./auth/v-login.vue";
    import vRegister from "./auth/v-register.vue";
    import vProfile from "./profile/v-profile.vue";
    import vLogout from "./auth/v-logout.vue";

    import {mapActions} from 'vuex'

    export default {
        name: 'v-main-wrapper',
        components: {
            vLogout,
            vProfile,
            vRegister,
            vLogin,
            vIndex,
            vTopMenu,
            vLeftMenu,
            vAbout
        },
        props: {},
        data() {
            return {
                page: ''
            }
        },
        computed: {},
        methods: {
            ...mapActions([
                'SET_ACCESS_TOKEN'
            ])
        },
        watch: {},
        mounted() {
            if (localStorage.getItem('access_token') !== null) {
                console.log('theres token in local storage');
                this.SET_ACCESS_TOKEN(localStorage.getItem('access_token'));
            } else {
                console.log('nothing in local storage');
            }

            let page = document.getElementById('page');

            if (page) {
                this.page = page.value;
            }
            console.log('main wrapper mounted: ', this.page);
        }
    }
</script>

<style>
    .v-main-wrapper {

    }
</style>
