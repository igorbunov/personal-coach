<template>
    <div class="v-home">
        <h1>This is home page</h1>

        <div style="padding: 30px;">
            <button @click="sendEmail">send emial</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'v-home',
        components: {},
        props: {},
        data() {
            return {}
        },
        computed: {},
        methods: {
            sendEmail() {
                console.log('send');
                axios.post('/api/v1/send_email')
                    .then((response) => {
                        console.log(response);
                    })
                    .catch((error) => {
                        console.log(error.response.status, error.message, error.response.data.message);
                    });
            }
        },
        watch: {},
        mounted() {}
    }
</script>

<style>
    .v-home {

    }
</style>
