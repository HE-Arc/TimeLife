<template>
    <div>
    <Menu />
    <Head title="Home" />
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
<style scoped lang="scss">
    .hero {
        background: linear-gradient(rgba(0,0,0,0.35),rgba(0,0,0,0.35)), url("https://images.unsplash.com/photo-1500051638674-ff996a0ec29e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1518&q=80") no-repeat center center;
        background-size: cover;
        img {
            width: 300px;
        }
    }
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
