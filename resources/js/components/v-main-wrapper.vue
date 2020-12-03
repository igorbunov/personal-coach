<template>
    <div class="v-main-wrapper">
        <v-top-menu />

        <v-left-menu />

        <keep-alive>
            <router-view></router-view>
        </keep-alive>
    </div>
</template>

<script>
    import vTopMenu from "./menu/v-top-menu.vue";
    import vLeftMenu from "./menu/v-left-menu.vue";

    import {mapActions} from 'vuex'

    export default {
        name: 'v-main-wrapper',
        components: {
            vTopMenu,
            vLeftMenu
        },
        props: {},
        data() {
            return {
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
                this.SET_ACCESS_TOKEN(localStorage.getItem('access_token'));

                axios.defaults.headers.common['current_user_id'] = localStorage.getItem('user_id');
                axios.defaults.headers.common['access_token'] = localStorage.getItem('access_token');
            }
        }
    }
</script>

<style>
    .v-main-wrapper {

    }
</style>
