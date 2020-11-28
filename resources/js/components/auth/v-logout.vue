<template>
    <div class="v-logout">
        <h1>This is logout page</h1>
    </div>
</template>

<script>
    export default {
        name: 'v-logout',
        components: {},
        props: {},
        data() {
            return {}
        },
        computed: {},
        methods: {},
        watch: {},
        mounted() {
            console.log('logout');

            Vue.$cookies.remove('access_token');
            window.location.href = '/';
        }
    }
</script>

<style>
    .v-logout {

    }
</style>
