<template>
    <div>
        <Menu />
        <Head title="Album" />
        <section>
            <!-- Column for title and add album button -->
            <div class="columns is-vcentered">
                <div class="column">
                    <h1 class="title is-2">My Albums</h1>
                </div>
                <div class="column is-narrow">
                    <b-button
                        label="Add album"
                        type="is-primary"
                        class="is-right"
                        icon-left="plus"
                        icon-pack="fa"
                        @click="openCreateModal"
                    />
                </div>
            </div>
            <!-- Display my albums -->
            <div class="columns is-multiline">
                <div v-for="n in 4" :key="n" class="column is-one-quarter">
                    <CardAlbum />
                </div>
            </div>
            <!-- Column for title -->
            <div class="columns is-vcentered">
                <div class="column">
                    <h1 class="title is-2">Shared Albums</h1>
                </div>
            </div>
            <!-- Display shared albums -->
            <div class="columns is-multiline">
                <div v-for="n in 3" :key="n" class="column is-one-quarter">
                    <CardAlbum />
                </div>
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
import Menu from "../Component/Menu.vue";
import CardAlbum from "../Component/CardAlbum";
import Footer from "../Component/Footer.vue";
import CreateModal from "../Component/CreateModal";

export default {
    name: "Album",
    components: {
        Link,
        Head,
        Menu,
        Footer,
        CardAlbum,
    },
    methods: {
        openCreateModal() {
            this.$buefy.modal.open({
                parent: this,
                component: CreateModal,
                hasModalCard: true,
                customClass: "",
                trapFocus: true,
            });
        },
    },
};
</script>
