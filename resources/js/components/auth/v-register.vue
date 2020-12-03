<template>
    <div class="v-register">
        <div v-if="isError" class="v-register__error">
            {{error}}
        </div>

        <form v-on:submit.prevent="doRegister">
            <label>email:</label>
            <input
                type="email"
                v-model="email"
                required
            />

            <br/>

            <label>password:</label>
            <input
                type="password"
                v-model="password"
                required
            />

            <br/>

            <label>re-password:</label>
            <input
                type="password"
                v-model="password2"
                required
            />

            <br/>
            <br/>

            <div class="v-register__button-area">
                <input
                    type="submit"
                    value="Register"
                    :class="{ 'v-register__loading': isLoading }"
                />
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: 'v-register',
        components: {},
        props: {},
        data() {
            return {
                isLoading: false,
                email: '',
                password: '',
                password2: '',
                error: ''
            }
        },
        computed: {
            isError() {
                return this.error != '';
            }
        },
        methods: {
            doRegister() {
                if (this.isLoading) {
                    return;
                }

                this.error = '';

                if (this.email == ''
                    || this.password == ''
                    || this.password2 == ''
                ) {
                    this.error = 'Please, enter credentials';
                    return;
                }

                if (this.password != this.password2) {
                    this.error = 'Passwords should be identical';
                    return;
                }

                this.isLoading = true;

                axios.post('/api/v1/register', {
                    email: this.email,
                    password: this.password
                })
                    .then((response) => {
                        let token = response.data.token;

                        if (token != '') {
                            localStorage.setItem('user_id', response.data.id);
                            localStorage.setItem('access_token', token);

                            window.location.href = '/';
                        }
                    })
                    .catch((error) => {
                        var errorArr = [];

                        for (var k in error.response.data.errors) {
                            errorArr.push(error.response.data.errors[k]);
                        }

                        this.error = errorArr.join('<br/>');
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
    .v-register {
        width: 400px;
        margin: 50px auto;
        box-sizing: content-box;
        padding: 10px;
    }
    .v-register__error {
        padding: 10px;
        border: 1px solid red;
        margin-bottom: 10px;
        font-size: 18px;
        color: red;
        font-weight: bold;
    }
    .v-register label {
        width: 114px;
        font-weight: bold;
        font-size: 18px;
    }
    .v-register input[type="email"],
    .v-register input[type="password"] {
        width: calc(100% - 120px);
    }
    .v-register__loading {
        cursor: not-allowed !important;
        background-color: cyan;
    }
    .v-register__button-area {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
    }
</style>
