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
                console.log('theres token in local storage');
                this.SET_ACCESS_TOKEN(localStorage.getItem('access_token'));
            } else {
                console.log('nothing in local storage');
            }
        }
    }
</script>

<style>
    .v-main-wrapper {

    }
</style>
