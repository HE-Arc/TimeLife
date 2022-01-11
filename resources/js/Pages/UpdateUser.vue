<template>
    <div>
    <Menu />
    <Head title="Update User" />
    <section>
        <div class="box">
            <form  @submit.prevent="update">
                <div class="container">
                    <b-field label="Lastname">
                        <b-input id="last_name" required v-model="form.last_name"></b-input>
                    </b-field>

                    <b-field label="Firstname">
                        <b-input id="first_name" required v-model="form.first_name"></b-input>
                    </b-field>

                    <b-field label="Description">
                        <b-input id="description" v-model="form.description" type="textarea"></b-input>
                    </b-field>

                    <div class="buttons">

                        <button type="submit" class="button is-primary"><strong>Update</strong></button>

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
    name: "UpdateUser",
    props: {
        user: Object,
    },
    data(){
        return {
            form: this.$inertia.form({
                last_name: this.user.last_name,
                first_name: this.user.first_name,
                description: this.user.description,
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
        update()
        {
            this.form.put(route('users.update', this.user))
        }
    }
};

</script>
