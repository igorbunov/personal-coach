<template>
    <div class="v-profile">
        <h1>This is a profile page</h1>
    </div>
</template>

<script>
    export default {
        name: 'v-profile',
        components: {},
        props: {},
        data() {
            return {}
        },
        computed: {},
        methods: {},
        watch: {},
        mounted() {
            console.log('component mounted');

            let userId = localStorage.getItem('user_id');

            axios.get('/api/v1/user/' + userId)
                .then((response) => {
                    console.log(response.data);
                })
                .catch((error) => {
                    var errorArr = [];
                    for (var k in error.response.data.errors) {
                        errorArr.push(error.response.data.errors[k]);
                    }

                    let res = errorArr.join('<br/>');

                    console.log(res);
                });
        }
    }
</script>

<style>
    .v-profile {

    }
</style>
