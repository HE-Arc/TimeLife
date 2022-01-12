<template>
    <div>
        <Menu />
        <Head title="Gallery" />
        <section>
            <div class="columns maincolumns">
                <div class="column is-1 leftcolumn">
                    <b-menu class="sidemenu">
                        <b-menu-list>
                            <b-menu-item
                                label="Gallery"
                                icon="picture-o"
                                icon-pack="fa"
                                active
                            ></b-menu-item>
                            <b-menu-item
                                label="Timeline"
                                icon="bar-chart"
                                icon-pack="fa"
                            ></b-menu-item>
                        </b-menu-list>
                    </b-menu>
                </div>
                <div class="column">
                    <!-- Column for title and add photos button -->
                    <div class="columns is-vcentered">
                        <div class="column">
                            <h1 class="title is-1">Gallery view</h1>
                        </div>
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
                            v-for="n in 10"
                            :key="n"
                            class="column is-one-quarter"
                        >
                            <CardPicture />
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
</style>
<script>
import { Head, Link } from "@inertiajs/inertia-vue";
import Menu from "../Component/Menu.vue";
import CardPicture from "../Component/CardPicture.vue";
import Footer from "../Component/Footer.vue";
import UploadModal from "../Component/UploadModal";

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
    },
    props: ["photos", "galleryId"],
};
</script>
