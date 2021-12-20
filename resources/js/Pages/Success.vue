<template>
    <div>
    <Head title="Success" />
    <Menu />
    <section>
        <b-message
                    title="User created"
                    type="is-success"
                    >
                    You can login with your email and password
        </b-message>
        <div class="buttons">
                <a class="button is-primary" href="/login">
                    <strong>Log in</strong>
                </a>
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
    name: "success",
    components: {
        Link,
        Head,
        Menu,
        Footer
    },

};

</script>
