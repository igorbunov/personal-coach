<template>
    <div class="v-login">
        <div v-if="isError" class="v-login__error">
            {{error}}
        </div>

        <form v-on:submit.prevent="doLogin">
            <label>email:</label>
            <input
                type="email"
                v-model="email"
                required />
            <br/>

            <label>password:</label>
            <input
                type="password"
                v-model="password"
                required
            />

            <br/>
            <br/>

            <div class="v-login__button-area">
                <input
                    type="submit"
                    value="Login"
                    :class="{ 'v-login__loading': isLoading }"
                />
                <a href="#">Forgot password</a>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: 'v-login',
        components: {},
        props: {},
        data() {
            return {
                isLoading: false,
                email: '',
                password: '',
                error: ''
            }
        },
        computed: {
            isError() {
                return this.error != '';
            }
        },
        methods: {
            doLogin() {
                if (this.isLoading) {
                    return;
                }

                this.error = '';

                if (this.email == '' || this.password == '') {
                    this.error = 'Please, enter credentials';
                    return;
                }

                this.isLoading = true;

                axios.post('/api/v1/login', {
                        email: this.email,
                        password: this.password
                    })
                    .then((response) => {
                        let token = response.data.token;

                        if (token != '') {
                            console.log('token = ' + token);

                            Vue.$cookies.config(60 * 60 * 24 * 7); // 7 days
//                            Vue.$cookies.config(120);// 2 minutes
                            Vue.$cookies.set('access_token', token);

                            if ($cookies.isKey('access_token')) {
                                window.location.href = '/';
                            } else {
                                this.error = 'unable to save token to cookies';
                            }
                        }
                    })
                    .catch((error) => {
                        console.log(error.response.status, error.message, error.response.data.message);
                        this.error = error.response.data.message;
                    })
                    .finally(() => {
                        this.isLoading = false;
                    });
            }
        },
        watch: {},
        mounted() {}
    }
</script>

<style>
    .v-login {
        width: 400px;
        margin: 50px auto;
        box-sizing: content-box;
        padding: 10px;
    }
    .v-login__error {
        padding: 10px;
        border: 1px solid red;
        margin-bottom: 10px;
        font-size: 18px;
        color: red;
        font-weight: bold;
    }
    .v-login label {
        width: 90px;
        font-weight: bold;
        font-size: 18px;
    }
    .v-login input[type="email"],
    .v-login input[type="password"]{
        width: calc(100% - 96px);
    }
    .v-login__loading {
        cursor: not-allowed !important;
        background-color: cyan;
    }
    .v-login__button-area {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
    }
</style>
