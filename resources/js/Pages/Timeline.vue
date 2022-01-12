<template>
    <div>
        <Head title="Timeline"></Head>
        <Menu />
        <div class="columns maincolumns">
            <div class="column is-1 leftcolumn">
                <b-menu class="sidemenu">
                    <b-menu-list>
                        <a :href="route('albums.gallery', albumId)">
                            <b-menu-item
                                label="Gallery"
                                icon="picture-o"
                                icon-pack="fa"
                            ></b-menu-item
                        ></a>
                        <a :href="route('albums.timeline', albumId)">
                            <b-menu-item
                                label="Timeline"
                                icon="bar-chart"
                                icon-pack="fa"
                                active
                            ></b-menu-item>
                        </a>
                    </b-menu-list>
                </b-menu>
            </div>

            <section class="timeline-box">
                <div class="timeline" v-if="photos.length > 0">
                    <TimelineEvent
                        :event="photo"
                        :index="i"
                        v-for="(photo, i) of photos"
                        :key="i"
                    />
                </div>
                <div class="container" v-else>
                    <div class="empty-box has-text-centered box">
                        <b-icon
                            icon="folder-open-o"
                            size="is-large"
                            class="box-icon"
                            custom-size="fa-4x"
                        >
                        </b-icon>
                        <h2 class="title">It's a little bit empty here...</h2>
                        <p class="subtitle">
                            Why don't you
                            <a :href="route('albums.gallery', albumId)">add</a>
                            some pictures in this album ?
                        </p>
                    </div>
                </div>
            </section>
        </div>
        <Footer />
    </div>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue";
import Menu from "../Component/Menu.vue";
import Footer from "../Component/Footer.vue";
import TimelineEvent from "../Component/Timeline/TimelineEvent.vue";

export default {
    name: "Timeline",
    components: {
        TimelineEvent,
        Head,
        Menu,
        Footer,
    },
    props: {
        photos: {},
        albumId: Number,
    },
    data() {
        return {};
    },
};
</script>

<style scoped lang="scss">
@import "~bulma/sass/utilities/mixins";

.timeline {
    display: flex;
}

.empty-box {
    @include until($desktop) {
        width: 80vw;
    }
    @include from($desktop) {
        width: 50vw;
    }
    margin: 0 auto;
    margin-top: 6rem;
    background-color: rgba(0, 0, 0, 0.4);

    & > * {
        color: white;
    }

    .box-icon {
        margin: 1rem;
    }
}

.timeline-box {
    display: flex;
    overflow-x: auto;
    background-color: #833471;
    min-height: calc(100vh - 3.25rem);
}

.scroll-message {
    display: flex;
}

.timeline::-webkit-scrollbar {
    height: 20px;
}

.columns {
    margin-bottom: 0;
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
