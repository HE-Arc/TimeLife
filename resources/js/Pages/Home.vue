<template>
    <div>
    <Menu />
    <Head title="Home" />

    <section class="hero is-dark is-fullheight-with-navbar">
        <b-message
            title="User created"
            type="is-success"
            v-if="$page.props.flash.success"
            >
                {{ $page.props.flash.success }}
        </b-message>
        <div class="hero-body">
            <div class="container has-text-centered">
                <img src="/img/logo_tmp.png">
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
        background: linear-gradient(rgba(0,0,0,0.35),rgba(0,0,0,0.35)), url("/img/background.jpg") no-repeat center center;
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
        phpVersion: String,
        user: Object
    }
};
</script>
