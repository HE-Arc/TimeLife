<template>
    <div>
    <Menu />
    <Head title="Gallery" />
    <section>
        <h1>Vue Gallerie</h1>
    </section>
    <Footer />
    </div>
</template>
<style scoped lang="scss">

</style>
<script>
import { Head, Link } from "@inertiajs/inertia-vue";
import Menu from '../Component/Menu.vue';
import Footer from '../Component/Footer.vue';


export default {
    name: "Gallery",
    components: {
        Link,
        Head,
        Menu,
        Footer
    },
    props: {
        
    }
};
</script>
