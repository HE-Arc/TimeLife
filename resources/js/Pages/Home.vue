<template>
    <div>
    <Menu />
    <Head title="Welcome" />
    <section class="hero is-dark is-fullheight-with-navbar">
        <div class="hero-body">
            <div class="container has-text-centered">
                <img src="/img/logo.png">
                <p class="subtitle">
                    Time to share your Life like never before
                </p>
                <div class="buttons is-centered">
                    <a class="button is-primary">
                        <strong>Sign up</strong>
                    </a>
                    <a class="button is-light">
                        Log in
                    </a>
                </div>
            </div>
        </div>
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


export default {
    name: "Home",
    components: {
        Link,
        Head,
        Menu,
        Footer
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String
    }
};
</script>
