<template>
    <div>
    <Menu />
    <Head title="Gallery" />
    <section>



        <!-- Column for title and add photos button -->
        <div class="columns is-vcentered">
            <div class="column">
                <h1 class="title is-1">Gallery view</h1>
            </div>
            <a class="button is-primary" @click="openUpdateModal" v-if="user.id == album.id_user"><strong> Modify Album </strong></a>
            <div v-show="photos.length > 0" class="column is-narrow">
                <b-button
                    label="Upload pictures"
                    type="is-primary"
                    class="is-right"
                    icon-left="upload"
                    icon-pack="fa"
                    @click="openUploadModal" />
            </div>

        </div>

        <!-- Display pictures -->
        <div v-show="photos.length > 0" class="columns is-multiline">
            <div v-for="n in 10" :key="n" class="column is-one-quarter">
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
                            <b-button
                                label="Upload pictures"
                                type="is-primary"
                                class="is-right"
                                icon-left="upload"
                                icon-pack="fa"
                                @click="openUploadModal" />
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
import CardPicture from '../Component/CardPicture.vue';
import Footer from '../Component/Footer.vue';
import UploadModal from "../Component/UploadModal";
import UpdateModal from "../Component/UpdateModal";


export default {
    name: "Gallery",
    components: {
        Link,
        Head,
        Menu,
        Footer,
        CardPicture
    },
    methods: {
        openUploadModal() {
            this.$buefy.modal.open({
                parent: this,
                component: UploadModal,
                hasModalCard: true,
                customClass: '',
                trapFocus: true,
                props: {
                    "galleryId": this.galleryId
                }
            })
        },
        openUpdateModal() {
            this.$buefy.modal.open({
                parent: this,
                component: UpdateModal,
                hasModalCard: true,
                customClass: '',
                trapFocus: true,
                props: {
                    "album": this.album
                }
            })
        }
    },
    props: [
        'photos',
        'galleryId',
        'album',
        'user',
    ],
};
</script>
