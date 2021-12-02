<template>
    <div>
    <Head title="Login" />
    <Menu />
    <section>
        <form action="/loginCheck" method="POST" @submit.prevent="login">
            <div class="container has-text-centered">

                <b-field label="Email">
                    <b-input id="email" v-model="form.email" type="email">
                    </b-input>
                </b-field>

                <b-field label="Password">
                    <b-input id="password" v-model="form.password" type="password" ></b-input>
                </b-field>

                <div class="buttons">

                    <button type="submit" class="button is-primary"><strong>Login</strong></button>

                </div>

            </div>
        </form>
    </section>
    <Footer />
    </div>
</template>

<style scoped>

</style>

<script>
import { Head, Link } from "@inertiajs/inertia-vue";
import Menu from '../Component/Menu.vue';
import Footer from '../Component/Footer.vue';
import { Inertia } from '@inertiajs/inertia';

export default {
    name: "login",
    data(){
        return {
            form: this.$inertia.form({
                password: null,
                email: null,
            })
        }
    },
    components: {
        Link,
        Head,
        Menu,
        Footer
    },

    methods: {
        login()
        {
            this.form.post('/loginCheck')
        }
    }
};

</script>
