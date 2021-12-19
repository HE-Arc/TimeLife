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
                <a class="button is-light" href="/login">
                    Log in
                </a>
        </div>
    </section>
   <Footer />
    </div>
</template>

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
