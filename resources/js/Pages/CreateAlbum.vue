<template>
    <div>
        <Head title="Create album"></Head>
        <Menu></Menu>
        <section>
            <b-button
                label="Create Album"
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
import CreateModal from "../Component/CreateModal";
export default {
    name: "Create",
    components: {
        Head,
        Menu,
        Footer
    },
    methods: {
        cardModal() {
            this.$buefy.modal.open({
                parent: this,
                component: CreateModal,
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