<template>
    <div>
    <Menu />
    <Head title="Gallery" />
    <section>

        <!-- Column for title and add photos button -->
        <div class="columns is-vcentered">
            <div class="column">
                <h1 class="title is-1">Vue Gallerie</h1>
            </div>
            <div v-show="photos.length > 0" class="column is-narrow ">
                <a class="button is-primary is-right">
                    <strong>Add Photos</strong>
                </a>
            </div>
        </div>
        
        <!-- Display pictures -->
        <div v-show="photos.length > 0" class="columns is-multiline">
            <div v-for="n in 10" :key="n" class="column  is-one-quarter">
                <CardPicture />
            </div>
        </div>
        
        <!-- Display message when album is empty -->
        <div v-show="photos.length < 1">
            <section class="hero is-fullheight-with-navbar">
                <div class="hero-body">
                    <div class="container has-text-centered">
                        <p class="subtitle">
                            Nothing to see here, please add your own photos
                        </p>
                        <div class="buttons is-centered">
                            <a class="button is-primary">
                                <strong>Add Photos</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    
    </section>
    <Footer />
    </div>
</template>
<style scoped lang="scss">
    .columns {
        padding: 2rem;
    }
</style>
<script>
import { Head, Link } from "@inertiajs/inertia-vue";
import Menu from '../Component/Menu.vue';
import CardPicture from '../Component/CardPicture.vue'
import Footer from '../Component/Footer.vue';


export default {
    name: "Gallery",
    components: {
        Link,
        Head,
        Menu,
        Footer,
        CardPicture
    },
    props: [
        'photos',
    ],
};
</script>
