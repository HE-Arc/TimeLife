<template>
    <div>
        <Head title="Upload pictures"></Head>
        <Menu></Menu>
        <section>
            <b-button
                label="Upload pictures"
                type="is-primary"
                size="is-medium"
                @click="cardModal" />
        </section>
        <Footer></Footer>
    </div>
</template>

<script>
import {Head, Link} from "@inertiajs/inertia-vue";
import Menu from "../Component/Menu";
import Footer from "../Component/Footer";
import UploadModal from "@/Component/UploadModal";

export default {
    name: "Upload",
    components: {
        Head,
        Menu,
        Footer
    },
    methods: {
        cardModal() {
            this.$buefy.modal.open({
                parent: this,
                component: UploadModal,
                hasModalCard: true,
                customClass: '',
                trapFocus: true
            })
        }
    }
}
</script>

<style scoped>

</style>
