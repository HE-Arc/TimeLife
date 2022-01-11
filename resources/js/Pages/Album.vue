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
                <div v-show="myAlbums.length > 0" class="column is-narrow">
                    <b-button
                        label="Create album"
                        type="is-primary"
                        class="is-right"
                        icon-left="plus"
                        icon-pack="fa"
                        @click="openCreateModal"
                    />
                </div>
            </div>
            <!-- Display my albums -->
            <div v-show="myAlbums.length > 0" class="columns is-multiline">
                <div
                    v-for="album in myAlbums"
                    :key="album.id"
                    class="column is-one-quarter"
                >
                    <CardAlbum
                        :title="album.name"
                        :username="album.first_name + ' ' + album.last_name"
                        :thumbnail="myAlbumsThumbnails[album.id]"
                    />
                </div>
            </div>
            <!-- Display message when album is empty -->
            <div v-show="myAlbums.length < 1">
                <section class="hero is-medium">
                    <div class="hero-body">
                        <div class="container has-text-centered">
                            <p class="subtitle">
                                Nothing to see here, please create your own
                                album
                            </p>
                            <div class="buttons is-centered">
                                <b-button
                                    label="Create album"
                                    type="is-primary"
                                    class="is-right"
                                    icon-left="plus"
                                    icon-pack="fa"
                                    @click="openCreateModal"
                                />
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Column for title -->
            <div class="columns is-vcentered">
                <div class="column">
                    <h1 class="title is-2">Shared Albums</h1>
                </div>
            </div>
            <!-- Display shared albums -->
            <div v-show="sharedAlbums.length > 0" class="columns is-multiline">
                <div
                    v-for="album in sharedAlbums"
                    :key="album.id"
                    class="column is-one-quarter"
                >
                    <CardAlbum
                        :title="album.name"
                        :username="album.first_name + ' ' + album.last_name"
                        :thumbnail="sharedAlbumsThumbnails[album.id]"
                    />
                </div>
            </div>
            <!-- Display message when sharedAlbum is empty -->
            <div v-show="sharedAlbums.length < 1">
                <section class="hero is-medium">
                    <div class="hero-body">
                        <div class="container has-text-centered">
                            <p class="subtitle">Nothing to see here !</p>
                            <p class="subtitle">
                                Explain to your friends that they can share an
                                album with you
                            </p>
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
    props: [
        "myAlbums",
        "myAlbumsThumbnails",
        "sharedAlbums",
        "sharedAlbumsThumbnails",
    ],
};
</script>
