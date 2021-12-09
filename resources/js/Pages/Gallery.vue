<template>
    <div>
    <Menu />
    <Head title="Gallery" />
    <section>
        <h1 class="title is-1">Vue Gallerie</h1>
        <div class="columns is-multiline">
            <div v-for="n in 10" :key="n" class="column  is-one-quarter">
                <CardPicture />
            </div>
        </div>
    </section>
    <Footer />
    </div>
</template>
<style scoped lang="scss">
    h1{
        margin: 2rem ;
    }
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
    props: {
        
    }
};
</script>
