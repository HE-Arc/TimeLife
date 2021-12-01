<template>
    <div>
        <Head title="Upload pictures"></Head>
        <Menu></Menu>
        <Footer></Footer>
    </div>
</template>

<script>
import {Head, Link} from "@inertiajs/inertia-vue";
import Menu from "../Component/Menu";
import Footer from "../Component/Footer";

export default {
    name: "Upload",
    components: {
        Head,
        Menu,
        Footer
    },
}
</script>

<style scoped>

</style>
