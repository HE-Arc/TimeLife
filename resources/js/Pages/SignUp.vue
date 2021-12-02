<template>
    <div>
    <Menu />
    <Head title="Sign up" />
    <section>
        <div class="box">
            <form action="/users" method="POST" @submit.prevent="create">
                <div class="container">
                    <b-field label="Lastname">
                        <b-input id="last_name" v-model="form.last_name"></b-input>
                    </b-field>

                    <b-field label="Firstname">
                        <b-input id="first_name" v-model="form.first_name"></b-input>
                    </b-field>

                    <b-field label="Email">
                        <b-input id="email" v-model="form.email" type="email"
                            maxlength="30">
                        </b-input>
                    </b-field>

                    <b-field label="Password">
                        <b-input id="password" v-model="form.password" type="password" maxlength="30"></b-input>
                    </b-field>

                    <b-field label="Description">
                        <b-input id="description" v-model="form.description" type="textarea"></b-input>
                    </b-field>

                    <div class="buttons">

                        <button type="submit" class="button is-primary"><strong>Submit</strong></button>

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
    name: "SignUp",
    data(){
        return {
            form: this.$inertia.form({
                last_name: null,
                first_name: null,
                password: null,
                email: null,
                description: null,
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
        create()
        {
            this.form.post('/users')
        }
    }
};

</script>
