<template>
    <div>
        <Head title="Profile" />
        <Menu />
        <section>
            <div class="columns">
                <div class="column">
                    <h2 class="title is-2">Prenom nom</h2>
                    <h3 class="title is-3">email@email.com</h3>
                </div>
                <div class="column">Second column</div>
            </div>
        </section>
        <Footer />
    </div>
</template>
<script>
import { Head, Link } from "@inertiajs/inertia-vue";
import Menu from "../Component/Menu.vue";
import Footer from "../Component/Footer.vue";

export default {
    components: {
        Link,
        Head,
        Menu,
        Footer,
    },
    computed: {
        user() {
            return this.$page.props.user;
        },
    },
};
</script>
