<template>
    <div>
        <Menu />
        <Head title="Gallery" />
        <section>
            <div class="columns maincolumns">
                <div class="column is-1 leftcolumn">
                    <b-menu class="sidemenu">
                        <b-menu-list>
                            <a :href="route('albums.gallery', galleryId)">
                                <b-menu-item
                                    label="Gallery"
                                    icon="picture-o"
                                    icon-pack="fa"
                                    active
                                ></b-menu-item
                            ></a>
                            <a :href="route('albums.timeline', galleryId)">
                                <b-menu-item
                                    label="Timeline"
                                    icon="bar-chart"
                                    icon-pack="fa"
                                ></b-menu-item>
                            </a>
                        </b-menu-list>
                    </b-menu>
                </div>
                <div class="column">
                    <!-- Column for title and add photos button -->
                    <div class="columns is-vcentered">
                        <div class="column">
                            <h1 class="title is-1">{{ album.name }}</h1>
                        </div>
                        <b-button
                            type="is-info"
                            v-if="user.id == album.id_user"
                            label="Modify Album"
                            icon-left="pencil-square-o"
                            icon-pack="fa"
                            @click="openUpdateModal"
                        />
                        <div
                            v-show="photos.length > 0"
                            class="column is-narrow"
                        >
                            <b-button
                                label="Upload pictures"
                                type="is-primary"
                                class="is-right"
                                icon-left="upload"
                                icon-pack="fa"
                                @click="openUploadModal"
                            />
                        </div>
                    </div>

                    <!-- Display pictures -->
                    <div
                        v-show="photos.length > 0"
                        class="columns is-multiline"
                    >
                        <div
                            v-for="photo in photos"
                            :key="photo.id"
                            class="column is-one-quarter"
                        >
                            <CardPicture
                                :name="photo.name"
                                :source="route('storage.url', photo.filename)"
                            />
                        </div>
                    </div>

                    <!-- Display message when album is empty -->
                    <div v-show="photos.length < 1">
                        <section class="hero is-fullheight-with-navbar">
                            <div class="hero-body">
                                <div class="container has-text-centered">
                                    <p class="subtitle">
                                        Nothing to see here, please add your own
                                        photos
                                    </p>
                                    <div class="buttons is-centered">
                                        <b-button
                                            label="Upload pictures"
                                            type="is-primary"
                                            class="is-right"
                                            icon-left="upload"
                                            icon-pack="fa"
                                            @click="openUploadModal"
                                        />
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
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

.maincolumns {
    padding: 0;
}
.leftcolumn {
    background-color: #fafafa;
    padding: 0;
}
.sidemenu {
    padding-top: 2rem;
    padding-left: 1rem;
    padding-right: 0rem;
    padding-bottom: 2rem;
}
a {
    padding: 0;
}
</style>
<script>
import { Head, Link } from "@inertiajs/inertia-vue";

import Menu from "../Component/Menu.vue";
import CardPicture from "../Component/CardPicture.vue";
import Footer from "../Component/Footer.vue";
import UploadModal from "../Component/UploadModal";
import UpdateModal from "../Component/UpdateModal";

export default {
    name: "Gallery",
    components: {
        Link,
        Head,
        Menu,
        Footer,
        CardPicture,
    },
    methods: {
        openUploadModal() {
            this.$buefy.modal.open({
                parent: this,
                component: UploadModal,
                hasModalCard: true,
                customClass: "",
                trapFocus: true,
                props: {
                    galleryId: this.galleryId,
                },
            });
        },
        openUpdateModal() {
            this.$buefy.modal.open({
                parent: this,
                component: UpdateModal,
                hasModalCard: true,
                customClass: "",
                trapFocus: true,
                props: {
                    album: this.album,
                },
            });
        },
    },
    props: ["photos", "galleryId", "album", "user"],
};
</script>
