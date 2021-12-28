<template>
    <div>
    <Head title="Login" />
    <Menu />
    <section>
        <b-message
                    type="is-danger"
                    v-if="$page.props.flash.error">
                        {{ $page.props.flash.error }}
        </b-message>
        <div class="box">
            <form action="/loginCheck" method="POST" @submit.prevent="login">
                <div class="container">

                    <b-field label="Email">
                        <b-input id="email" v-model="form.email" type="email"></b-input>
                    </b-field>

                    <b-field label="Password">
                        <b-input id="password" v-model="form.password" type="password" ></b-input>
                    </b-field>

                    <div class="buttons">
                        <button type="submit" class="button is-primary"><strong>Login</strong></button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <Footer />
    </div>
</template>

<style scoped>
 section {
     width: 40vw;
     padding: 2rem;
     margin: 0 auto;
 }
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
            this.form.reset()
        }
    }
};

</script>
